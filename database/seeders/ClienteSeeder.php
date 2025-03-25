<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome' => 'João Silva',
            'endereco' => 'Rua A, 123',
            'telefone' => '11999999999',
            'cpf' => '12345678901',
            'email' => 'joao@email.com',
            'password' => bcrypt('senha123')
        ]);
    }
}
