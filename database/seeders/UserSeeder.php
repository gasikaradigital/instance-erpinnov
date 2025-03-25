<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vérifier d'abord les plans disponibles
        $availablePlans = DB::table('plans')->get();

        if ($availablePlans->isEmpty()) {
            $this->command->error('Aucun plan trouvé dans la table plans. Veuillez exécuter PlansTableSeeder en premier.');
            return;
        }

        // Utiliser le premier, deuxième et dernier plan disponible
        $soloId = $availablePlans->first()->id;
        $standardId = $availablePlans->count() >= 2 ? $availablePlans[1]->id : $soloId;
        $premiumId = $availablePlans->last()->id;

        // Récupérer un sous-plan pour chaque plan
        $basicId = DB::table('sub_plans')->where('plan_id', $soloId)->first()?->id;
        $proId = DB::table('sub_plans')->where('plan_id', $standardId)->first()?->id;
        $vipId = DB::table('sub_plans')->where('plan_id', $premiumId)->first()?->id;

        $this->command->info("Plans trouvés: Solo ID=$soloId, Standard ID=$standardId, Premium ID=$premiumId");
        $this->command->info("Sub-plans trouvés: Basic ID=$basicId, Pro ID=$proId, VIP ID=$vipId");

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('test123'),
            'api_key' => 'kDUM0VTPlEcTU8EsGKXx52x8K6PQystm',
            'url_dolibarr' => 'http://test-fin--dolibarr.erpinnov.com',
            'plan_id' => $soloId,
            'sub_plan_id' => $basicId,
            'status' => 'active'
        ]);

        User::factory()->create([
            'name' => 'user standard',
            'email' => 'standard@example.com',
            'password' => Hash::make('standard123'),
            'api_key' => 'kDUM0VTPlEcTU8EsGKXx52x8K6PQystm',
            'url_dolibarr' => 'http://test-fin--dolibarr.erpinnov.com',
            'plan_id' => $standardId,
            'sub_plan_id' => $proId,
            'status' => 'active'
        ]);

        User::factory()->create([
            'name' => 'user premium',
            'email' => 'premium@example.com',
            'password' => Hash::make('premium123'),
            'api_key' => 'aF4F2mGEY4S99IpUyE1z0yng3B1wgWj0',
            'url_dolibarr' => 'https://dolistag.gasikara.mg',
            'plan_id' => $premiumId,
            'sub_plan_id' => $vipId,
            'status' => 'active'
        ]);
    }
}
