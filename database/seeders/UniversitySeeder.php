<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert([
            'name' => 'なし',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('universities')->insert([
            'name' => '東京大学',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('universities')->insert([
            'name' => '京都大学',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('universities')->insert([
            'name' => '早稲田大学',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('universities')->insert([
            'name' => '慶應義塾大学',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
    }
}
