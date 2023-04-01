<?php

namespace Database\Seeders;

use App\Models\User;
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

        // $professionId = DB::table('professions')
                        // ->select('id', 'title')
                        // ->whereTitle('Front-End Developer') // magic method
                        //->where('title', '=', 'Front-End Developer') // can ignore equals to operator
                        // ->value('id');
                        //->first(); // ->take(1)->get();
        //dd($profess);

        $professionId = \App\Models\Profession::where('title', 'Front-End Developer')->value('id');

        // DB::table('users')->insert([
        //     'name' => 'Ricardo Ambriz',
        //     'email' => '314261416',
        //     'password' => bcrypt('1234'),
        //     'profession_id' => $professionId //$profess->id,
        // ]);

        User::create([
            'name' => 'Ricardo Ambriz',
            'email' => '314261416',
            'password' => bcrypt('1234'),
            'profession_id' => $professionId, //$profess->id,
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Ricardo Ambriz',
            'password' => bcrypt('1234'),
            'profession_id' => $professionId, //$profess->id,
        ]);

        User::factory()->create([
            'profession_id' => $professionId
        ]);

        User::factory(50)->create();

        // User::create([
        //     'name' => 'Miguel Gómez',
        //     'email' => '317346543',
        //     'password' => bcrypt('4321'),
        //     'profession_id' => $professionId //$profess->id,
        // ]);

        // User::create([
        //     'name' => 'Maria Elena',
        //     'email' => '354681426',
        //     'password' => bcrypt('5741'),
        //     'profession_id' => null
        // ]);
    }
}
