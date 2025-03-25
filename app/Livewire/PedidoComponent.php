<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use Livewire\Component;

class PedidoComponent extends Component
{
    public $clientes, $produtos, $cliente_id, $forma_pagamento;
    public $pedidoProdutos = [];

    public function mount()
    {
        $this->clientes = Cliente::all();
        $this->produtos = Produto::all();
    }

    public function addProduto($produto_id)
    {
        $produto = Produto::find($produto_id);
        $this->pedidoProdutos[] = [
            'produto_id' => $produto->id,
            'nome' => $produto->nome,
            'preco_unitario' => $produto->valor,
            'quantidade' => 1
        ];
    }

    public function removeProduto($index)
    {
        unset($this->pedidoProdutos[$index]);
        $this->pedidoProdutos = array_values($this->pedidoProdutos);
    }

    public function store()
    {
        $this->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'forma_pagamento' => 'required|in:Cartão,Pix,Dinheiro',
            'pedidoProdutos' => 'required|array|min:1'
        ]);

        $valor_total = collect($this->pedidoProdutos)->sum(fn($p) => $p['preco_unitario'] * $p['quantidade']);

        $pedido = Pedido::create([
            'cliente_id' => $this->cliente_id,
            'valor_total' => $valor_total,
            'forma_pagamento' => $this->forma_pagamento,
        ]);

        foreach ($this->pedidoProdutos as $produto) {
            $pedido->produtos()->attach($produto['produto_id'], [
                'quantidade' => $produto['quantidade'],
                'preco_unitario' => $produto['preco_unitario']
            ]);
        }

        session()->flash('message', 'Pedido realizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.pedido-component', [
            'pedidos' => Pedido::with('cliente')->latest()->get()
        ]);
    }
}