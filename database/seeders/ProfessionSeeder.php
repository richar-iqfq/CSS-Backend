<?php

namespace Database\Seeders;

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

        DB::table('professions')->insert([
            'title' => 'Back-End Developer'
        ]);

        DB::table('professions')->insert([
            'title' => 'Front-End Developer'
        ]);
        DB::table('professions')->insert([
            'title' => 'Web Developer'
        ]);
    }
}