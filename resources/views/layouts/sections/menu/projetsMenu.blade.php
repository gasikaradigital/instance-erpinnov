<!-- File: layouts/sections/menu/projetsMenu.blade.php -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="menu-inner py-1">
        <!-- Projets -->
        <li class="menu-item ">
            <a href="#" class="menu-link fw-bold">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div class="text-bold">{{ __('Projets') }}</div>
            </a>
        </li>
        <li class="menu-item {{ $currentRouteName === 'projets' ? 'active' : '' }}">
            <a href="{{ route('projets') }}" class="menu-link">
                <div>{{ __('Liste des projets') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'create-project' ? 'active' : '' }}">
            <a href="{{ route('create-project') }}" class="menu-link">
                <div>{{ __('Créer un projet') }}</div>
            </a>
        </li>

        <!-- Tâches -->
        <li class="menu-item ">
            <a href="#" class="menu-link fw-bold">
                <i class="menu-icon tf-icons ti ti-list-check"></i>
                <div class="text-bold">{{ __('Taches') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'taches' ? 'active' : '' }}">
            <a href="{{ route('taches') }}" class="menu-link">
                <div>{{ __('Liste des taches') }}</div>
            </a>
        </li>

        <li class="menu-item {{ $currentRouteName === 'create-tache' ? 'active' : '' }}">
            <a href="{{ route('create-tache') }}" class="menu-link">
                <div>{{ __('Créer un nouveau tâche') }}</div>
            </a>
        </li>
    </ul>
</aside>
