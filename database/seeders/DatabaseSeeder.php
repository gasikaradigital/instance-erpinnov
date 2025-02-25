<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('test123'), // Hash du mot de passe
            'api_key' => 'kDUM0VTPlEcTU8EsGKXx52x8K6PQystm',
            'url_dolibarr' => 'http://test-fin--dolibarr.erpinnov.com',
            'plan_id' => 'solo',
            'sub_plan_id' => 'basic',
            'status' => 'active'
        ]);

        User::factory()->create([
            'name' => 'user standard',
            'email' => 'standard@example.com',
            'password' => Hash::make('standard123'),
            'api_key' => 'kDUM0VTPlEcTU8EsGKXx52x8K6PQystm',
            'url_dolibarr' => 'http://test-fin--dolibarr.erpinnov.com',
            'plan_id' => 'standard',
            'sub_plan_id' => 'pro',
            'status' => 'active'
        ]);

        User::factory()->create([
            'name' => 'user premium',
            'email' => 'premium@example.com',
            'password' => Hash::make('premium123'),
            'api_key' => 'kDUM0VTPlEcTU8EsGKXx52x8K6PQystm',
            'url_dolibarr' => 'http://test-fin-dolibarr.erpinnov.com',
            'plan_id' => 'premium',
            'sub_plan_id' => 'vip',
            'status' => 'active'
        ]);

        /*Compte pour ajout de tier pour faire des tests d'affichage
        lien: test-fin-dolibarr.erpinnov
        login: admin
        mdp: tCFniaCTR1PWtabw*/
    }
}
