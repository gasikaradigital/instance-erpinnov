@php
use Illuminate\Support\Facades\Route;
$configData = Helper::appClasses();
$currentRouteName = Route::currentRouteName();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <!-- ! Hide app brand if navbar-full -->
  @if(!isset($navbarFull))
    <div class="app-brand demo">
      <a href="{{url('/')}}" class="app-brand-link">
        <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20])</span>
        <span class="app-brand-text demo menu-text fw-bold">{{config('variables.templateName')}}</span>
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
    <li class="menu-item {{ $currentRouteName === 'tiers' ? 'active' : '' }}">
      <a href="{{ route('tiers') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div>{{ __('Tiers') }}</div>
      </a>
    </li>

    {{-- Produits --}}
    <li class="menu-item {{ in_array($currentRouteName, ['produits', 'create-produits', 'create-services']) ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-box"></i>
        <div>{{ __('Produits') }}</div>
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

    {{-- Tâches --}}
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
    </li>
  </ul>
</aside>
