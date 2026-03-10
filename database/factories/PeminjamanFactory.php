<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Peminjaman;
use App\Models\barang;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
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
            'nama_peminjam' => $this->faker->name(),
            'jumlah' => $this->faker->numberBetween(1, 50),
            'tanggal_pinjam' => $this->faker->date(),
            'tanggal_kembali' => $this->faker->date(),
            'status' => $this->faker->randomElement(['dipinjam', 'dikembalikan']),
        ];
    }
}
