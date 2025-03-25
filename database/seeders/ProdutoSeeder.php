<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class ProdutoSeeder extends Seeder
{
    public function run()
    {
        Produto::create([
            'nome' => 'X-Burguer',
            'ingredientes' => 'Pão, carne, queijo, alface, tomate, maionese',
            'valor' => 15.00,
            'imagem' => null
        ]);
    }
}
