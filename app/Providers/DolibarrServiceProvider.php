<?php

namespace App\Providers;

use App\DTOs\Mappers\CategoryMapper;
use App\DTOs\Mappers\CommercialUserMapper;
use App\DTOs\Mappers\ContactMapper;
use App\DTOs\Mappers\CountryMapper;
use App\DTOs\Mappers\ThirdpartyMapper;
use App\Helpers\DolibarrServiceUtils;
use App\Services\CategoryResolver;
use App\Services\CommercialResolver;
use App\Services\ContactService;
use App\Services\SetupResolverService;
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
            if (!Auth::hasUser()) {
                throw new \RuntimeException('User not authenticated');
            }

            $user = Auth::user();
            return new CommercialResolver(
                $user->url_dolibarr,
                DolibarrServiceUtils::encryptApiKey($user->api_key),
                new CommercialUserMapper()
            );
        });

        $this->app->bind(CategoryResolver::class, function ($app) {
            if (!Auth::hasUser()) {
                throw new \RuntimeException('User not authenticated');
            }

            $user = Auth::user();
            return new CategoryResolver(
                $user->url_dolibarr,
                DolibarrServiceUtils::encryptApiKey($user->api_key),
                new CategoryMapper()
            );
        });

        $this->app->bind(SetupResolverService::class,function($app){
            if (!Auth::hasUser()) {
                throw new \RuntimeException('User not authenticated');
            }

            $user = Auth::user();
            return new SetupResolverService(
                $user->url_dolibarr,
                DolibarrServiceUtils::encryptApiKey($user->api_key),
                new CountryMapper()
            );

        });


        $this->app->bind(ThirdPartyService::class, function ($app) {
            if (!Auth::hasUser()) {
                throw new \RuntimeException('User not authenticated');
            }

            $user = Auth::user();

            return new ThirdPartyService(
                $user->url_dolibarr,
                DolibarrServiceUtils::encryptApiKey($user->api_key),
                new ThirdpartyMapper(
                    $this->app->make(CommercialResolver::class),
                    $this->app->make(CategoryResolver::class),
                    $this->app->make(SetupResolverService::class)
                )
            );
        });

        $this->app->bind(ContactService::class, function ($app) {
            if (!Auth::hasUser()) {
                throw new \RuntimeException('User not authenticated');
            }

            $user = Auth::user();

            return new ContactService(
                $user->url_dolibarr,
                DolibarrServiceUtils::encryptApiKey($user->api_key),
                new ContactMapper(
                    $this->app->make(CategoryResolver::class)
                )
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
