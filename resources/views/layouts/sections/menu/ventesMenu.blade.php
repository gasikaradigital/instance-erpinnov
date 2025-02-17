@include('_partials.app-brand', ['navbarFull' => $navbarFull ?? null])

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
        <!-- Ventes-->
        <li class="menu-item {{ in_array($currentRouteName, ['ventes']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-file-signature text-success me-2"></i>
                <div class="text-bold">{{ __('Proposition de ventes') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Test') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'liste-produits-clients' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('test') }}</div>
                    </a>
                </li>
            </ul>
        </li>
    </aside>