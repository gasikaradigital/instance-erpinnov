<!DOCTYPE html>
@php
    $configData = Helper::appClasses();
    $currentRouteName = request()->route()->getName();
    $isFront = true;

    $menuFixed =
        $configData['layout'] === 'vertical'
            ? $menuFixed ?? ''
            : ($configData['layout'] === 'front'
                ? ''
                : $configData['headerType']);
    $navbarType =
        $configData['layout'] === 'vertical'
            ? $configData['navbarType'] ?? ''
            : ($configData['layout'] === 'front'
                ? 'layout-navbar-fixed'
                : '');
    $isFront = ($isFront ?? '') == true ? 'Front' : '';
    $contentLayout = isset($container) ? ($container === 'container-xxl' ? 'layout-compact' : 'layout-wide') : '';
@endphp

@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
    $configData = Helper::appClasses();
    use Illuminate\Support\Facades\Vite;
    $menuCollapsed = $configData['menuCollapsed'] === 'layout-menu-collapsed' ? json_encode(true) : false;
@endphp
<html lang="{{ session()->get('locale') ?? app()->getLocale() }}"
    class="{{ $configData['style'] }}-style {{ $contentLayout ?? '' }} {{ $navbarType ?? '' }} {{ $menuFixed ?? '' }} {{ $menuCollapsed ?? '' }} {{ $menuFlipped ?? '' }} {{ $menuOffcanvas ?? '' }} {{ $footerFixed ?? '' }} {{ $customizerHidden ?? '' }}"
    dir="{{ $configData['textDirection'] }}" data-theme="{{ $configData['theme'] }}"
    data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{ url('/') }}" data-framework="laravel"
    data-template="{{ $configData['layout'] . '-menu-' . $configData['themeOpt'] . '-' . $configData['styleOpt'] }}"
    data-style="{{ $configData['styleOptVal'] }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/logo.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    @include('layouts/sections/assets/styles')
    @include('layouts/sections/assets/scriptsIncludes')
    <!-- Styles -->
    @stack('styles')
    <style>
        #menuTiers {
            position: fixed;
            left: -250px;
            top: 0;
            width: 250px;
            height: 100%;
            background: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            transition: left 0.3s ease-in-out;
            z-index: 1000;
        }

        #menuTiers.active {
            left: 0;
        }
        .fixed-sidebar{
            position: fixed;
            top: 0;
            bottom: 0;
            overflow-y: hidden;
            z-index: 1000;
        }
    </style>

</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @if (request()->routeIs('home'))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.verticalMenu')
                </aside>
            @elseif(request()->routeIs([
                    'tiers',
                    'create-tiers',
                    'contact',
                    'create-contact',
                    'tag-customer',
                    'create-tag-customer',
                    'create-tag-supplier',
                    'tag-contact',
                    'create-tag-contact',
                    'tiers-dashboard',
                    'nouveau-devis',
                ]))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.tiersMenu') <!-- Menu vertical Tiers -->
                </aside>
            @elseif(request()->routeIs([
                    'produits',
                    'create-produits',
                    'liste-produits-clients',
                    'liste-stocks-clients',
                    'attribut-list',
                    'create-attribut',
                    'tag-produit',
                    'create-tag-produit',
                    'produit-statistique',
                    'liste-services-clients',
                ]))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.produitsMenu') <!-- Menu vertical Produits -->
                </aside>
            @elseif(request()->routeIs([
                'ventes',
                'new-proposition',
                'new-opportunity',
                'liste-proposition',
                'stat-vente',
                'commande',
                'liste-commande',
                'stat-commande',
                'vente-fournisseur',
                'commande-fournisseur'
                ]))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.ventesMenu')
                </aside>
            @elseif(request()->routeIs(['projets', 'create-project', 'taches', 'create-tache']))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.projetsMenu')
                </aside>
            @elseif(request()->routeIs([
                    'factures',
                    'create-factures',
                    'factures-fournisseur',
                    'create-factures-fournisseur',
                    'liste-modeles-clients',
                    'reglement-clients',
                    'rapport-clients',
                    'statistiques-clients',
                    'liste-factures-clients',
                    'liste-modeles-fournisseur',
                    'reglement-fournisseur',
                    'rapport-fournisseur',
                    'statistiques-fournisseur',
                    'commandes-facturables',
                    'dons',
                    'create-charge',
                ]))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.facturesMenu')
                </aside>
            @elseif(request()->routeIs(['banques', 'create-banques']))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.banquesMenu')
                </aside>
            @elseif(request()->routeIs(['comptabiliteDashbord','comptabiliteExport','comptabiliteBilan','CompatiliteResultat','ComptabiliteFluxCTresorerie','ComptabiliteOperation','ComptabiliteInvestisement']))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.comptabiliteMenu')
                </aside>
            @elseif(request()->routeIs(['grh', 'create-grh', 'create-salary']))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.grhMenu')
                </aside>
            @elseif(request()->routeIs(['email', 'create-mail']))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.mailMenu')
                </aside>
            @elseif(request()->routeIs(['document', 'create-document']))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.documentMenu')
                </aside>
            @elseif(request()->routeIs(['chat', 'create-chat']))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme fixed-sidebar">
                    @include('layouts.sections.menu.chatMenu')
                </aside>
            @endif



            <!-- Layout page -->
            <div class="layout-page">
                @include('layouts/sections/navbar/navbar')

                <div class="content-wrapper">
                    {{ $slot }}
                    <div class="content-backdrop fade"></div>
                    @include('layouts/sections/footer')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function toggleMenuTiers() {
            let menuTiers = document.getElementById('menuTiers');
            menuTiers.classList.toggle('active');
        }
    </script>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
    @stack('modals')
    @include('layouts/sections/assets/scripts')
    @stack('scripts')
</body>

</html>
