<?php

use App\Livewire\HomePage;
use App\Livewire\Language;
use Illuminate\Support\Facades\Route;

//Appel pour les class taches
use App\Livewire\Taches\CreateTaches;
use App\Livewire\Taches\TachesIndex;

//Appel pour les class projet
use App\Livewire\Projets\CreateProjet;
use App\Livewire\Projets\ProjetIndex;

//Appel pour les class produit
use App\Livewire\Produits\IndexProduit;
use App\Livewire\Produits\CreateProduits;
use App\Livewire\Produits\CreateServices;

//Appel pour les class tiers
use App\Livewire\Tiers\ProspectsIndex;
use App\Livewire\Tiers\CreateProspects;
use App\Livewire\Tiers\ContactIndex;
use App\Livewire\Tiers\CreateContact;
use App\Livewire\Tiers\TierDashboardIndex;
use App\Livewire\Tiers\FournisseurIndex;
use App\Livewire\Tiers\CreateSupplier;
use App\Livewire\Tiers\TiersIndex;
use App\Livewire\Tiers\CreateTiers;
use App\Livewire\Tiers\TagCustomerIndex;
use App\Livewire\Tiers\CreateTagCustomerIndex;

//Appel pour les class factures
use App\Livewire\Factures\FacturesIndex;
use App\Livewire\Factures\FacturesFournisseurIndex;
use App\Livewire\Factures\Client\StatistiquesClients;
use App\Livewire\Factures\Client\CreateFactures;
use App\Livewire\Factures\CreateFacturesFournisseur;
use App\Livewire\Factures\Client\ListesModelesFacturesClients;
use App\Livewire\Factures\Client\ReglementsClients;
use App\Livewire\Factures\Client\RapportsClients;
use App\Livewire\Factures\Client\ListeFacturesClients;

//Appel pour les class banques
use App\Livewire\Banques\BanquesIndex;
use App\Livewire\Banques\CreateBanques;


//Appel pour les class comptabilité
use App\Livewire\Comptabilite\ComptabiliteIndex;
use App\Livewire\Comptabilite\CreateAccounting;

//Appel pour les class GRH
use App\Livewire\GRH\GrhIndex;
use App\Livewire\GRH\CreateGrh;

//Appel pour les class email
use App\Livewire\Email\EmailIndex;
use App\Livewire\Email\CreateMail;

//Appel pour les class documents
use App\Livewire\Documents\DocumentIndex;
use App\Livewire\Documents\CreateDocument;

//Appel pour les class chat
use App\Livewire\Chat\ChatIndex;
use App\Livewire\Chat\CreateChat;
use App\Livewire\Tiers\TagFournisseurIndex;
use App\Livewire\Tiers\CreateTagSupplierIndex;
use App\Livewire\Tiers\TagContactIndex;
use App\Livewire\Tiers\CreateTagContactIndex;
use App\Livewire\Tiers\ProduitsDashboardIndex;


// Redirections
Route::redirect('/', '/login');
Route::redirect('/register', '/login');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function() {

    // locale
    Route::get('/lang/{locale}', Language::class)->name('lang');
    Route::get('/home', HomePage::class)->name('home');
    
    // Tiers
    Route::get('/tiers', TiersIndex::class)->name('tiers');
    Route::get('/create/tiers', CreateTiers::class)->name('create-tiers');

    Route::get('/tiers-dashboard', TierDashboardIndex::class)->name('tiers-dashboard');
    
    Route::get('/prospects', ProspectsIndex::class)->name('prospects');
    Route::get('/create/prospects', CreateProspects::class)->name('create-prospects');

    Route::get('/contact', ContactIndex::class)->name('contact');
    Route::get('/create/contact', CreateContact::class)->name('create-contact');

    Route::get('/tags/contacts', TagContactIndex::class)->name('tag-contact');
    Route::get('/create/tags-contact', CreateTagContactIndex::class)->name('create-tag-contact');

    Route::get('/fournisseur', FournisseurIndex::class)->name('fournisseur');
    Route::get('/create/supplier', CreateSupplier::class)->name('create-supplier');

    Route::get('/tags/supplier', TagFournisseurIndex::class)->name('tag-fournisseur');
    Route::get('/create/tags-supplier', CreateTagSupplierIndex::class)->name('create-tag-supplier');

    Route::get('/tags/customer', TagCustomerIndex::class)->name('tag-customer');
    Route::get('/create/tags/customer', CreateTagCustomerIndex::class)->name('create-tag-customer');
    
    //Produits et services
    Route::get('/produits', IndexProduit::class)->name('produits');
    Route::get('/create/produits', CreateProduits::class)->name('create-produits');
    Route::get('/create/services', CreateServices::class)->name('create-services');
    
    Route::get('/produits-dashboard', ProduitsDashboardIndex::class)->name('create-produits-dashboard');

    //Projets et taches
    Route::get('/projets', ProjetIndex::class)->name('projets');
    Route::get('/projet/create', CreateProjet::class)->name('create-project');
    
    Route::get('/taches', TachesIndex::class)->name('taches');
    Route::get('/tache/create', CreateTaches::class)->name('create-tache');  

    Route::get('/vente', TiersIndex::class)->name('vente');
    Route::get('/create/sale', CreateTiers::class)->name('create-sale');

    //Factures
    Route::get('/facture', FacturesIndex::class)->name('factures');
    Route::get('/facture/fournisseur', FacturesFournisseurIndex::class)->name('factures-fournisseur');
    Route::get('/create/factures', CreateFactures::class)->name('create-factures');
    Route::get('/create/factures-fournisseur', CreateFacturesFournisseur::class)->name('create-factures-fournisseur');
    Route::get('/facture/client/liste-modeles', ListesModelesFacturesClients::class)->name('liste-modeles-clients');
    Route::get('/facture/client/reglement', ReglementsClients::class)->name('reglement-clients');
    Route::get('/facture/client/rapport', RapportsClients::class)->name('rapport-clients');
    Route::get('/facture/client/statistique', StatistiquesClients::class)->name('statistiques-clients');
    Route::get('/facture/client/liste', ListeFacturesClients::class)->name('liste-factures-clients');

    //Banques
    Route::get('/banque', BanquesIndex::class)->name('banques');
    Route::get('/create/banques', CreateBanques::class)->name('create-banques');

    //Comptabilité
    Route::get('/comptabilite', ComptabiliteIndex::class)->name('comptabilite');
    Route::get('/create/accounting', CreateAccounting::class)->name('create-accounting');

    //GRH
    Route::get('/grh', GrhIndex::class)->name('grh');
    Route::get('/create/grh', CreateGrh::class)->name('create-grh');


    //Email
    Route::get('/email', EmailIndex::class)->name('email');
    Route::get('/create/mail', CreateMail::class)->name('create-mail');

    //Document
    Route::get('/document', DocumentIndex::class)->name('document');
    Route::get('/create/document', CreateDocument::class)->name('create-document');

    //Chat
    Route::get('/chat', ChatIndex::class)->name('chat');
    Route::get('/create/chat', CreateChat::class)->name('create-chat');
    
});
