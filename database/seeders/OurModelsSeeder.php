<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('our_models')->truncate();

        DB::table('our_models')->insert([
            [ 
                'image' => 'Model_1720186260.png',
                'status' => 1,
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [ 
                'image' => 'Model_1720186721.png',
                'status' => 1,
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [ 
                'image' => 'Model_1720186730.png',
                'status' => 1,
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [ 
                'image' => 'Model_1720186774.png',
                'status' => 1,
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [ 
                'image' => 'Model_1720440400.png',
                'status' => 1,
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
        ]);
    }
}
