<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'test123',
            'api_key' => 'lOQVobrEX7JmZDLGscVFNlDpbnFiaFdm',
            'url_dolibarr' => 'http://faniry-dolibarr.erpinnov.com',
            'plan' => 'solo'
        ]);

        User::factory()->create([
            'name' => 'user standard',
            'email' => 'standard@example.com',
            'password' => 'standard123',
            'api_key' => 'lOQVobrEX7JmZDLGscVFNlDpbnFibFdm',
            'url_dolibarr' => 'http://faniri-dolibarr.erpinnov.com',
            'plan' => 'standard'
        ]);

        User::factory()->create([
            'name' => 'user premium',
            'email' => 'premium@example.com',
            'password' => 'premium123',
            'api_key' => 'lOQVobrEX7JmZDLGscVFNlDpbnFicFdm',
            'url_dolibarr' => 'http://fanire-dolibarr.erpinnov.com',
            'plan' => 'premium'
        ]);
    }
}
