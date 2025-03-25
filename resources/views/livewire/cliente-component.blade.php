<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Cadastro de Cliente</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" id="nome" wire:model="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome completo">
                        @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" id="cpf" wire:model="cpf" class="form-control @error('cpf') is-invalid @enderror" placeholder="000.000.000-00">
                        @error('cpf') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" id="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@exemplo.com">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" id="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="********">
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Salvar</button>
            </form>
        </div>
    </div>

    <div class="card shadow mt-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Clientes Cadastrados</h5>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($clientes as $cliente)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $cliente->nome }}</strong> - {{ $cliente->email }}
                    </div>
                    <button wire:click="delete({{ $cliente->id }})" class="btn btn-danger btn-sm">Excluir</button>
                </li>
            @endforeach
        </ul>
    </div>
</div>