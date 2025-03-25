<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class FuncionarioSeeder extends Seeder
{
    public function run()
    {
        Funcionario::create([
            'nome' => 'Carlos Opiveira',
            'cpf' => '12345678901',
            'email' => 'carlos@email.com',
            'password' => bcrypt('senha123'),
            'role' => 'funcionario'
        ]);

        Funcionario::create([
            'nome' => 'Ana marques',
            'cpf' => '98765432100',
            'email' => 'ana@email.com',
            'password' => bcrypt('senha123'),
            'role' => 'admin'
        ]);
    }
}