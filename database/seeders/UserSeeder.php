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
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        DB::table('users')->insert([
            'name' => 'user3',
            'email' => 'user3@example.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        DB::table('users')->insert([
            'name' => 'user4',
            'email' => 'user4@example.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        DB::table('users')->insert([
            'name' => 'user5',
            'email' => 'user5@example.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
    }
}