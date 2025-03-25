<?php

namespace App\Livewire;

use App\Models\Funcionario;
use Livewire\Component;

class FuncionarioComponent extends Component
{
    public $funcionarios, $nome, $cpf, $email, $password, $role, $funcionario_id;

    public function render()
    {
        $this->funcionarios = Funcionario::all();
        return view('livewire.funcionario-component');
    }

    public function store()
    {
        $this->validate([
            'nome' => 'required|min:3',
            'cpf' => 'required|unique:funcionarios|size:11',
            'email' => 'required|email|unique:funcionarios',
            'password' => 'required|min:6',
            'role' => 'required|in:funcionario,admin'
        ]);

        Funcionario::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => $this->role
        ]);

        session()->flash('message', 'Funcionário cadastrado com sucesso!');
    }

    public function delete($id)
    {
        Funcionario::destroy($id);
        session()->flash('message', 'Funcionário excluído com sucesso!');
    }
}
