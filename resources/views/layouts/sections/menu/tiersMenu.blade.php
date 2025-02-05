<!-- File: layouts/sections/menu/tiersMenu.blade.php -->
  <!-- ! Hide app brand if navbar-full -->
  @if (!isset($navbarFull))
  <div class="app-brand demo">
      <a href="{{ url('/') }}" class="app-brand-link">
          <!-- <span class="app-brand-logo demo">@include('_partials.macros', ['height' => 20])</span> -->
          <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo de GasikaraDigital" height="20">
          <span class="app-brand-text demo menu-text fw-bold">{{ config('variables.templateName') }}</span>
      </a>

      {{-- <div class="row">
        <div class="col-md-10 offset-md-1">
            <form action="javascript:void(0)" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Entrez un caractère ou plus..."  name="search_term" aria-label="Rechercher" value="">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div> --}}
  </div>
@endif

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
       
        
        <li class="menu-item {{ in_array($currentRouteName, ['tiers-dashboard', 'create-tiers', 'tiers', 'prospects', 'tag-customer', 'fournisseur', 'tag-fournisseur']) ? 'active open' : '' }}">
            <a href="{{Route('tiers-dashboard')}}" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div class="text-bold">{{ __('Tiers') }}</div>
            </a>
            
            <ul class="menu-sub">
        
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
                <li class="menu-item {{ $currentRouteName === 'prospects' ? 'active' : '' }}">
                    <a href="{{ route('prospects') }}" class="menu-link">
                        <div>{{ __('Liste des prospects') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'tag-customer' ? 'active' : '' }}">
                    <a href="{{ route('tag-customer') }}" class="menu-link">
                        <div>{{ __('Tags/catégories prospects') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('fournisseur') }}" class="menu-link">
                        <div>{{ __('Liste des fournisseurs') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'tag-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('tag-fournisseur') }}" class="menu-link">
                        <div>{{ __('Tags/catégories fournisseurs') }}</div>
                    </a>
                </li>
            </ul>
        </li>
    
    <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Apps & Pages">Contacts</span>
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

        <li class="menu-item {{ $currentRouteName === 'tag-contact' ? 'active' : '' }}">
            <a href="{{ route('tag-contact') }}" class="menu-link">
                <div>{{ __('Tags/catégories contacts') }}</div>
            </a>
        </li>

    </ul>
</aside>
