<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_contents')->truncate();

        DB::table('site_contents')->insert([
            'site_logo' => 'logo_1721647607.svg',
            'site_email' => 'lure@gmail.com',
            'instagram_link' => '#',
            'linkedin_link' => '#',
            'facebook_link' => '#',
            'footer_logo' => 'logoFooter_1721647607.png',
            'site_copyrights' => '© 2024 LURE. All Rights Reserved.',
            'subscribe_sec_heading' => 'Email Updates',
            'subscribe_sec_text' => 'Enter your email below to subscribe to our monthly newsletter.',
            'site_message' => 'Achieve More, Together.',
            'about_team' => 'Our highly experienced team aids our clients in achieving their full potential on social media platforms. We strive to make your dreams a reality by maximizing your online traffic, growing your personal brand awareness, and ultimately reaching your highest earning potential.',
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
    }
}
