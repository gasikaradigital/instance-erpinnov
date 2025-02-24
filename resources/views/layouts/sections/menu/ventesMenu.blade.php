@include('_partials.app-brand', ['navbarFull' => $navbarFull ?? null])

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
        <!-- Ventes-->
        <li class="menu-item {{ in_array($currentRouteName, ['ventes','new-proposition','commande','new-opportunity','liste-proposition','stat-vente']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-file-invoice-dollar"></i>
                <div class="text-bold">{{ __('Gestion de ventes') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'new-proposition' ? 'active' : '' }}">
                    <a href="{{ route('new-proposition') }}" class="menu-link">
                        <div>{{ __('Nouveau') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ $currentRouteName === 'liste-proposition' ? 'active' : '' }}">
                    <a href="{{Route('liste-proposition')}}" class="menu-link">
                        <div>{{ __('Liste') }}</div>
                    </a>
                   
                </li>
                <li class="menu-item {{ $currentRouteName === 'stat-vente' ? 'active' : '' }}">
                    <a href="{{Route('stat-vente')}}" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>

      
    </aside>