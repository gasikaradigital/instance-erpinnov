<?php

use App\Livewire\HomePage;
use App\Livewire\Language;
use App\Livewire\Taches\CreateTaches;
use App\Livewire\Taches\TachesIndex;
use App\Livewire\Tiers\TiersIndex;
use App\Livewire\Tiers\CreateTiers;
use App\Livewire\Projets\ProjetIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\Projets\CreateProjet;
use App\Livewire\Produits\IndexProduit;
use App\Livewire\Produits\CreateProduits;
use App\Livewire\Produits\CreateServices;
use App\Livewire\Tiers\ProspectsIndex;
use App\Livewire\Tiers\CreateProspects;
use App\Livewire\Tiers\ContactIndex;
use App\Livewire\Tiers\CreateContact;
use App\Livewire\Tiers\FournisseurIndex;
use App\Livewire\Tiers\CreateSupplier;
use App\Livewire\Factures\FacturesIndex;
use App\Livewire\Factures\FacturesFournisseurIndex;
use App\Livewire\Factures\CreateFactures;
use App\Livewire\Factures\CreateFacturesFournisseur;
use App\Livewire\Banques\BanquesIndex;
use App\Livewire\Banques\CreateBanques;
use App\Livewire\Tiers\TagCustomerIndex;
use App\Livewire\Tiers\CreateTagCustomerIndex;

// Redirections
Route::redirect('/', '/login');
Route::redirect('/register', '/login');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function() {

    // locale
    Route::get('/lang/{locale}', Language::class)->name('lang');
    Route::get('/home', HomePage::class)->name('home');
    
    Route::get('/tiers', TiersIndex::class)->name('tiers');
    Route::get('/create/tiers', CreateTiers::class)->name('create-tiers');
    
    Route::get('/prospects', ProspectsIndex::class)->name('prospects');
    Route::get('/create/prospects', CreateProspects::class)->name('create-prospects');

    Route::get('/contact', ContactIndex::class)->name('contact');
    Route::get('/create/contact', CreateContact::class)->name('create-contact');

    Route::get('/fournisseur', FournisseurIndex::class)->name('fournisseur');
    Route::get('/create/supplier', CreateSupplier::class)->name('create-supplier');

    Route::get('/tags/customer', tagCustomerIndex::class)->name('tag-customer');
    Route::get('/create/tags/customer', CreateTagCustomerIndex::class)->name('create-tag-customer');
    
    Route::get('/produits', IndexProduit::class)->name('produits');
    Route::get('/create/produits', CreateProduits::class)->name('create-produits');
    Route::get('/create/services', CreateServices::class)->name('create-services');

    Route::get('/projets', ProjetIndex::class)->name('projets');
    Route::get('/projet/create', CreateProjet::class)->name('create-project');
    
    Route::get('/taches', TachesIndex::class)->name('taches');
    Route::get('/tache/create', CreateTaches::class)->name('create-tache');  

    Route::get('/vente', TiersIndex::class)->name('vente');
    Route::get('/create/sale', CreateTiers::class)->name('create-sale');

    Route::get('/facture', FacturesIndex::class)->name('factures');
    Route::get('/facture/fournisseur', FacturesFournisseurIndex::class)->name('factures-fournisseur');
    Route::get('/create/factures', CreateFactures::class)->name('create-factures');
    Route::get('/create/factures-fournisseur', CreateFacturesFournisseur::class)->name('create-factures-fournisseur');

    Route::get('/banque', BanquesIndex::class)->name('banques');
    Route::get('/create/banques', CreateBanques::class)->name('create-banques');

    Route::get('/comptabilite', TiersIndex::class)->name('comptabilite');
    Route::get('/create/accounting', CreateTiers::class)->name('create-accounting');

    Route::get('/grh', TiersIndex::class)->name('grh');
    Route::get('/create/grh', CreateTiers::class)->name('create-grh');

    Route::get('/email', TiersIndex::class)->name('email');
    Route::get('/create/mail', CreateTiers::class)->name('create-mail');

    Route::get('/document', TiersIndex::class)->name('document');
    Route::get('/create/document', CreateTiers::class)->name('create-document');

    Route::get('/chat', TiersIndex::class)->name('chat');
    Route::get('/create/chat', CreateTiers::class)->name('create-chat');
    
});
