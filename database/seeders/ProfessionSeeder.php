<?php

namespace Database\Seeders;

use App\Models\Profession; // This also change
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::insert('INSERT INTO professions (title) VALUES (:title)', [
        //     'title' => 'Desarrolador back-end'
        // ]);

        // DB::table('professions')->insert([
        //     'title' => 'Back-End Developer'
        // ]);

        Profession::create([
            'title' => 'Back-End Developer'
        ]);

        Profession::create([
            'title' => 'Front-End Developer'
        ]);
        
        Profession::create([
            'title' => 'Web Developer'
        ]);
    }
}