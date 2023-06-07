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
        User::create([
            'name' => 'Ricardo Ambriz',
            'email' => '314261416',
            'password' => bcrypt('1234'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Ricardo Ambriz',
            'password' => bcrypt('1234')
        ]);

        User::factory(50)->create();
    }
}
