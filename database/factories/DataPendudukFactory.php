<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataPenduduk>
 */
class DataPendudukFactory extends Factory
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
            'nik' => fake()->unique()->randomNumber(8,true),
            'alamat' => fake()->address(),
            'tempatlahir' => fake()->address(),
            'tanggallahir' => fake()->dateTime(),
            'email' =>fake()->email(),
            'hp'=>fake()->randomNumber(9,true),
            'agama'=>fake()->randomElement(['Islam','Kristen','budha']),
            'dusun' => fake()->randomElement(['Dusun1', 'Dusun2', 'Dusun3']),
            'jk'=>fake()->randomElement(['Laki-laki','Perempuan']),
            'status'=>fake()->randomElement(['kawin','belum kawin']),
            'pendidikan'=>fake()->randomElement(['SD','SMP','SMA','S1','S2','S3']),
            'pekerjaan'=>fake()->randomElement(['PNS','WIRAUSAHA','TIDAKKERJA']),
            'penghasilan'=>fake()->randomElement(['10000','200000']),
            'umur' => fake()->randomNumber(2, false),
            'namasekolah'=>fake()->address(),
        ];
    }
}
