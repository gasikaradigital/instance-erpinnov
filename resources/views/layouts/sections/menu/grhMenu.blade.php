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
        <li class="menu-item {{ $currentRouteName === 'create-salary' ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-user"></i>
                <div class="text-bold">{{ __('Salarié') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'create-salary' ? 'active' : '' }}">
                    <a href="{{ route('create-salary') }}" class="menu-link">
                        <div>{{ __('Nouveau salarié') }}</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
