<!-- File: layouts/sections/menu/produitsMenu.blade.php -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
        <!-- Produits -->
        <li class="menu-item ">
            <a href="#" class="menu-link fw-bold">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div class="text-bold">{{ __('Produits') }}</div>
            </a>
        </li>
        <li class="menu-item {{ $currentRouteName === 'produits' ? 'active' : '' }}">
            <a href="{{ route('produits') }}" class="menu-link">
                <div>{{ __('Liste des produits') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'create-produits' ? 'active' : '' }}">
            <a href="{{ route('create-produits') }}" class="menu-link">
                <div>{{ __('Créer un produits') }}</div>
            </a>
        </li>

        <!-- Services -->
        <li class="menu-item ">
            <a href="#" class="menu-link fw-bold">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div class="text-bold">{{ __('Services') }}</div>
            </a>
        </li>
        <li class="menu-item {{ $currentRouteName === 'create-services' ? 'active' : '' }}">
            <a href="{{ route('create-services') }}" class="menu-link">
                <div>{{ __('Créer un service') }}</div>
            </a>
        </li>
    </ul>
</aside>
