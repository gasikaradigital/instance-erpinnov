<!DOCTYPE html>
@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
    $configData = Helper::appClasses();
    use Illuminate\Support\Facades\Vite;
    $menuCollapsed = ($configData['menuCollapsed'] === 'layout-menu-collapsed') ? json_encode(true) : false;
@endphp
<html lang="{{ session()->get('locale') ?? app()->getLocale() }}" class="{{ $configData['style'] }}-style {{($contentLayout ?? '')}} {{ ($navbarType ?? '') }} {{ ($menuFixed ?? '') }} {{ $menuCollapsed ?? '' }} {{ $menuFlipped ?? '' }} {{ $menuOffcanvas ?? '' }} {{ $footerFixed ?? '' }} {{ $customizerHidden ?? '' }}" dir="{{ $configData['textDirection'] }}" data-theme="{{ $configData['theme'] }}" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel" data-template="{{ $configData['layout'] . '-menu-' . $configData['themeOpt'] . '-' . $configData['styleOpt'] }}" data-style="{{$configData['styleOptVal']}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

        @include('layouts/sections/assets/styles')
        @include('layouts/sections/assets/scriptsIncludes')
        <!-- Styles -->
        @stack('styles')
    </head>
    <body>

        <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
            <div class="layout-container">

                @include('layouts/sections/navbar')
                <!-- Layout page -->
                <div class="layout-page">
                    <div class="content-wrapper">

                        @include('layouts/sections/horizontalMenu')

                            {{ $slot }}

                        <div class="content-backdrop fade"></div>
                        @include('layouts/sections/footer')
                    </div>
                </div>
            </div>
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>


        @stack('modals')

        @include('layouts/sections/assets/scripts')

        @stack('scripts')
    </body>
</html>
