<?php

namespace Database\migrations\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData():array{
        $data = [];
        for ($i=0;$i<10;$i++){
            $data[] = [
                'title'=> fake()->jobTitle(),
                'description' => fake()->text(100),
                'created_at' => now()->timezone('Europe/Madrid'),
                'updated_at' => now()->timezone('Europe/Madrid')

            ];
        }
        return $data;
    }
}
