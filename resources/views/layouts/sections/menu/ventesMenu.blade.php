@include('_partials.app-brand', ['navbarFull' => $navbarFull ?? null])

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
        <!-- Ventes-->
        <li class="menu-item {{ in_array($currentRouteName, ['ventes','new-proposition','new-opportunity','liste-proposition','stat-vente']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-file-signature"></i>
                <div class="text-bold">{{ __('Proposition de ventes') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'new-proposition' ? 'active' : '' }}">
                    <a href="{{Route('new-proposition')}}" class="menu-link">
                        <div>{{ __('Nouvelle proposition') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'liste-proposition' ? 'active' : '' }}">
                    <a href="{{Route('liste-proposition')}}" class="menu-link">
                        <div>{{ __('Liste des propositions') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'stat-vente' ? 'active' : '' }}">
                    <a href="{{Route('stat-vente')}}" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Commandes-->
        <li class="menu-item {{ in_array($currentRouteName, ['commande','liste-commande','stat-commande']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-file-invoice"></i>
                <div class="text-bold">{{ __('Commandes') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'commande' ? 'active' : '' }}">
                    <a href="{{Route('commande')}}" class="menu-link">
                        <div>{{ __('Nouvelle commande') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'liste-commande' ? 'active' : '' }}">
                    <a href="{{Route('liste-commande')}}" class="menu-link">
                        <div>{{ __('Liste des commandes') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'stat-commande' ? 'active' : '' }}">
                    <a href="{{Route('stat-commande')}}" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>


        <!-- propositions de ventes fournisseurs-->
        <li class="menu-item {{ in_array($currentRouteName, ['vente-fournisseur']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-file-invoice"></i>
                <div class="text-bold">{{ __('Propositions de ventes fournisseurs') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'vente-fournisseur' ? 'active' : '' }}">
                    <a href="{{route('vente-fournisseur')}}" class="menu-link">
                        <div>{{ __('Nouvelle demande de prix') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Liste') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- commandes fournisseurs-->
        <li class="menu-item {{ in_array($currentRouteName, ['commande-fournisseur']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-file-invoice"></i>
                <div class="text-bold">{{ __('Commandes fournisseurs') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'commande-fournisseur' ? 'active' : '' }}">
                    <a href="{{route('commande-fournisseur')}}" class="menu-link">
                        <div>{{ __('Nouvelle commande') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Liste') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- contrats/abonnements-->
        <li class="menu-item {{ in_array($currentRouteName, ['']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-file-invoice"></i>
                <div class="text-bold">{{ __('Contrats/Abonnements') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Nouvelle contrat/abonn.') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Liste') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Interventions-->
        <li class="menu-item {{ in_array($currentRouteName, ['']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon fas fa-file-invoice"></i>
                <div class="text-bold">{{ __('Interventions') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Nouvelle intervention') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Liste') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>
    </aside>