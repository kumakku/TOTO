<?php

namespace Database\Seeders;

use DateTimeImmutable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

final class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        for ($i=0; $i<50; $i++){
        DB::table('users')->insert([
            'name' => 'test'.$i,
            'email' => 'test'.$i.'@example.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);  
        }
    }
}