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
       $this->call(class: [
        PlansTableSeeder::class,
        UserSeeder::class,
       ]);

        /*Compte pour ajout de tier pour faire des tests d'affichage
        lien: test-fin-dolibarr.erpinnov
        login: admin
        mdp: tCFniaCTR1PWtabw*/
    }
}
