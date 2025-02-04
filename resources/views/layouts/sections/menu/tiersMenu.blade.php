<!-- File: layouts/sections/menu/tiersMenu.blade.php -->
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

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
        <li class="menu-item ">
            <a href="#" class="menu-link fw-bold">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div class="text-bold">{{ __('Tiers') }}</div>
            </a>
        </li>
        <li class="menu-item {{ $currentRouteName === 'create-tiers' ? 'active' : '' }}">
            <a href="{{ route('create-tiers') }}" class="menu-link">
                <div>{{ __('Créer un tiers') }}</div>
            </a>
        </li>
        <li class="menu-item {{ $currentRouteName === 'tiers' ? 'active' : '' }}">
            <a href="{{ route('tiers') }}" class="menu-link">
                <div>{{ __('Liste des tiers') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'create-prospects' ? 'active' : '' }}">
            <a href="{{ route('create-prospects') }}" class="menu-link">
                <div>{{ __('Créer un prospect') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'prospects' ? 'active' : '' }}">
            <a href="{{ route('prospects') }}" class="menu-link">
                <div>{{ __('Liste des prospects') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'create-supplier' ? 'active' : '' }}">
            <a href="{{ route('create-supplier') }}" class="menu-link">
                <div>{{ __('Créer un fournisseur') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'fournisseur' ? 'active' : '' }}">
            <a href="{{ route('fournisseur') }}" class="menu-link">
                <div>{{ __('Liste des fournisseurs') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'create-contact' ? 'active' : '' }}">
            <a href="{{ route('create-contact') }}" class="menu-link">
                <div>{{ __('Créer un contact') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'contact' ? 'active' : '' }}">
            <a href="{{ route('contact') }}" class="menu-link">
                <div>{{ __('Liste des contacts') }}</div>
            </a>
        </li>

      

        
    </ul>
</aside>
