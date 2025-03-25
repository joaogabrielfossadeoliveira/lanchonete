<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Cadastro de Funcionários</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" wire:model="nome" id="nome" class="form-control" placeholder="Nome">
                        @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" wire:model="cpf" id="cpf" class="form-control" placeholder="CPF">
                        @error('cpf') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" wire:model="email" id="email" class="form-control" placeholder="Email">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" wire:model="password" id="password" class="form-control" placeholder="Senha">
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <label for="role" class="form-label">Tipo de Usuário</label>
                    <select wire:model="role" id="role" class="form-select">
                        <option value="funcionario">Funcionário</option>
                        <option value="admin">Administrador</option>
                    </select>
                    @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success w-100">Salvar</button>
                </div>
            </form>

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Lista de Funcionários</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th class="text-end">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ ucfirst($funcionario->role) }}</td>
                            <td class="text-end">
                                <button wire:click="delete({{ $funcionario->id }})" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>