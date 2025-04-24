<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gera 10 campanhas fictícias usando a CampaignFactory
        Campaign::factory()->count(10)->create();
    }
}
