<?php

use App\Livewire\Tiers\TiersIndex;
use App\Livewire\HomePage;
use App\Livewire\Language;
use Illuminate\Support\Facades\Route;

// Redirections
Route::redirect('/', '/login');
Route::redirect('/register', '/login');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function() {

    // locale
    Route::get('/lang/{locale}', Language::class)->name('lang');

    Route::get('/home', HomePage::class)->name('home');

    Route::get('/tiers', TiersIndex::class)->name('tiers');

});
