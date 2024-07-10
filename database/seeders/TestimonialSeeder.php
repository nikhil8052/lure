<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials')->truncate();

        DB::table('testimonials')->insert([
            [ 
                'name' => 'Ken Shenkman',
                'image' => 'client1720168546.png',
                'position' => 'CEO',
                'company_name' => 'Bulk Candy Store',
                'description' => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'is_displayed' => 1,
                'order' => 1,
                'status' => 1,
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [ 
                'name' => 'Ken Shenkman',
                'image' => 'client1720168546.png',
                'position' => 'CEO',
                'company_name' => 'Bulk Candy Store',
                'description' => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'is_displayed' => 1,
                'order' => 2,
                'status' => 1,
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
        ]);
    }
}
