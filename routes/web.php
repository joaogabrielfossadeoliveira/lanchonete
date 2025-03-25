<?php

use App\Livewire\ClienteComponent;
use App\Livewire\ProdutoComponent;
use Illuminate\Support\Facades\Route;

Route::get('/clientes', ClienteComponent::class);

Route::get('/produtos', ProdutoComponent::class);