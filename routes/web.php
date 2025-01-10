<?php

use App\Livewire\HomePage;
use App\Livewire\Language;
use App\Livewire\Tiers\TiersIndex;
use App\Livewire\Projets\ProjetIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\Projets\CreateProjet;
use App\Livewire\Produits\IndexProduit;
use App\Livewire\Produits\CreateProduits;
use App\Livewire\Produits\CreateServices;

// Redirections
Route::redirect('/', '/login');
Route::redirect('/register', '/login');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function() {

    // locale
    Route::get('/lang/{locale}', Language::class)->name('lang');

    Route::get('/home', HomePage::class)->name('home');

    Route::get('/tiers', TiersIndex::class)->name('tiers');

    Route::get('/produits', IndexProduit::class)->name('produits');
    Route::get('/create/produits', CreateProduits::class)->name('create-produits');
    Route::get('/create/services', CreateServices::class)->name('create-services');

    Route::get('/projets', ProjetIndex::class)->name('projets');

    Route::get('/projet/create', CreateProjet::class)->name('create-project');

});
