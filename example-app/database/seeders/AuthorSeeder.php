<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Str;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=0; $i < 100; $i++) { 
            DB::table('authors')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@local.in',
                'phone' => '8910'.Str::random(7),
                'avatar' => Str::random(15).'.png'
            ]);
        }

        
    }
}
