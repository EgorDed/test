<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Str;



class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 100; $i++) { 
            DB::table('books')->insert([
                'name' => Str::random(15, 30),
                'author_id' => rand(1, 100),
                'price' => rand(100, 1000),
                'description' =>Str::random(150, 300),
            ]);
        }   
    }
}
