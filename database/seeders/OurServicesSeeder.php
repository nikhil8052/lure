<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->truncate();

        DB::table('services')->insert([
            'title' => 'Our Services',
            'services' => '{"1":{"heading":"Account Management","description":"Our expert team utilizes industry knowledge and an understanding of OnlyFans culture to boost your revenue significantly."},"2":{"heading":"LURE Marketing","description":"We market and grow your social fanbase through personalized strategies on TikTok, Twitter, and Instagram."},"3":{"heading":"Content Support","description":"We assist you with creating the right content on social media platforms, to maximize your revenue potential."},"4":{"heading":"DMCA Content Protection","description":"Your content is safe with us. We\'ve partnered with multiple DMCA Takedown companies to ensure that your content stays private."}}',
            'display_status' => true,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),  
        ]);
    }
}
