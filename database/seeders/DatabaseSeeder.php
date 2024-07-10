<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(OurResultSeeder::class);
        $this->call(OurModelsSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(SiteContentSeeder::class);
        $this->call(OurServicesSeeder::class);
        $this->call(HomeContentSeeder::class);
        $this->call(FaqsSeeder::class);
        $this->call(ExpendInfluenceSeeder::class);
        $this->call(ApplyNowSeeder::class);
    }
}
