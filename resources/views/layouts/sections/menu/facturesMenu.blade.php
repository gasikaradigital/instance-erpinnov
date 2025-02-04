<!-- File: layouts/sections/menu/facturesMenu.blade.php -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
        <!-- Factures clients -->
        <li class="menu-item ">
            <a href="#" class="menu-link">
            <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div class="text-bold">{{ __('Factures clients') }}</div>
            </a>
        </li>
        
        <li class="menu-item {{ $currentRouteName === 'create-invoices' ? 'active' : '' }}">
            <a href="{{ route('create-factures') }}" class="menu-link">
                <div>{{ __('Nouvelle facture') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'factures' ? 'active' : '' }}">
            <a href="{{ route('factures') }}" class="menu-link">
                <div>{{ __('Liste') }}</div>
            </a>
        </li>

        <!-- Factures fournisseurs -->
        <li class="menu-item ">
            <a href="#" class="menu-link">
            <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div class="text-bold">{{ __('Factures fournisseur') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'create-factures-fournisseur' ? 'active' : '' }}">
            <a href="{{ route('create-factures-fournisseur') }}" class="menu-link">
                <div>{{ __('Nouvelle facture') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'factures-fournisseur' ? 'active' : '' }}">
            <a href="{{ route('factures-fournisseur') }}" class="menu-link">
                <div>{{ __('Liste') }}</div>
            </a>
        </li>

        
    </ul>
</aside>
