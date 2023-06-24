<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Truncate given tables on database
     */
    protected function truncateTables(array $tables): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->truncateTables([
            'users',
            'acidConstants',
            'references',
            'reference_specie'
        ]);

        $this->call(UserSeeder::class);
        $this->call(ReferenceSeeder::class);
        $this->call(ChargeTypeSeeder::class);
        $this->call(AcidTypeSeeder::class);
        $this->call(SpecieSeeder::class);
        $this->call(AcidConstantSeeder::class);
        $this->call(ReferenceSpecieSeeder::class);
    }
}