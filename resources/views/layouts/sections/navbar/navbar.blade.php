<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    $containerNav = $configData['contentLayout'] === 'compact' ? 'container-xxl' : 'container-fluid';
    $navbarDetached = $navbarDetached ?? '';
    $user = Auth::user();
@endphp

<!-- Navbar -->
<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl">
        <div class="navbar-brand app-brand demo d-none  d-xl-flex py-0 me-4">

            @if (isset($menuHorizontal))
                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                    <i class="ti ti-x ti-md align-middle"></i>
                </a>
            @endif
        </div>
        <ul class="navbar-nav flex-row align-items-center justify-content-center gap-6">
            <li class="nav-item flex-column align-items-center d-xl-flex">
                <a href="{{ route('home') }}" class="menu-link" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="{{ __('Accueil') }}">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                </a>
                <div data-i18n="Accueil"
                    class="{{ request()->routeIs(['home']) ? 'text-primary' : '' }}">
                    Accueil</div>
            </li>

            <!-- Tiers -->
            <li class="nav-item flex-column align-items-center d-xl-flex">
                <a href="{{ route('tiers-dashboard') }}"
                    class="menu-link {{ $currentRouteName === 'tiers-dashboard' ? 'active' : '' }}"
                    onclick="showTiersMenu(event)" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="{{ __('Tiers') }}">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                </a>
                <div data-i18n="Tiers"
                    class="{{ request()->routeIs([
                        'tiers',
                        'create-tiers',
                        'contact',
                        'create-contact',
                        'tag-customer',
                        'info-tiers',
                        'create-tag-customer',
                        'create-tag-supplier',
                        'tag-contact',
                        'create-tag-contact',
                        'tiers-dashboard',
                        'nouveau-devis',
                        'liste-devis',
                        'contacts-dashboard',
                        'devis-dashboard'
                    ])
                        ? 'text-primary'
                        : '' }}">
                    CRM</div>
            </li>

            <!-- Produits -->
            <li class="nav-item flex-column align-items-center d-xl-flex">
                <a href="{{ Route('produits') }}" class="menu-link" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="{{ __('Logistique') }}">
                    <i class="menu-icon tf-icons ti ti-cube"></i>
                </a>
                <div data-i18n="Services"
                    class="{{ request()->routeIs([
                        'produits',
                        'create-produits',
                        'liste-produits-clients',
                        'liste-stocks-clients',
                        'attribut-list',
                        'create-attribut',
                        'tag-produit',
                        'create-tag-produit',
                        'produit-statistique',
                        'liste-services-clients',
                    ])
                        ? 'text-primary'
                        : '' }}">
                    Logistique</div>
            </li>

            <!-- Ventes -->
            <li class="nav-item flex-column align-items-center d-xl-flex">
                <a href="{{ Route('ventes') }}" class="menu-link" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="{{ __('Ventes') }}">
                    <i class="menu-icon tf-icons ti ti ti-shopping-bag"> </i>

                </a>
                <div data-i18n="Ventes"
                    class="{{ request()->routeIs([
                        'ventes',
                        'new-proposition',
                        'new-opportunity',
                        'liste-proposition',
                        'stat-vente',
                        'commande',
                        'liste-commande',
                        'stat-commande',
                        'vente-fournisseur',
                        'commande-fournisseur',
                    ])
                        ? 'text-primary'
                        : '' }}">
                    Ventes</div>
            </li>

            <!-- Projets et Tâches -->
            <li
                class="menu-item flex-column align-items-center d-xl-flex {{ request()->routeIs('projets', 'create-project') ? 'active' : '' }}">
                <a href="{{ route('projets') }}" class="menu-link" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="{{ __('Projets') }}">
                    <i class="menu-icon tf-icons ti ti-folder"></i>
                </a>
                <div data-i18n="Projet"
                    class="{{ request()->routeIs(['projets', 'create-project', 'taches', 'create-tache']) ? 'text-primary' : '' }}">
                    Projets | Tâches</div>
            </li>

            {{-- Comptabilité  --}}
            <li
                class="menu-item flex-column align-items-center d-xl-flex{{ in_array($currentRouteName, ['comptabiliteDashbord']) ? 'active open' : '' }}">
                <a href="{{ Route('comptabiliteDashbord') }}" class="menu-link menu-toggle" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="{{ __('Comptabilité') }}">
                    <i class="menu-icon tf-icons ti ti-chart-bar"></i>
                </a>
                <div data-i18n="Compta"
                    class="{{ request()->routeIs([
                        'factures',
                        'create-factures',
                        'factures-fournisseur',
                        'create-factures-fournisseur',
                        'liste-modeles-clients',
                        'reglement-clients',
                        'rapport-clients',
                        'statistiques-clients',
                        'liste-factures-clients',
                        'liste-modeles-fournisseur',
                        'reglement-fournisseur',
                        'rapport-fournisseur',
                        'statistiques-fournisseur',
                        'commandes-facturables',
                        'dons',
                        'create-charge',
                    ])
                        ? 'text-primary'
                        : '' }}">
                    Comptabilité</div>
            </li>

            {{-- Factures --}}
            {{-- <li class="menu-item flex-column align-items-center d-xl-flex {{ in_array($currentRouteName, ['factures', 'create-factures', 'factures-fournisseur', 'create-factures-fournisseur']) ? 'active open' : '' }}">
                <a href="{{ route('factures') }}" class="menu-link menu-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('Factures') }}">
                    <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                </a>
                <div data-i18n="Factures">Factures</div>
              </li> --}}

            @switch($user->plan)
                @case('standard')
                    {{-- Banque et caisse --}}
                    <li
                        class="menu-item flex-column align-items-center d-xl-flex {{ in_array($currentRouteName, ['banque', 'create-bank']) ? 'active open' : '' }}">
                        <a href="{{ route('banques') }}" class="menu-link menu-toggle" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="{{ __('Banques / Caisses') }}">
                            <i class="menu-icon tf-icons ti ti-building-bank"></i>
                        </a>
                        <div data-i18n="banque">Banques | Caisses</div>
                    </li>


                    {{-- Email --}}
                    <li
                        class="menu-item flex-column align-items-center d-xl-flex{{ in_array($currentRouteName, ['email', 'create-mail']) ? 'active open' : '' }}">
                        <a href="{{ Route('email') }}" class="menu-link menu-toggle" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="{{ __('Email') }}">
                            <i class="menu-icon tf-icons ti ti-mail"></i>
                        </a>
                        <div data-i18n="Email">Email</div>
                    </li>
                @break

                @case('premium')
                    {{-- Banque et caisse --}}
                    <li
                        class="menu-item flex-column align-items-center d-xl-flex {{ in_array($currentRouteName, ['banque', 'create-bank']) ? 'active open' : '' }}">
                        <a href="{{ route('banques') }}" class="menu-link menu-toggle" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="{{ __('Banques / Caisses') }}">
                            <i class="menu-icon tf-icons ti ti-building-bank"></i>
                        </a>
                        <div data-i18n="banque">Banques | Caisses</div>
                    </li>
                    {{-- GRH --}}
                    <li
                        class="menu-item flex-column align-items-center d-xl-flex {{ in_array($currentRouteName, ['grh', 'create-grh']) ? 'active open' : '' }}">
                        <a href="{{ Route('grh') }}" class="menu-link menu-toggle" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="{{ __('GRH') }}">
                            <i class="menu-icon tf-icons ti ti-user"></i>
                        </a>
                        <div data-i18n="Grh">GRH</div>
                    </li>

                    {{-- Email --}}
                    <li
                        class="menu-item flex-column align-items-center d-xl-flex{{ in_array($currentRouteName, ['email', 'create-mail']) ? 'active open' : '' }}">
                        <a href="{{ Route('email') }}" class="menu-link menu-toggle" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="{{ __('Email') }}">
                            <i class="menu-icon tf-icons ti ti-mail"></i>
                        </a>
                        <div data-i18n="Email">Email</div>
                    </li>

                    {{-- Document --}}
                    <li
                        class="menu-item flex-column align-items-center d-xl-flex {{ in_array($currentRouteName, ['document', 'create-document']) ? 'active open' : '' }}">
                        <a href="{{ Route('document') }}" class="menu-link menu-toggle" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="{{ __('Documents') }}">
                            <i class="menu-icon tf-icons ti ti-files"></i>
                        </a>
                        <div data-i18n="Document">Document</div>
                    </li>

                    {{-- Chat --}}
                    <li
                        class="menu-item flex-column align-items-center  d-xl-flex {{ in_array($currentRouteName, ['chat', 'create-chat']) ? 'active open' : '' }}">
                        <a href="{{ Route('chat') }}" class="menu-link menu-toggle" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="{{ __('Chat') }}">
                            <i class="menu-icon tf-icons ti ti-message-chatbot"></i>
                        </a>
                        <div data-i18n="Chat">Chat</div>
                    </li>
                @break

            </ul>
        @endswitch
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            {{-- <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a> --}}
        </div>


        {{-- MENU SETTINGS --}}
        <div class="d-flex align-items-center " id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">


                <!-- Quick links  -->
                <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown">
                    <a class="nav-link btn btn-text-secondary btn-icon rounded-pill btn-icon dropdown-toggle hide-arrow"
                        href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                        aria-expanded="false">
                        <i class='ti ti-layout-grid-add ti-md'></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-0">
                        <div class="dropdown-menu-header border-bottom">
                            <div class="dropdown-header d-flex align-items-center py-3">
                                <h6 class="mb-0 me-auto">Raccourcis</h6>
                                <a href="javascript:void(0)"
                                    class="btn btn-text-secondary rounded-pill btn-icon dropdown-shortcuts-add"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="ajouter un raccourci"><i
                                        class="ti ti-plus text-heading"></i></a>
                            </div>
                        </div>
                        <div class="dropdown-shortcuts-list scrollable-container">
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-calendar ti-26px text-heading"></i>
                                    </span>
                                    <a href="{{ url('app/calendar') }}" class="stretched-link">Calendrier</a>
                                    <small>Rendez-vous</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-file-dollar ti-26px text-heading"></i>
                                    </span>
                                    <a href="{{ url('app/invoice/list') }}" class="stretched-link">Facturation</a>
                                    <small>Gérer les comptes</small>
                                </div>
                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-user ti-26px text-heading"></i>
                                    </span>
                                    <a href="{{ url('app/user/list') }}" class="stretched-link">Utilisateurs</a>
                                    <small>Gérer les utilisateurs</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-users ti-26px text-heading"></i>
                                    </span>
                                    <a href="{{ url('app/access-roles') }}" class="stretched-link">Gestion des
                                        rôles</a>
                                    <small>
                                        Autorisation</small>
                                </div>
                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-device-desktop-analytics ti-26px text-heading"></i>
                                    </span>
                                    <a href="{{ url('/') }}" class="stretched-link">Tableau de bord</a>
                                    <small>Tableau de bord utilisateur</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-settings ti-26px text-heading"></i>
                                    </span>
                                    <a href="{{ url('pages/account-settings-account') }}"
                                        class="stretched-link">Paramètres</a>
                                    <small>Paramètres du compte</small>
                                </div>
                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-help ti-26px text-heading"></i>
                                    </span>
                                    <a href="{{ url('pages/faq') }}" class="stretched-link">FAQ</a>
                                    <small>FAQ et articles</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-square ti-26px text-heading"></i>
                                    </span>
                                    <a href="{{ url('modal-examples') }}" class="stretched-link">
                                        Modaux</a>
                                    <small>
                                        Popups utiles</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- Quick links -->

                <!-- Notification -->
                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                    <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                        href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                        aria-expanded="false">
                        <span class="position-relative">
                            <i class="ti ti-bell ti-md"></i>
                            <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-0">
                        <li class="dropdown-menu-header border-bottom">
                            <div class="dropdown-header d-flex align-items-center py-3">
                                <h6 class="mb-0 me-auto">Notification</h6>
                                <div class="d-flex align-items-center h6 mb-0">
                                    <span class="badge bg-label-primary me-2">8 New</span>
                                    <a href="javascript:void(0)"
                                        class="btn btn-text-secondary rounded-pill btn-icon dropdown-notifications-all"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                                            class="ti ti-mail-opened text-heading"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-notifications-list scrollable-container">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 small">Charles Franklin</h6>
                                            <small class="mb-1 d-block text-body">Accepted your connection</small>
                                            <small class="text-muted">12hr ago</small>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="ti ti-x"></span></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="border-top">
                            <div class="d-grid p-4">
                                <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                                    <small class="align-middle">Voir toutes les notifications</small>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!--/ Notification -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                        data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('assets/img/avatars/1.png') }}"
                                alt class="rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item mt-0"
                                href="{{ Route::has('profile.show') ? route('profile.show') : url('pages/profile-user') }}">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-2">
                                        <div class="avatar avatar-online">
                                            <img src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('assets/img/avatars/1.png') }}"
                                                alt class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">
                                            @if (Auth::check())
                                                {{ Auth::user()->name }}
                                            @else
                                                John Doe
                                            @endif
                                        </h6>
                                        <small class="text-muted">Admin</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider my-1 mx-n2"></div>
                        </li>
                        {{-- Pas nécessaire pour le moment --}}
                        {{-- <li>
                <a class="dropdown-item" href="{{ Route::has('profile.show') ? route('profile.show') : url('pages/profile-user') }}">
                  <i class="ti ti-user me-3 ti-md"></i><span class="align-middle">Mon Profile</span>
                </a>
              </li> --}}

                        @if (Auth::check() && Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <li>
                                <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                                    <i class="ti ti-key ti-md me-3"></i><span class="align-middle">API Tokens</span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a class="dropdown-item" href="{{ url('pages/account-settings-billing') }}">
                                <span class="d-flex align-items-center align-middle">
                                    <i class="fas fa-ticket me-3"></i><span
                                        class="flex-grow-1 align-middle">Ticket</span>
                                    <span
                                        class="flex-shrink-0 badge bg-danger d-flex align-items-center justify-content-center">4</span>
                                </span>
                            </a>
                        </li>

                        @if (Auth::User() && Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <li>
                                <div class="dropdown-divider my-1 mx-n2"></div>
                            </li>
                            <li>
                                <h6 class="dropdown-header">Manage Team</h6>
                            </li>
                            <li>
                                <div class="dropdown-divider my-1 mx-n2"></div>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ Auth::user() ? route('teams.show', Auth::user()->currentTeam->id) : 'javascript:void(0)' }}">
                                    <i class="ti ti-settings ti-md me-3"></i><span class="align-middle">Team
                                        Settings</span>
                                </a>
                            </li>
                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <li>
                                    <a class="dropdown-item" href="{{ route('teams.create') }}">
                                        <i class="ti ti-user ti-md me-3"></i><span class="align-middle">Create New
                                            Team</span>
                                    </a>
                                </li>
                            @endcan

                            @if (Auth::user()->allTeams()->count() > 1)
                                <li>
                                    <div class="dropdown-divider my-1 mx-n2"></div>
                                </li>
                                <li>
                                    <h6 class="dropdown-header">Switch Teams</h6>
                                </li>
                                <li>
                                    <div class="dropdown-divider my-1 mx-n2"></div>
                                </li>
                            @endif

                            @if (Auth::user())
                                @foreach (Auth::user()->allTeams() as $team)
                                    {{-- Below commented code read by artisan command while installing jetstream. !! Do not remove if you want to use jetstream. --}}

                                    {{-- <x-switchable-team :team="$team" /> --}}
                                @endforeach
                            @endif
                        @endif
                        <li>
                            <div class="dropdown-divider my-1 mx-n2"></div>
                        </li>
                        @if (Auth::check())
                            <li>
                                <div class="d-grid px-2 pt-2 pb-1">
                                    <a class="btn btn-sm btn-danger d-flex" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <small class="align-middle">Se déconnecter</small>
                                        <i class="ti ti-logout ms-2 ti-14px"></i>
                                    </a>
                                </div>
                            </li>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        @else
                            <li>
                                <div class="d-grid px-2 pt-2 pb-1">
                                    <a class="btn btn-sm btn-danger d-flex"
                                        href="{{ Route::has('login') ? route('login') : url('auth/login-basic') }}">
                                        <small class="align-middle">Se connecter</small>
                                        <i class="ti ti-login ms-2 ti-14px"></i>
                                    </a>
                                </div>
                            </li>
                        @endif
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>

    </div>
</nav>
<!-- / Navbar -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
