<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DokterModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Facktories
        DokterModel::factory(20)->create();

        $this->call([
            UserSeeder::class,
            DokterSeeder::class,
            ObatSeeder::class,
        ]);
    }
}
