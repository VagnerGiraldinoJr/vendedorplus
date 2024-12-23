<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'codigo_produto' => Str::uuid(),
                'nome_produto' => 'Camiseta Básica Preta',
                'preco' => 49.90,
                'preco_promo' => 39.90,
                'estoque' => 100,
                'status' => 'ativo',
                'descricao' => 'Camiseta básica preta de algodão premium.',
                'imagem_principal' => 'https://via.placeholder.com/300x300.png?text=Camiseta+Preta',
            ],
            [
                'codigo_produto' => Str::uuid(),
                'nome_produto' => 'Calça Jeans Slim Fit',
                'preco' => 129.90,
                'preco_promo' => 99.90,
                'estoque' => 50,
                'status' => 'ativo',
                'descricao' => 'Calça jeans azul slim fit para um visual moderno.',
                'imagem_principal' => 'https://via.placeholder.com/300x300.png?text=Cal%C3%A7a+Jeans',
            ],
            [
                'codigo_produto' => Str::uuid(),
                'nome_produto' => 'Tênis Esportivo Branco',
                'preco' => 199.90,
                'preco_promo' => 179.90,
                'estoque' => 30,
                'status' => 'ativo',
                'descricao' => 'Tênis esportivo confortável para corrida.',
                'imagem_principal' => 'https://via.placeholder.com/300x300.png?text=T%C3%AAnis+Branco',
            ],
            [
                'codigo_produto' => Str::uuid(),
                'nome_produto' => 'Jaqueta de Couro',
                'preco' => 299.90,
                'preco_promo' => 249.90,
                'estoque' => 20,
                'status' => 'ativo',
                'descricao' => 'Jaqueta de couro sintético de alta qualidade.',
                'imagem_principal' => 'https://via.placeholder.com/300x300.png?text=Jaqueta+Couro',
            ],
            [
                'codigo_produto' => Str::uuid(),
                'nome_produto' => 'Relógio Digital',
                'preco' => 99.90,
                'preco_promo' => 79.90,
                'estoque' => 40,
                'status' => 'ativo',
                'descricao' => 'Relógio digital resistente à água.',
                'imagem_principal' => 'https://via.placeholder.com/300x300.png?text=Rel%C3%B3gio+Digital',
            ],
            [
                'codigo_produto' => Str::uuid(),
                'nome_produto' => 'Óculos de Sol Aviador',
                'preco' => 59.90,
                'preco_promo' => 49.90,
                'estoque' => 60,
                'status' => 'ativo',
                'descricao' => 'Óculos de sol estilo aviador com proteção UV.',
                'imagem_principal' => 'https://via.placeholder.com/300x300.png?text=%C3%93culos+Aviador',
            ],
            [
                'codigo_produto' => Str::uuid(),
                'nome_produto' => 'Mochila Executiva',
                'preco' => 149.90,
                'preco_promo' => 129.90,
                'estoque' => 35,
                'status' => 'ativo',
                'descricao' => 'Mochila para laptop com design elegante.',
                'imagem_principal' => 'https://via.placeholder.com/300x300.png?text=Mochila+Executiva',
            ],
            [
                'codigo_produto' => Str::uuid(),
                'nome_produto' => 'Boné Snapback',
                'preco' => 29.90,
                'preco_promo' => 19.90,
                'estoque' => 80,
                'status' => 'ativo',
                'descricao' => 'Boné snapback ajustável.',
                'imagem_principal' => 'https://via.placeholder.com/300x300.png?text=Bon%C3%A9+Snapback',
            ],
            [
                'codigo_produto' => Str::uuid(),
                'nome_produto' => 'Cinto de Couro',
                'preco' => 39.90,
                'preco_promo' => 29.90,
                'estoque' => 70,
                'status' => 'ativo',
                'descricao' => 'Cinto de couro legítimo.',
                'imagem_principal' => 'https://via.placeholder.com/300x300.png?text=Cinto+Couro',
            ],
            [
                'codigo_produto' => Str::uuid(),
                'nome_produto' => 'Luvas Térmicas',
                'preco' => 24.90,
                'preco_promo' => 19.90,
                'estoque' => 90,
                'status' => 'ativo',
                'descricao' => 'Luvas térmicas para inverno rigoroso.',
                'imagem_principal' => 'https://via.placeholder.com/300x300.png?text=Luvas+T%C3%A9rmicas',
            ],
        ];

        // Adicionando mais 5 com Faker
        for ($i = 11; $i <= 15; $i++) {
            $products[] = [
                'codigo_produto' => Str::uuid(),
                'nome_produto' => 'Produto Genérico ' . $i,
                'preco' => rand(20, 300),
                'preco_promo' => rand(15, 250),
                'estoque' => rand(10, 100),
                'status' => 'ativo',
                'descricao' => 'Descrição genérica para Produto ' . $i,
                'imagem_principal' => 'https://via.placeholder.com/300x300.png?text=Produto+' . $i,
            ];
        }

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
