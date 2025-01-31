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
        {{-- Dashboard --}}
        <li class="menu-item {{ $currentRouteName === 'home' ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('Dashboard') }}</div>
            </a>
        </li>

        {{-- Tiers --}}

        <li class="menu-item {{ in_array($currentRouteName, ['tiers', 'create-tiers', 'prospects', 'create-prospects', 'client', 'create-customer', 'fournisseur', 'create-supplier']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div>{{ __('Tiers') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'tiers' ? 'active' : '' }}">
                    <a href="{{ route('tiers') }}" class="menu-link">
                        <div>{{ __('Liste des tiers') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'create-tiers' ? 'active' : '' }} ">
                    <a href="{{ route('create-tiers') }}" class="menu-link">
                        <div>{{ __('Nouveau tiers') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'prospects' ? 'active' : '' }} ">
                    <a href="{{ route('prospects') }}" class="menu-link">
                        <div>{{ __('Prospects') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'create-prospects' ? 'active' : '' }} ">
                    <a href="{{ route('create-prospects') }}" class="menu-link">
                        <div>{{ __('Nouveau prospects') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'client' ? 'active' : '' }} ">
                    <a href="{{ route('client') }}" class="menu-link">
                        <div>{{ __('Clients') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'create-customer' ? 'active' : '' }} ">
                    <a href="{{ route('create-customer') }}" class="menu-link">
                        <div>{{ __('Nouveau client') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'fournisseur' ? 'active' : '' }} ">
                    <a href="{{ route('fournisseur') }}" class="menu-link">
                        <div>{{ __('Fournisseurs') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'create-supplier' ? 'active' : '' }} ">
                    <a href="{{ route('create-supplier') }}" class="menu-link">
                        <div>{{ __('Nouveau Fournisseur') }}</div>
                    </a>
                </li>
            </ul>
        </li>


        {{-- Produits --}}
        <li
            class="menu-item {{ in_array($currentRouteName, ['produits', 'create-produits', 'create-services']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-box"></i>
                <div>{{ __('Produits / Services') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'produits' ? 'active' : '' }}">
                    <a href="{{ route('produits') }}" class="menu-link">
                        <div>{{ __('Liste des produits') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'create-produits' ? 'active' : '' }}">
                    <a href="{{ route('create-produits') }}" class="menu-link">
                        <div>{{ __('Nouveau produit') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'create-services' ? 'active' : '' }}">
                    <a href="{{ route('create-services') }}" class="menu-link">
                        <div>{{ __('Nouveau service') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Projets --}}
        <li class="menu-item {{ in_array($currentRouteName, ['projets', 'create-project']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-folder"></i>
                <div>{{ __('Projets') }}</div>
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

        {{-- Ventes --}}
        <li class="menu-item {{ in_array($currentRouteName, ['vente', 'create-sale']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div>{{ __('Ventes') }}</div>
            </a>
        </li>

        {{-- Factures --}}
        <li class="menu-item {{ in_array($currentRouteName, ['facture', 'create-invoices']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div>{{ __('Factures') }}</div>
            </a>
        </li>

        {{-- Banque et caisse  À VERIFIER --}}
        <li class="menu-item {{ in_array($currentRouteName, ['banque', 'create-bank']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
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

        {{-- Document À VERIFIER --}}
        <li class="menu-item {{ in_array($currentRouteName, ['document', 'create-document']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-files"></i>
                <div>{{ __('Documents') }}</div>
            </a>
        </li>

        {{-- Chat  À VERIFIER --}}
        <li class="menu-item {{ in_array($currentRouteName, ['chat', 'create-chat']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-message-chatbot"></i>
                <div>{{ __('Chat') }}</div>
            </a>
        </li>

        {{-- Tâches
    <li class="menu-item {{ in_array($currentRouteName, ['taches', 'create-tache']) ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-list-check"></i>
        <div>{{ __('Tâches') }}</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ $currentRouteName === 'taches' ? 'active' : '' }}">
          <a href="{{ route('taches') }}" class="menu-link">
            <div>{{ __('Liste des tâches') }}</div>
          </a>
        </li>
        <li class="menu-item {{ $currentRouteName === 'create-tache' ? 'active' : '' }}">
          <a href="{{ route('create-tache') }}" class="menu-link">
            <div>{{ __('Nouvelle tâche') }}</div>
          </a>
        </li>
      </ul>
    </li> --}}
    </ul>
</aside>
