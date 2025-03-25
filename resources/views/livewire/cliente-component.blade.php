<div class="container">
    <form wire:submit.prevent="store" class="mb-3">
        <input type="text" wire:model="nome" class="form-control mb-2" placeholder="Nome">
        <input type="text" wire:model="cpf" class="form-control mb-2" placeholder="CPF">
        <input type="email" wire:model="email" class="form-control mb-2" placeholder="Email">
        <input type="password" wire:model="password" class="form-control mb-2" placeholder="Senha">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    <ul class="list-group">
        @foreach ($clientes as $cliente)
            <li class="list-group-item">{{ $cliente->nome }} - {{ $cliente->email }}</li>
        @endforeach
    </ul>
</div> 