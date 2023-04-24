<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferencesSeeder extends Seeder
{
    /**
     * Load array from json
     */
    private function load_json($file)
    {
        $reference_json = file_get_contents($file);

        $decoded_json = json_decode($reference_json, true);

        return $decoded_json;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = './public/references.json';
        $data = $this->load_json($file);

        foreach ($data as $key => $value) {
            Reference::create([
                'id' => $value['code'],
                'name' => $value['perrin_source']
            ]);
        }
    }
}
