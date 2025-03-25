<div class="container mt-4">
    <form wire:submit.prevent="store" class="card p-4 shadow-sm">
        <h4 class="mb-3">Novo Pedido</h4>

        <!-- Seleção de Cliente -->
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Selecione um Cliente</label>
            <select wire:model="cliente_id" id="cliente_id" class="form-select">
                <option value="">Selecione um Cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Forma de Pagamento -->
        <div class="mb-3">
            <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
            <select wire:model="forma_pagamento" id="forma_pagamento" class="form-select">
                <option value="">Selecione uma opção</option>
                <option value="Cartão">Cartão</option>
                <option value="Pix">Pix</option>
                <option value="Dinheiro">Dinheiro</option>
            </select>
        </div>

        <!-- Seleção de Produtos -->
        <div class="mb-3">
            <h5 class="mb-2">Selecione os Produtos</h5>
            <div class="d-flex flex-wrap gap-2">
                @foreach ($produtos as $produto)
                    <button type="button" wire:click="addProduto({{ $produto->id }})" class="btn btn-outline-primary btn-sm">
                        {{ $produto->nome }} - R$ {{ number_format($produto->valor, 2, ',', '.') }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Lista de Produtos Selecionados -->
        <div class="mb-3">
            <h5>Produtos no Pedido</h5>
            <ul class="list-group">
                @foreach ($pedidoProdutos as $index => $produto)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $produto['nome'] }} (x{{ $produto['quantidade'] }})</span>
                        <button type="button" wire:click="removeProduto({{ $index }})" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Botão de Finalizar Pedido -->
        <button type="submit" class="btn btn-success w-100">Finalizar Pedido</button>
    </form>

    <!-- Lista de Pedidos -->
    <div class="mt-4">
        <h4>Pedidos Realizados</h4>
        <ul class="list-group">
            @foreach ($pedidos as $pedido)
                <li class="list-group-item">
                    <strong>Pedido #{{ $pedido->id }}</strong> - {{ $pedido->cliente->nome }} - 
                    <strong>R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</strong> - 
                    <span class="badge bg-info text-dark">{{ $pedido->status }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>