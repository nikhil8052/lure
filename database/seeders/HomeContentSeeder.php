<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('home_page_contents')->truncate();

        DB::table('home_page_contents')->insert([
            'bannerSec_video' => 'video_1721631498.mp4',
            'bannerSec_heading' => 'We LURE your dreams into reality.',
            'bannerSec_logo' => 'img_1721631544.png',
            'bannerSec_bgimage' => 'imgbg_1721631498.png',
            'bannerSec_text' => 'We are a digital talent management company and digital marketing agency based in LA, California & LV, Nevada.',
            'aboutSec_text' => '<p>Welcome to LURE, where human experience and expertise meet cutting-edge AI technology. We\'re not just a social media management agency; we\'re revolutionizing the way OnlyFans creators scale their accounts Our Mission is to empower creators.</p><p>We understand the unique challenges and opportunities that OnlyFans presents. That\'s why we\'ve harnessed the power of AI to tailor our strategies specifically for the adult content industry. Our AI-driven solutions analyze trends, optimize content, and&nbsp;engage with your audience like never before.</p>',
            'aboutSec_activeheading' => '["More Fans","More Views","More Reach"]',
            'aboutSec_subheading' => 'With The Best  OnlyFans Agency',
            'contentSec_heading' => 'Content Creation',
            'contentSec_text' => '<p>The easiest way to take your brand and feed from casual to professional is with high quality videography and photography. In fact, videography alone can increase your engagement by nearly 35%. Our team is experienced in creative directing and stays ahead of trends to make sure you remain always at the top of your game.&nbsp;</p><p>We have an extensive network of domestic and international creatives to help our clients meet all of their ideal content desires.</p>',
            'contentSec_image' => 'img_1721631620.png',
            'contentSec_simage' => 'imggirl_1721631620.png',
            'expertpicks_heading' => 'Top Rated OnlyFans Agency',
            'expertpicks_logos' => '{"img_11721631715.png":"img_11721631715.png","img_21721631715.png":"img_21721631715.png","img_31721631715.png":"img_31721631715.png","img_41721631715.png":"img_41721631715.png","img_11721716513.png":"img_11721716513.png"}',
            'join_us_heading' => 'Join Us Today',
            'join_us_text' => 'Whether you’re starting fresh or want to scale an existing account, we can help you increase your followers and profits. Our OnlyFans management agency has helped countless influencers earn thousands of dollars in their first month.',
            'join_us_image' => 'img_1721631594.png',
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
    }
}
