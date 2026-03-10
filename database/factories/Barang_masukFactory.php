<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\barang_masuk;
use App\Models\barang;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang_masuk>
 */
class Barang_masukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barang_id' => barang::factory(),
            'jumlah' => $this->faker->numberBetween(1, 100),
            'tanggal' => $this->faker->date(),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
