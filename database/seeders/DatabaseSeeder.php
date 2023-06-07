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
            'constantes_acidas',
            'referencias',
            'especie_referencia'
        ]);

        $this->call(UserSeeder::class);
        $this->call(ReferenciaSeeder::class);
        $this->call(ClaseCargaSeeder::class);
        $this->call(ClaseAcidoSeeder::class);
        $this->call(EspecieSeeder::class);
        $this->call(ConstanteAcidaSeeder::class);
        $this->call(EspecieReferenciaSeeder::class);
    }
}