<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'admin01@gmail.com',
            'phone_number' => 9712165422,
            'password' => Hash::make('admin01'),
            'last_update' => now(), 
            'is_admin' => true,
            'created_at' => now(), 
            'updated_at' => now(), 
        ],
        [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'Contact@luremgt.co',
            'phone_number' => null,
            'password' => Hash::make('admin01'),
            'last_update' => now(), 
            'is_admin' => true,
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
    }
}
