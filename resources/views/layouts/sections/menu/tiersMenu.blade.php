<!-- File: layouts/sections/menu/tiersMenu.blade.php -->
  <!-- ! Hide app brand if navbar-full -->
  @if (!isset($navbarFull))
  <div class="app-brand demo">
      <a href="{{ url('/') }}" class="app-brand-link">
          <!-- <span class="app-brand-logo demo">@include('_partials.macros', ['height' => 20])</span> -->
          <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo de GasikaraDigital" height="20">
          <span class="app-brand-text demo menu-text fw-bold">{{ config('variables.templateName') }}</span>
      </a>

      {{-- <div class="row">
        <div class="col-md-10 offset-md-1">
            <form action="javascript:void(0)" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Entrez un caractère ou plus..."  name="search_term" aria-label="Rechercher" value="">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div> --}}
  </div>
@endif

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">


        <li class="menu-item {{ in_array($currentRouteName, ['tiers-dashboard', 'create-tiers', 'tiers', 'tag-customer' ]) ? 'active open' : '' }}">
            <a href="{{Route('tiers-dashboard')}}" class="menu-link menu-toggle fw-bold">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div class="text-bold">{{ __('Tiers') }}</div>
            </a>

            <ul class="menu-sub">

                <li class="menu-item {{ $currentRouteName === 'create-tiers' ? 'active' : '' }}">
                    <a href="{{ route('create-tiers') }}" class="menu-link">
                        <div>{{ __('Créer un tiers') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'tiers' ? 'active' : '' }}">
                    <a href="{{ route('tiers') }}" class="menu-link">
                        <div>{{ __('Liste des tiers') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ $currentRouteName === 'tag-customer' ? 'active' : '' }}">
                    <a href="{{ route('tag-customer') }}" class="menu-link">
                        <div>{{ __('Tags/catégories prospects/fournisseurs') }}</div>
                    </a>
                </li>


            </ul>
        </li>
        <!-- Pour la section Devis (à modifier) -->
<li class="menu-item {{ in_array($currentRouteName, ['devis-dashboard', 'create-devis','liste-devis' ]) ? 'active open' : '' }}">
    <a href="{{Route('devis-dashboard')}}" class="menu-link menu-toggle fw-bold">
        <i class="menu-icon ti ti-file"></i>
        <div class="text-bold">{{ __('Devis') }}</div>
    </a>
            <ul class="menu-sub">
       <li class="menu-item {{ $currentRouteName === 'nouveau-devis' ? 'active' : '' }}">
                    <a href="{{ route('nouveau-devis') }}" class="menu-link">
                        <div>{{ __('Nouveau devis') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $currentRouteName === 'liste-devis' ? 'active' : '' }}">
                    <a href="{{ route('liste-devis') }}" class="menu-link">
                        <div>{{ __('Liste devis') }}</div>
                    </a>
                </li>
    </ul>
        </li>
<!-- Pour la section Contacts (à modifier) -->
<li class="menu-item {{ in_array($currentRouteName, ['contacts-dashboard', 'create-contact', 'contact', 'tag-contact' ]) ? 'active open' : '' }}">
    <a href="{{Route('contacts-dashboard')}}" class="menu-link menu-toggle fw-bold">
        <i class="menu-icon tf-icons ti ti-address-book"></i>
        <div class="text-bold">{{ __('Contacts') }}</div>
    </a>

            <ul class="menu-sub">
        <li class="menu-item {{ $currentRouteName === 'create-contact' ? 'active' : '' }}">
            <a href="{{ route('create-contact') }}" class="menu-link">
                <div>{{ __('Créer un contact') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'contact' ? 'active' : '' }}">
            <a href="{{ route('contact') }}" class="menu-link">
                <div>{{ __('Liste des contacts') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'tag-contact' ? 'active' : '' }}">
            <a href="{{ route('tag-contact') }}" class="menu-link">
                <div>{{ __('Tags/catégories contacts') }}</div>
            </a>
        </li>
    </ul>
        </li>

    </ul>
</aside>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  // Sélectionner tous les liens de tableau de bord
  const dashboardLinks = document.querySelectorAll('.menu-link.menu-toggle.fw-bold');

  dashboardLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
      // Vérifier si c'est un clic direct sur le lien (et pas sur un enfant comme l'icône)
      if (event.target === this || event.target.parentElement === this || event.target.parentElement.parentElement === this) {
        // Empêcher l'ouverture/fermeture du sous-menu
        event.preventDefault();

        // Rediriger vers l'URL spécifiée dans le href du lien
        const href = this.getAttribute('href');
        window.location.href = href;
      }
    });
  });

  // Solution alternative: Ajouter un second gestionnaire pour le clic sur l'icône et le texte
  const dashboardIcons = document.querySelectorAll('.menu-icon');
  const dashboardTexts = document.querySelectorAll('.text-bold');

  [...dashboardIcons, ...dashboardTexts].forEach(function(element) {
    element.addEventListener('click', function(event) {
      event.preventDefault();
      event.stopPropagation();

      // Trouver le lien parent
      const parentLink = this.closest('a.menu-link');
      if (parentLink) {
        const href = parentLink.getAttribute('href');
        window.location.href = href;
      }
    });
  });
});
</script>
