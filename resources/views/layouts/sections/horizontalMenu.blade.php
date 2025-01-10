@php
use Illuminate\Support\Facades\Route;
$configData = Helper::appClasses();
@endphp
           <!-- Menu -->
            <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
                <div class="container-xxl d-flex h-100">
                <ul class="menu-inner pb-2 pb-xl-0">
                    <!-- Accueil -->
                    <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home')}}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div data-i18n="Accueil">Accueil</div>
                        </a>
                    </li>

                    <!-- Tiers -->
                    <li class="menu-item {{ request()->routeIs('tiers') ? 'active' : '' }}">
                        <a href="{{ route('tiers')}}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div data-i18n="Tiers">Tiers</div>
                        </a>
                    </li>

                    <!-- Produits/Services -->
                    <li class="menu-item {{ request()->routeIs('produits', 'create-produits', 'create-services') ? 'active' : '' }}">
                        <a href="{{ route('produits')}}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-box"></i>
                            <div data-i18n="Produits/Services">Produits/Services</div>
                        </a>
                    </li>

                    <!-- Projets et Tâches -->
                    <li class="menu-item">
                    <a href="projets.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-folder"></i>
                        <div data-i18n="Projets">Projets</div>
                    </a>
                    </li>
                    <li class="menu-item">
                    <a href="taches.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-checklist"></i>
                        <div data-i18n="Tâches">Tâches</div>
                    </a>
                    </li>

                    <!-- Modules (Menu déroulant) -->
                    <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                        <div data-i18n="Modules">Modules</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                        <a href="commandes.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                            <div data-i18n="Commandes">Commandes</div>
                        </a>
                        </li>
                        <li class="menu-item">
                        <a href="facturation.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-file-invoice"></i>
                            <div data-i18n="Facturation">Facturation</div>
                        </a>
                        </li>
                        <li class="menu-item">
                        <a href="banque-caisse.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-credit-card"></i>
                            <div data-i18n="Banque/Caisse">Banque/Caisse</div>
                        </a>
                        </li>
                        <li class="menu-item">
                        <a href="comptabilite.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-calculator"></i>
                            <div data-i18n="Comptabilité">Comptabilité</div>
                        </a>
                        </li>
                        <li class="menu-item">
                        <a href="agenda.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-calendar"></i>
                            <div data-i18n="Agenda">Agenda</div>
                        </a>
                        </li>
                        <li class="menu-item">
                        <a href="outils.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-mail"></i>
                            <div data-i18n="Outils">Email</div>
                        </a>
                        </li>
                    </ul>
                    </li>
                </ul>
                </div>
            </aside>
            <!-- / Menu -->
