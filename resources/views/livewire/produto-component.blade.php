<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Cadastrar Produto</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" id="nome" wire:model="nome" class="form-control" placeholder="Nome do produto">
                </div>

                <div class="mb-3">
                    <label for="ingredientes" class="form-label">Ingredientes</label>
                    <textarea id="ingredientes" wire:model="ingredientes" class="form-control" placeholder="Ingredientes"></textarea>
                </div>

                <div class="mb-3">
                    <label for="valor" class="form-label">Valor (R$)</label>
                    <input type="number" id="valor" wire:model="valor" class="form-control" placeholder="Valor">
                </div>

                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" id="imagem" wire:model="imagem" class="form-control">
                    <div wire:loading wire:target="imagem" class="text-muted small mt-1">Carregando imagem...</div>
                </div>

                <button type="submit" class="btn btn-success w-100">Salvar</button>
            </form>
        </div>
    </div>

    <div class="card shadow mt-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Lista de Produtos</h5>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($produtos as $produto)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $produto->nome }}</strong> - R$ {{ number_format($produto->valor, 2, ',', '.') }}
                    </div>
                    <button wire:click="delete({{ $produto->id }})" class="btn btn-danger btn-sm">Excluir</button>
                </li>
            @endforeach
        </ul>
    </div>
</div>