<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpendInfluenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('expend_influences')->truncate();

        DB::table('expend_influences')->insert([
            'heading' => 'Expand Your Influence',
            'text' => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'video_before' => 'video_before1720531148.mp4',
            'video_after' => 'video_1720530944.mp4',
            'image_before' => 'img_before1720531148.png',
            'image_after' => 'img_1720530944.png',
            'status' => 1,
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
    }
}
