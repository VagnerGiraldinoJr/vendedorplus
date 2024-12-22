<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ClientController extends Controller
{
    /**
     * Exibe a lista de clientes.
     */
    public function index()
    {
        $clients = Client::paginate(10); // Paginação com 10 clientes
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Exibe o formulário para criar um novo cliente.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Salva um novo cliente no banco de dados.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'celular' => 'nullable|string|max:20',
            'senha' => 'required|string|min:6',
            'cpf' => 'nullable|string|size:11|unique:clients,cpf',
        ]);

        try {
            $client = Client::create([
                'nome' => $validated['nome'],
                'email' => $validated['email'],
                'celular' => $validated['celular'],
                'senha' => bcrypt($validated['senha']),
                'cpf' => $validated['cpf'] ?? null,
            ]);

            // Garantir que a role 'user' exista para o guard 'web'
            $role = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

            // Atribuir role 'user' (guard web) ao cliente
            $client->assignRole($role);

            return redirect()->route('admin.clients.index')->with('success', 'Cliente criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao criar cliente: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Atualiza os dados de um cliente existente.
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validated = $this->validateClient($request, $client->id);

        try {
            $client->update([
                'nome' => $validated['nome'],
                'email' => $validated['email'],
                'celular' => $validated['celular'],
                'cpf' => $validated['cpf'] ?? $client->cpf, // Mantém o CPF atual se não for enviado
                'senha' => !empty($validated['senha']) ? bcrypt($validated['senha']) : $client->senha,
            ]);

            return redirect()->route('admin.clients')->with('success', 'Cliente atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar cliente: ' . $e->getMessage());
        }
    }

    /**
     * Remove um cliente do banco de dados.
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        // Verifica se o cliente tem pedidos
        if ($client->orders()->exists()) {
            return redirect()->back()->with('error', 'Este cliente possui pedidos associados e não pode ser excluído.');
        }

        // Caso contrário, exclui o cliente
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Cliente excluído com sucesso.');
    }


    /**
     * Valida os dados do cliente.
     */
    private function validateClient(Request $request, $clientId = null)
    {
        $rules = [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $clientId,
            'celular' => 'nullable|string|max:20',
            'senha' => 'nullable|string|min:6',
            'cpf' => 'nullable|string|size:11|unique:clients,cpf,' . $clientId, // CPF temporariamente validado
        ];

        $messages = [
            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.unique' => 'Este email já está cadastrado.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'senha.min' => 'A senha deve ter pelo menos 6 caracteres.',
        ];

        return $request->validate($rules, $messages);
    }
}
