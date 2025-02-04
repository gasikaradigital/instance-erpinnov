<!-- File: layouts/sections/menu/facturesMenu.blade.php -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
        <!-- Factures clients -->
        <li class="menu-item ">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building-bank"></i>
                <div class="text-bold">{{ __('Banques | Caisses') }}</div>
            </a>
        </li>
        
        <li class="menu-item {{ $currentRouteName === 'create-banques' ? 'active' : '' }}">
            <a href="{{ route('create-banques') }}" class="menu-link">
                <div>{{ __('Nouveau compte') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'banques' ? 'active' : '' }}">
            <a href="{{ route('banques') }}" class="menu-link">
                <div>{{ __('Liste') }}</div>
            </a>
        </li>
        
    </ul>
</aside>
