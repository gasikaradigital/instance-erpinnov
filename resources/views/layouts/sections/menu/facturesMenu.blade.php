<!-- File: layouts/sections/menu/facturesMenu.blade.php -->
@include('_partials.app-brand', ['navbarFull' => $navbarFull ?? null])

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
        <!-- Factures clients -->
        <li class="menu-item {{ in_array($currentRouteName, ['create-factures','liste-factures-clients','liste-modeles-clients','reglement-clients','rapport-clients','statistiques-clients']) ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div class="text-bold">{{ __('Factures clients') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'create-factures' ? 'active' : '' }}">
                    <a href="{{ route('create-factures') }}" class="menu-link">
                        <div>{{ __('Nouvelle facture') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ $currentRouteName === 'liste-factures-clients' ? 'active' : '' }}">
                    <a href="{{ route('liste-factures-clients') }}" class="menu-link">
                        <div>{{ __('Liste') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ $currentRouteName === 'liste-modeles-clients' ? 'active' : '' }}">
                    <a href="{{ route('liste-modeles-clients') }}" class="menu-link">
                        <div>{{ __('Liste des modèles') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ $currentRouteName === 'reglement-clients' ? 'active' : '' }}">
                    <a href="{{ route('reglement-clients') }}" class="menu-link">
                        <div>{{ __('Règlements') }}</div>
                    </a>
                    <ul>
                        <li class="menu-item {{ $currentRouteName === 'rapport-clients' ? 'active' : '' }}">
                            <a href="{{ route('rapport-clients') }}" class="menu-link">
                                <div>{{ __('Rapports') }}</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item {{ $currentRouteName === 'statistiques-clients' ? 'active' : '' }}">
                    <a href="{{ route('statistiques-clients') }}" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        
        <!-- Factures fournisseurs -->
        <li class="menu-item {{ in_array($currentRouteName, ['create-factures-fournisseur','factures-fournisseur', 'liste-modeles-fournisseur']) ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div class="text-bold">{{ __('Factures fournisseur') }}</div>
            </a>

            <ul class="menu-sub">
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

                <li class="menu-item {{ $currentRouteName === 'liste-modeles-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('liste-modeles-fournisseur') }}" class="menu-link">
                        <div>{{ __('Liste des modèles') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ $currentRouteName === 'reglement-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('reglement-fournisseur') }}" class="menu-link">
                        <div>{{ __('Règlements') }}</div>
                    </a>
                    <ul>
                        <li class="menu-item {{ $currentRouteName === 'rapport-fournisseur' ? 'active' : '' }}">
                            <a href="{{ route('rapport-fournisseur') }}" class="menu-link">
                                <div>{{ __('Rapports') }}</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item {{ $currentRouteName === 'statistiques-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('statistiques-fournisseur') }}" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Commandes facturables -->
        <li class="menu-item {{ $currentRouteName === 'commandes-facturables' ? 'active' : '' }}">
            <a href="{{ route('commandes-facturables') }}" class="menu-link fw-bold">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div class="text-bold">{{ __('Commandes facturables') }}</div>
            </a>
        </li>

        <!-- Dons -->
        <li class="menu-item {{ $currentRouteName === 'dons' ? 'active' : '' }}">
            <a href="{{ route('dons') }}" class="menu-link fw-bold">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div class="text-bold">{{ __('Dons') }}</div>
            </a>
        </li>

        <!-- Charges et Dépenses spéciales -->
        <li class="menu-item {{ in_array($currentRouteName, ['create-charge','factures-fournisseur']) ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div class="text-bold">{{ __('Charges et dépenses spéciales') }}</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'create-charge' ? 'active' : '' }}">
                    <a href="{{ route('create-charge') }}" class="menu-link">
                        <div>{{ __('Nouvelle charge') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ $currentRouteName === 'factures-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('factures-fournisseur') }}" class="menu-link">
                        <div>{{ __('TVA') }}</div>
                    </a>
                </li>
            </ul>
        </li>

         <!-- Salaires -->
        <li class="menu-item {{ in_array($currentRouteName, ['factures', 'create-factures-fournisseur','factures-fournisseur']) ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div class="text-bold">{{ __('Salaires') }}</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'factures-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('factures-fournisseur') }}" class="menu-link">
                        <div>{{ __('Nouveau') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ $currentRouteName === 'factures-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('factures-fournisseur') }}" class="menu-link">
                        <div>{{ __('Listes') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ $currentRouteName === 'factures-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('factures-fournisseur') }}" class="menu-link">
                        <div>{{ __('Règlements') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ $currentRouteName === 'factures-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('factures-fournisseur') }}" class="menu-link">
                        <div>{{ __('Statistiques') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        

        <!-- Emprunts -->
        <li class="menu-item {{ in_array($currentRouteName, ['factures', 'create-factures-fournisseur','factures-fournisseur']) ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div class="text-bold">{{ __('Emprunts') }}</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'factures-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('factures-fournisseur') }}" class="menu-link">
                        <div>{{ __('Nouveau emprunt') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        

        <!-- Paiements divers -->
        <li class="menu-item {{ in_array($currentRouteName, ['factures', 'create-factures-fournisseur','factures-fournisseur']) ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div class="text-bold">{{ __('Paiements Divers') }}</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'factures-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('factures-fournisseur') }}" class="menu-link">
                        <div>{{ __('Nouveau') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ $currentRouteName === 'factures-fournisseur' ? 'active' : '' }}">
                    <a href="{{ route('factures-fournisseur') }}" class="menu-link">
                        <div>{{ __('Liste') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        

        <!-- Marges -->
        <li class="menu-item {{ $currentRouteName === 'factures-fournisseur' ? 'active' : '' }}">
            <a href="{{ route('factures-fournisseur') }}" class="menu-link fw-bold">
                <div>{{ __('Marges') }}</div>
            </a>
        </li>
    </ul>
</aside>
