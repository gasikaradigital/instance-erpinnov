<?php

namespace App\Providers;

use App\Services\CategoryResolver;
use App\Services\CommercialResolver;
use App\Services\ThirdpartyService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Config;

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
                $this->encryptApiKey($user->api_key)
            );
        });

        $this->app->bind(CategoryResolver::class, function ($app) {
            if (!Auth::hasUser()) {
                throw new \RuntimeException('User not authenticated');
            }

            $user = Auth::user();
            return new CategoryResolver(
                $user->url_dolibarr,
                $this->encryptApiKey($user->api_key)
            );
        });


        $this->app->bind(ThirdPartyService::class, function ($app) {
            if (!Auth::hasUser()) {
                throw new \RuntimeException('User not authenticated');
            }

            $user = Auth::user();

            return new ThirdPartyService(
                $user->url_dolibarr,
                $this->encryptApiKey($user->api_key),
                $app->make(CommercialResolver::class),
                $app->make(CategoryResolver::class)
            );
        });
    }

    private function encryptApiKey(string $value): string
{
    $key = sodium_crypto_generichash(
        config('app.key'), '', SODIUM_CRYPTO_SECRETBOX_KEYBYTES
    );
    $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
    return $nonce . sodium_crypto_secretbox($value, $nonce, $key);
}
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
