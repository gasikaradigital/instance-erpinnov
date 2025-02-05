@php
    use Illuminate\Support\Facades\Route;
    $configData = Helper::appClasses();
    $currentRouteName = Route::currentRouteName();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
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

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {{-- Accueil --}}
        <li class="menu-item {{ $currentRouteName === 'home' ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('Accueil') }}</div>
            </a>
        </li>

        {{-- Tableau de bord --}}

        <li class="menu-item {{ in_array($currentRouteName, ['tiers', 'create-tiers', 'prospects', 'create-prospects', 'client', 'create-customer', 'fournisseur', 'create-supplier']) ? 'active ' : '' }}">
            <a href="javascript:void(0);" class="menu-link fw-bold" >
                <i class="fas fa-chart-bar fa-fw"></i>
                <div>{{ __('Mon tableau de bord') }}</div>
            </a>
        </li>


        {{-- Configuration --}}
        <li
            class="menu-item {{ in_array($currentRouteName, ['produits', 'create-produits', 'create-services']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle fw-bold">
                <i class="fas fa-tools fa-fw"></i>
                <div>{{ __('Configuration') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Societé/Organisation') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Modules/Applications') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Affichage') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Menus') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Traduction') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Valeur/filtres/tris par défaut') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Widgets') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Alertes') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Sécurité') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Limites et précision') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('PDF') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Emails') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('SMS') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Dictionnaires') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Divers') }}</div>
                    </a>
                </li>
            </ul>
        </li>

       
        {{-- Outils d'administration --}}
        <li
            class="menu-item {{ in_array($currentRouteName, []) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle fw-bold">
                <i class="fas fa-server"></i>
                <div>{{ __("Outils d'administration") }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Infos Dolibarr') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Infos navigateur') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Infos OS') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Infos web server') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Infos PHP') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Infos base de données') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Infos performances') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Infos sécurité') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Événements de sécurité') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Sessions utilisateurs') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Sauvegarde') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Restauration') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Mise à jour / extension') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Purger') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Ressources externes') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Changement TVA en masse') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === '' ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>{{ __('Initialisation codes-barre') }}</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
