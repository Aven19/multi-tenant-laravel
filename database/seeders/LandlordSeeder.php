<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tenant::create([
            'name' => 'aven',
            'domain' => 'aven.com',
            'database' => 'aven',
        ]);

        \App\Models\Tenant::create([
            'name' => 'avenmathias',
            'domain' => 'aven-mathias.com',
            'database' => 'avenmathias',
        ]);
    }
}
