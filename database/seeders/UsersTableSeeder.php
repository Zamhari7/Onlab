<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'aslab',
            // 'email' => 'aslab@example.com',
            'username' => '1461800140',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'aslab',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'kalab',
            // 'email' => 'kalab@example.com',
            'username' => '1',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'kalab',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'dosbim',
            // 'email' => 'dosbim@example.com',
            'username' => '2',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'dosbim',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'mahasiswa',
            // 'email' => 'mahasiswa@example.com',
            'username' => '3',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
