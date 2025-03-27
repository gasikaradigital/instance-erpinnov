@include('_partials.app-brand', ['navbarFull' => $navbarFull ?? null])

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">

        <!-- Export -->
        <li class="menu-item {{ $currentRouteName === 'comptabiliteExport' ? 'active' : '' }}">
            <a href="{{ route('comptabiliteExport') }}" class="menu-link">
                <i class="fas fa-download"></i>
                <strong>{{ __('Export') }}</strong>
            </a>
        </li>

        <!-- Rapports -->
        <li
            class="menu-item {{ in_array($currentRouteName, ['comptabiliteBilan', 'CompatiliteResultat', 'ComptabiliteFluxCTresorerie', 'ComptabiliteOperation', 'ComptabiliteInvestisement', 'ComptabiliteFinancemetns', 'ComptabiliteBudget', 'CompatibilteVenteMarges', 'CompatiliteDepansesCoute']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="fas fa-chart-line"></i>
                <strong>{{ __('Rapports') }}</strong>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $currentRouteName === 'comptabiliteBilan' ? 'active' : '' }}">
                    <a href="{{ route('comptabiliteBilan') }}" class="menu-link">
                        <div>{{ __('Bilan') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'CompatiliteResultat' ? 'active' : '' }}">
                    <a href="{{ route('CompatiliteResultat') }}" class="menu-link">
                        <div>{{ __('Résultat') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'ComptabiliteFluxCTresorerie' ? 'active' : '' }}">
                    <a href="{{ route('ComptabiliteFluxCTresorerie') }}" class="menu-link">
                        <div>{{ __('Flux Trésorerie') }}</div>
                    </a>
                    <ul class="">
                        <li class="menu-item {{ $currentRouteName === 'ComptabiliteOperation' ? 'active' : '' }}">
                            <a href="{{ route('ComptabiliteOperation') }}" class="menu-link">
                                <div>{{ __('Opérations') }}</div>
                            </a>
                        </li>
                        <li class="menu-item {{ $currentRouteName === 'ComptabiliteInvestisement' ? 'active' : '' }}">
                            <a href="{{ route('ComptabiliteInvestisement') }}" class="menu-link">
                                <div>{{ __('Investissements') }}</div>
                            </a>
                        </li>
                        <li class="menu-item {{ $currentRouteName === 'ComptabiliteFinancemetns' ? 'active' : '' }}">
                            <a href="{{ route('ComptabiliteFinancemetns') }}" class="menu-link">
                                <div>{{ __('Financements') }}</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item {{ $currentRouteName === 'ComptabiliteBudget' ? 'active' : '' }}">
                    <a href="{{ route('ComptabiliteBudget') }}" class="menu-link">
                        <div>{{ __('Budget') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'CompatibilteVenteMarges' ? 'active' : '' }}">
                    <a href="{{ route('CompatibilteVenteMarges') }}" class="menu-link">
                        <div>{{ __('Ventes & Marges') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'CompatiliteDepansesCoute' ? 'active' : '' }}">
                    <a href="{{ route('CompatiliteDepansesCoute') }}" class="menu-link">
                        <div>{{ __('Dépenses & Coûts') }}</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>