<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:clients',
            'celular' => 'nullable',
            'senha' => 'required|min:4',
            'cpf' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!$this->validateCPF($value)) {
                    $fail('O CPF informado não é válido.');
                }
            }],
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Cliente cadastrado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'celular' => 'nullable',
            'senha' => 'required|min:4',
            'cpf' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!$this->validateCPF($value)) {
                    $fail('O CPF informado não é válido.');
                }
            }],
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente excluído com sucesso!');
    }

    protected function validateCPF($cpf)
    {
        // Remove caracteres especiais
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Valida o tamanho
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se todos os números são iguais
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Valida os dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
