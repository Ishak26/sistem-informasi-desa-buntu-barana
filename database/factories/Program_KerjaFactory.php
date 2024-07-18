<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program_Kerja>
 */
class Program_KerjaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'proker'=>fake()->sentence(),
            'bidang'=>fake()->randomElement(['KASI PEMERINTAHAN', 'KASI KESEJAHTERAAN MASYARAKAT', 'KASI KEMASYARAKATAN']),
            'terbilang'=>fake()->sentence(),
            'anggaran'=>fake()->randomElement(['1000000', '30000000000', '500000000']),
            'Sumber_dana'=>fake()->randomElement(['DD', 'ADD', 'BHP']),
            'Verifikasi_sekertaris'=>fake()->boolean(),
            'Verifikasi_KepalaDesa'=>fake()->boolean(),
            'Status_terlaksana'=>fake()->boolean(),
            // 'Dokumentasi_pelaksanaan'=>fake(),
            'Tanggal_Pengerjaan'=>fake()->dateTime()
        ];
    }
}
