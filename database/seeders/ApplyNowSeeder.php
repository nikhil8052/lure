<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplyNowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('apply_now_contents')->truncate();

        DB::table('apply_now_contents')->insert([
            'bg_video' => 'vid_1720597836.mp4',
            'heading' => 'Hey there!',
            'sub_heading' => 'Here is the queen',
            'submit_heading' => 'Thank you for applying.',
            'submit_text' => 'We will reach out to you as soon as we can.',
            'submit_gif' => 'submit_1720597836.gif',
            'status' => 1,
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
    }
}
