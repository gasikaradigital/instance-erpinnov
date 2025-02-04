@php
    use Illuminate\Support\Facades\Route;
    $configData = Helper::appClasses();
    $currentRouteName = Route::currentRouteName();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- ! Hide app brand if navbar-full -->
    @if (!isset($navbarFull))
        <div class="app-brand demo">
            <a href="{{ url('/') }}" class="app-brand-link">
                <!-- <span class="app-brand-logo demo">@include('_partials.macros', ['height' => 20])</span> -->
                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo de GasikaraDigital" height="20">
                <span class="app-brand-text demo menu-text fw-bold">{{ config('variables.templateName') }}</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
            </a>
        </div>
    @endif

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {{-- Accueil --}}
        <li class="menu-item {{ $currentRouteName === 'home' ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('Accueil') }}</div>
            </a>
        </li>

        {{-- Tableau de bord --}}

        <li class="menu-item {{ in_array($currentRouteName, ['tiers', 'create-tiers', 'prospects', 'create-prospects', 'client', 'create-customer', 'fournisseur', 'create-supplier']) ? 'active ' : '' }}">
            <a href="javascript:void(0);" class="menu-link fw-bold" >
                <i class="fas fa-chart-bar fa-fw"></i>
                <div>{{ __('Mon tableau de bord') }}</div>
            </a>
        </li>


        {{-- Configuration --}}
        <li
            class="menu-item {{ in_array($currentRouteName, ['produits', 'create-produits', 'create-services']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle fw-bold">
                <i class="fas fa-tools fa-fw"></i>
                <div>{{ __('Configuration') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'produits' ? 'active' : '' }}">
                    <a href="{{ route('produits') }}" class="menu-link">
                        <div>{{ __('Societé/Organisation') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Outils d'administration --}}
        <li class="menu-item {{ in_array($currentRouteName, ['projets', 'create-project']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle fw-bold">
                <i class="fas fa-server fa-fw"></i>
                <div>{{ __("Outils d'administration") }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'projets' ? 'active' : '' }}">
                    <a href="{{ route('projets') }}" class="menu-link">
                        <div>{{ __('Liste des projets') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'create-project' ? 'active' : '' }}">
                    <a href="{{ route('create-project') }}" class="menu-link">
                        <div>{{ __('Nouveau projet') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Utilisateurs & Groupes --}}
        <li class="menu-item {{ in_array($currentRouteName, ['vente', 'create-sale']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div>{{ __('Ventes') }}</div>
            </a>
        </li>

        {{-- Factures --}}
        <li class="menu-item {{ in_array($currentRouteName, ['factures', 'create-invoices']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div>{{ __('Factures') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'factures' ? 'active' : '' }}">
                    <a href="{{ route('factures') }}" class="menu-link">
                        <div>{{ __('Liste des factures') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Banque et caisse  À VERIFIER --}}
        <li class="menu-item {{ in_array($currentRouteName, ['banques', 'create-banques']) ? 'active open' : '' }}">
            <a href="{{ route('banques') }}" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-building-bank"></i>
                <div>{{ __('Banques / Caisses') }}</div>
            </a>
        </li>

        {{-- Comptabilité  À VERIFIER --}}
        <li
            class="menu-item {{ in_array($currentRouteName, ['comptabilite', 'create-accounting']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-chart-bar"></i>
                <div>{{ __('Comptabilités') }}</div>
            </a>
        </li>

        {{-- GRH  À VERIFIER --}}
        <li class="menu-item {{ in_array($currentRouteName, ['grh', 'create-grh']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div>{{ __('GRH') }}</div>
            </a>
        </li>

        {{-- Email  À VERIFIER --}}
        <li class="menu-item {{ in_array($currentRouteName, ['email', 'create-mail']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-mail"></i>
                <div>{{ __('Email') }}</div>
            </a>
        </li>
    </ul>
</aside>
