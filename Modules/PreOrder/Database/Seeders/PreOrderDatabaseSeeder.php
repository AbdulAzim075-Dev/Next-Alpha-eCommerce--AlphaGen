<?php

namespace Modules\PreOrder\Database\Seeders;

use Illuminate\Database\Seeder;

class PreOrderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call(PreOrderPermissionSeeder::class);
        $this->call(PreOrderSettingSeeder::class);
        $this->call(PreOrderPermissionSeeder::class);
    }
}
