<!-- File: layouts/sections/menu/produitsMenu.blade.php -->
@include('_partials.app-brand', ['navbarFull' => $navbarFull ?? null])

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
        <!-- Produits -->
        <li class="menu-item {{ in_array($currentRouteName, ['produits','create-produits','liste-produits-clients','liste-stocks-clients','liste-stocks-lots','lots-serie-list','attribut-list','create-attribut','create-lot-serie','tag-produit','create-tag-produit']) ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-cube"></i>
                <div class="text-bold">{{ __('Produits') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'create-produits' ? 'active' : '' }}">
                    <a href="{{ route('create-produits') }}" class="menu-link">
                        <div>{{ __('Nouveau produit') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'liste-produits-clients' ? 'active' : '' }}">
                    <a href="{{ route('liste-produits-clients') }}" class="menu-link">
                        <div>{{ __('Liste des produits') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'liste-stocks-clients' ? 'active' : '' }}">
                    <a href="{{Route('liste-stocks-clients')}}" class="menu-link">
                        <div>{{ __('Stocks') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'liste-stocks-lots' ? 'active' : '' }}">
                    <a href="{{Route('liste-stocks-lots')}}" class="menu-link">
                        <div>{{ __('Stocks par lot/série') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'lots-serie-list' ? 'active' : '' }}">
                    <a href="{{Route('lots-serie-list')}}" class="menu-link">
                        <div>{{ __('Lots/séries') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'attribut-list' ? 'active' : '' }}">
                    <a href="{{Route('attribut-list')}}" class="menu-link">
                        <div>{{ __('Attributs de variante') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'tag-produit' ? 'active' : '' }}">
                    <a href="{{Route('tag-produit')}}" class="menu-link">
                        <div>{{ __('Tags/catégories produits') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Services -->
        <li class="menu-item {{ in_array($currentRouteName, ['']) ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-concierge-bell"></i>
                <div class="text-bold">{{ __('Services') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'create-services' ? 'active' : '' }}">
                    <a href="{{ route('create-services') }}" class="menu-link">
                        <div>{{ __('Créer un service') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Liste des services') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Attributs de variante') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Tags/catégories services') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Entrepôts -->
        <li class="menu-item {{ in_array($currentRouteName, ['']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-box-open"></i>
                <div class="text-bold">{{ __('Entrepôts') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Créer un entrepôt') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Liste des entrepôts') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Mouvements') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Transfert de stock en masse') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Réapprovisionnement') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Stock à date') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Tags/catégories entrepôts') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Inventaires -->
        <li class="menu-item {{ in_array($currentRouteName, ['']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-boxes"></i>
                <div class="text-bold">{{ __('Inventaires') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Nouvel Inventaire') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Liste des inventaires') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Expeditions -->
        <li class="menu-item {{ in_array($currentRouteName, ['']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-dolly"></i>
                <div class="text-bold">{{ __('Expéditions') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Nouvelle expédition') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Liste des expéditions') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Réceptions -->
        <li class="menu-item {{ in_array($currentRouteName, ['']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-dolly" style="transform: scaleX(-1);"></i>
                <div class="text-bold">{{ __('Réceptions') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Nouvelle réception') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Liste des réceptions') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
