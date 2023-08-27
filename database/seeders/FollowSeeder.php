<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i<10; $i++){
        DB::table('follows')->insert([
            'follower_id' => $i+2,
            'followee_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        }
        for ($i=1; $i<8; $i++){
        DB::table('follows')->insert([
            'follower_id' => $i+2,
            'followee_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        }
        for ($i=2; $i<15; $i++){
        DB::table('follows')->insert([
            'follower_id' => $i+2,
            'followee_id' => 3,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        }
    }
}
