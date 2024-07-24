<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('our_works')->truncate();

        DB::table('our_works')->insert([
            'title' => 'LET US TAKE CARE OF...',
            'works' => '[{"heading":"ADVERTISING","image":"Model_14200131031721647297.png","description":"Leveraging our proficiency in digital marketing and brand development, we have the essential abilities to help you maximize the platform\'s possibilities."},{"heading":"GROWTH","image":"Model_17228898471721648010.png","description":"While we handle the growth of your following on all social media platforms, you can relish your freedom and live life without any constraints."},{"heading":"MESSAGING","image":"Model_1721647241.png","description":"As a group of exceptionally talented professionals, we will handle all the messaging related to your OnlyFans account and maximize your earnings."}]',
            'display_status' => true,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),  
        ]);
    }
}
