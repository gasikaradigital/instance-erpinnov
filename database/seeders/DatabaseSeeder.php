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
        $this->call([
            PlansTableSeeder::class,  // Enfin les plans
            UserSeeder::class,        // Enfin les utilisateurs
        ]);


        /*Compte pour ajout de tier pour faire des tests d'affichage
        lien: test-fin-dolibarr.erpinnov
        login: admin
        mdp: tCFniaCTR1PWtabw*/
    }
}
