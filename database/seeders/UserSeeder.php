<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $profess = DB::select('SELECT id FROM professions WHERE title = ? LIMIT 0,1', [
        //     'Back-End Developer'
        // ]);

        $professionId = DB::table('professions')
                        ->select('id', 'title')
                        ->whereTitle('Front-End Developer') // magic method
                        //->where('title', '=', 'Front-End Developer') // can ignore equals to operator
                        ->value('id');
                        //->first(); // ->take(1)->get();
        //dd($profess);

        DB::table('users')->insert([
            'name' => 'Ricardo Ambriz',
            'email' => '314261416',
            'password' => bcrypt('1234'),
            'profession_id' => $professionId //$profess->id,
        ]);
    }
}
