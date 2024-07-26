<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penduduk>
 */
class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->name(),
            'nik' => fake()->unique()->randomNumber(8, true),
            'alamat' => fake()->address(),
            'tempatlahir' => fake()->city(),
            'tanggallahir' => fake()->dateTime(),
            'email' => fake()->email(),
            'hp' => fake()->randomNumber(9, true),
            'agama' => fake()->randomElement(['islam', 'kristen', 'hindu']),
            'dusun' => fake()->randomElement(['dusun1', 'dusun2', 'dusun3']),
            'jk' => fake()->randomElement(['laki-laki', 'perempuan']),
            'status' => fake()->randomElement(['kawin', 'Belum kawin']),
            'pendidikan' => fake()->randomElement(['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3']),
            'pekerjaan' => fake()->randomElement(['pns', 'pengusaha','petani', 'Tidakbekerja','pedagang','peternak']),
            'penghasilan' => fake()->randomElement(['500000', '1000000','1500000','2000000','2500000','3000000']),
            'umur' => fake()->randomNumber(2, false),
            'namasekolah' => fake()->city(),
        ];
    }
}
