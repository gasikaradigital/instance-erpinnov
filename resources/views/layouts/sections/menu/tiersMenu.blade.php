<!-- File: layouts/sections/menu/tiersMenu.blade.php -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
        <li class="menu-item ">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div class="text-bold">{{ __('Tiers') }}</div>
            </a>
        </li>
        <li class="menu-item {{ $currentRouteName === 'tiers' ? 'active' : '' }}">
            <a href="{{ route('tiers') }}" class="menu-link">
                <div>{{ __('Liste des tiers') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'create-tiers' ? 'active' : '' }}">
            <a href="{{ route('create-tiers') }}" class="menu-link">
                <div>{{ __('Créer un tiers') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'prospects' ? 'active' : '' }}">
            <a href="{{ route('prospects') }}" class="menu-link">
                <div>{{ __('Liste des prospects') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'create-prospects' ? 'active' : '' }}">
            <a href="{{ route('create-prospects') }}" class="menu-link">
                <div>{{ __('Créer un prospect') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'client' ? 'active' : '' }}">
            <a href="{{ route('client') }}" class="menu-link">
                <div>{{ __('Liste des clients') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'create-customer' ? 'active' : '' }}">
            <a href="{{ route('create-customer') }}" class="menu-link">
                <div>{{ __('Créer un client') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'fournisseur' ? 'active' : '' }}">
            <a href="{{ route('fournisseur') }}" class="menu-link">
                <div>{{ __('Liste des fournisseurs') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'create-supplier' ? 'active' : '' }}">
            <a href="{{ route('create-supplier') }}" class="menu-link">
                <div>{{ __('Créer un fournisseur') }}</div>
            </a>
        </li>
    </ul>
</aside>
