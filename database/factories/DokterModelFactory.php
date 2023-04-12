<?php

namespace Database\Factories;

use App\Models\DokterModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DokterModel>
 */
class DokterModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nama" => $this->faker->name(),
            "spesialis" => $this->faker->randomElement([
                "Penyakit Dalam",
                "Penyakit Luar",
                "Penyakit Saraf"
            ]),
            "pengalaman" => $this->faker->numberBetween(1, 20),
            "alamat" => $this->faker->address,
            "nomor_telepon" => $this->faker->numerify('081#########')
        ];
    }
}
