<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\barang;
use App\Models\kategori;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->name(),
            'stok' => fake()->randomDigit(),
            'merk' => fake()->company(),
            'kategori_id' => kategori::factory()
        ];
    }
}
