<?php

use App\Livewire\ClienteComponent;
use App\Livewire\FuncionarioComponent;
use App\Livewire\PedidoComponent;
use App\Livewire\ProdutoComponent;
use Illuminate\Support\Facades\Route;

Route::get('/clientes', ClienteComponent::class);

Route::get('/produtos', ProdutoComponent::class);

Route::get('/pedidos', PedidoComponent::class);

Route::get('/funcionarios', FuncionarioComponent::class)->middleware('role:admin');