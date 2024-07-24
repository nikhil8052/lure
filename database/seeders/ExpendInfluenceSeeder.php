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
            'text' => 'We highly focus on helping our Creators improve their Social Presence with our New Production plan.',
            'video_before' => 'video_before1721631978.mp4',
            'video_after' => 'video_after1721631978.mp4',
            'image_before' => 'img_before1721648652.png',
            'image_after' => 'img_after1721714242.png',
            'status' => 1,
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
    }
}
