<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social_platforms')->truncate();

        DB::table('social_platforms')->insert([
            'sec_title' => 'Unleash Creative Mastery',
            'platforms' => '[{"title":"Snapchat","image":"img_12930124561721731476.gif"},{"title":"Youtube","image":"img_14065558831721731476.gif"},{"title":"Tinder","image":"img_12728943801721732605.gif"},{"title":"TikTok","image":"img_14251110651721732605.gif"},{"title":"Reddit","image":"img_13192206821721732605.gif"},{"title":"Twitter","image":"img_7993030151721733913.gif"},{"title":"Instagram","image":"img_17859844651721733913.gif"}]',
            'web_logo' => 'img_12380911111721731476.png',
            'result_image' => 'img_20283775301721731476.svg',
            'status' => 1,
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
    }
}
