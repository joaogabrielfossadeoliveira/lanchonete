<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class ClienteComponent extends Component
{
    public $clientes, $nome, $endereco, $telefone, $cpf, $email, $password, $cliente_id;
    public function render()
    {
        $this->clientes = Cliente::all();
        return view('livewire.cliente-component');
    }

    public function store()
    {
        $this->validate([
            'nome' => 'required|min:3',
            'cpf' => 'required|unique:clientes',
            'email' => 'required|email|unique:clientes',
            'password' => 'required|min:6'
        ]);

        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('message', 'Cliente cadastrado com sucesso!');
    }
}
