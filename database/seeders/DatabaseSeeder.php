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
            'api_key' => 'jeS7wlwqnN0UwJpC0pRvKH7ffGEQie6Z',
            'url_dolibarr' => 'http://franck-cor-dolibarr.erpinnov.com'
        ]);
    }
}
