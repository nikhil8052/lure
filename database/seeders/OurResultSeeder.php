<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('our_results')->truncate();

        DB::table('our_results')->insert([
            'title' => 'SOME OF OUR RESULTS',
            'results' => '[{"heading":"Creator consulting","image":"Model_1720422443.png","description":"Discover the power of a fusion between strategy, seductive texting, and top-tier marketing expertise. We delve deep to identify the forces shaping your account, unveiling opportunities that drive impressive revenue growth. Together, we\'ll craft a brand that truly reflects your success and vision."},{"heading":"Magnetize your audience with tailored strategies","image":"Model_1720423083.png","description":"Everyone can create a ripple on social media. We create waves by connecting you & your content with the right target niche and navigating them through an expertly-crafted funnel."},{"heading":"In-House Chatters","image":"Model_1720423031.png","description":"We\'re reshaping engagement with an emphasis on genuine bond building with each fan, treating them MORE than a real person. Our in-house USA team ensures that fans don\'t feel sold to, but instead, are naturally asking for further content & engagement."}]',
            'display_status' => true,
            'status' => 1,
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
    }
}
