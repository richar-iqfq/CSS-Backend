<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->truncateTables([
            'professions',
            'users',
            'molecule_data',
            'references',
            'iupac_acid_constants',
            'constantes_acidas',
            'referencias',
            'especie_referencia'
        ]);

        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(MoleculeDataSeeder::class);
        // $this->call(ReferencesSeeder::class);
        // $this->call(IupacAcidConstantsSeeder::class);
        $this->call(ReferenciaSeeder::class);
        $this->call(ClaseCargaSeeder::class);
        $this->call(ClaseAcidoSeeder::class);
        $this->call(EspecieSeeder::class);
        $this->call(ConstanteAcidaSeeder::class);
        $this->call(EspecieReferenciaSeeder::class);
    }
}