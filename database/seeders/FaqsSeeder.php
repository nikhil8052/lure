<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->truncate();

        DB::table('faqs')->insert([
            [ 
                'question' => 'How much does it cost?',
                'description' => 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.',
                'is_displayed' => 1,
                'faq_order' => 1,
                'status' => 1,
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [ 
                'question' => 'What are your promotion strategies?',
                'description' => 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa  nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft  beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice    lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you   probably haven\'t heard of them accusamus labore sustainable VHS.',
                'is_displayed' => 1,
                'faq_order' => 2,
                'status' => 1,
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [ 
                'question' => 'What is the expected amount of content I should create?',
                'description' => 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa  nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft  beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice    lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you   probably haven\'t heard of them accusamus labore sustainable VHS.',
                'is_displayed' => 1,
                'faq_order' => 3,
                'status' => 1,
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
        ]);
    }
}
