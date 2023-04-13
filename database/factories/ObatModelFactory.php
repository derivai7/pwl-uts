<?php

namespace Database\Factories;

use App\Models\ObatModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DokterModel>
 */
class ObatModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nama_obat" => $this->faker->randomElement([
                "Acetaminophen",
                "Aspirin",
                "Ibuprofen",
                "Antihistamin",
                "Diphenoxylate",
                "Hidrokortison",
                "Antasida",
                "Guaifenesin"
            ]),
            "jenis" => $this->faker->randomElement([
                "Tablet",
                "Cair ",
                "Kapsul"
            ]),
            "dosis" => $this->faker->randomElement([
                "Rendah",
                "Sedang",
                "Tinggi"
            ]),
            "harga" => $this->faker->numerify('##000')
        ];
    }
}
