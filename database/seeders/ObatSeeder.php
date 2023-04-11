<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('obat')->insert([
            [
                'nama_obat' => 'Paracetamol',
                'jenis' => 'Tablet',
                'dosis' => 'Sedang',
                'harga' => '15000'
            ],
            [
                'nama_obat' => 'Diapet',
                'jenis' => 'Kapsul',
                'dosis' => 'Tinggi',
                'harga' => '1000'
            ]
        ]);
    }
}
