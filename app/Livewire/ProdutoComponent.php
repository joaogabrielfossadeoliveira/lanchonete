<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class ProdutoComponent extends Component
{
    public $produtos, $nome, $ingredientes, $valor, $imagem, $produto_id;

    public function render()
    {
        $this->produtos = Produto::all();
        return view('livewire.produto-component');
    }

    public function store()
    {
        $this->validate([
            'nome' => 'required|min:3',
            'ingredientes' => 'required|min:5',
            'valor' => 'required|numeric',
            'imagem' => 'image|max:1024'
        ]);

        $imagemPath = null;
        if ($this->imagem) {
            $imagemPath = $this->imagem->store('produtos', 'public');
        }

        Produto::create([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagemPath,
        ]);

        session()->flash('message', 'Produto cadastrado com sucesso!');
    }

    public function delete($id)
    {
        Produto::destroy($id);
        session()->flash('message', 'Produto excluído com sucesso!');
    }
}
