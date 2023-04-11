<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dokter')->insert([
            [
                'nama' => 'Bahtiar Rifa\'i',
                'spesialis' => 'Penyakit Dalam',
                'pengalaman' => '12',
                'alamat' => 'Ponorogo',
                'nomor_telepon' => '0812264496644'
            ],
            [
                'nama' => 'Alwan Alawi',
                'spesialis' => 'Gigi dan Mulut',
                'pengalaman' => '12',
                'alamat' => 'Nganjuk',
                'nomor_telepon' => '0812264496644'
            ]
        ]);
    }
}
