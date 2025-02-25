<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Vite::useStyleTagAttributes(function (?string $src, string $url, ?array $chunk, ?array $manifest) {
      if ($src !== null) {
        return [
          'class' => preg_match("/(resources\/assets\/vendor\/scss\/(rtl\/)?core)-?.*/i", $src) ? 'template-customizer-core-css' :
                    (preg_match("/(resources\/assets\/vendor\/scss\/(rtl\/)?theme)-?.*/i", $src) ? 'template-customizer-theme-css' : '')
        ];
      }
      return [];
      
    });

    try{
        $host = request()->getHost();
        $subdomain = "http://" . explode('.', $host)[0] . ".erpinnov.com";
        
        config(['database.connections.dynamic' => [
            'driver' => 'mariadb',
            'host' => '127.0.0.1',
            'database' => 'sc2sylg_erpdata',
            'username' => 'sc2sylg_erpdata',
            'password' => 'Pg7TAeF$mfnu',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ]]);

        DB::purge('dynamic');
        DB::reconnect('dynamic');
        
        
        $dbConfig = DB::connection('dynamic')
            ->table('subdomains')
            ->where('subdomain', $subdomain)
            ->first();
        
        if ($dbConfig) {
            // Configurer la base de données spécifique au sous-domaine
            Config::set('database.connections.mysql.database', $dbConfig->database_name);
    
            DB::purge('mysql');
            DB::reconnect('mysql');
        } else {
            // Configurer la base de données spécifique au sous-domaine
            Config::set('database.connections.mysql.database', 'sc2sylg_app_innov');
    
            DB::purge('mysql');
            DB::reconnect('mysql');
        }
    } catch(\Exception $e){
            dd($e->getMessage());
    }
  }
}
