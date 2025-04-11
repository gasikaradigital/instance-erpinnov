<?php

namespace App\Providers;

use App\DTOs\Proxies\CommercialResolver;
use App\Services\CategoryResolver;
use App\Services\ThirdpartyService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class DolibarrServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CommercialResolver::class, function ($app) {
            $user = Auth::user();
            return new CommercialResolver(
                $user->dolibarr_url, // Champ personnalisé dans votre modèle User
                $user->api_key       // Champ personnalisé dans votre modèle User
            );
        });

        $this->app->bind(CategoryResolver::class, function ($app) {
            $user = Auth::user();
            return new CategoryResolver(
                $user->dolibarr_url,
                $user->api_key
            );
        });

        $this->app->bind(ThirdpartyService::class, function ($app) {
            $user = Auth::user();
            return new ThirdPartyService(
                $user->dolibarr_url,
                $user->api_key,
                $app->make(CommercialResolver::class),
                $app->make(CategoryResolver::class)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
