<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Bahtiar Rifa\'i',
                'username' => 'bahtiar',
                'email' => 'bahtiarderifai@gmail.com',
                'password' => Hash::make('bahtiar')
            ],
            [
                'name' => 'Alwan Alawi',
                'username' => 'alwan',
                'email' => 'alwanalawi1@gmail.com',
                'password' => Hash::make('alwan')
            ],
        ]);
    }
}
