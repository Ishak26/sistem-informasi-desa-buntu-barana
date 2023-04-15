<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => fake()->sentence(mt_rand(7, 8)),
            'category_id' => mt_rand(1, 3),
            // 'gambar'=>fake()->randomElement(['ALBUM.jpg','ALBUM1.jpg','ALBUM2.jpg','ALBUM3.jpg','ALBUM4.jpg']),
            'slug' => fake()->unique()->word(),
            'deskripsi' => fake()->paragraph(mt_rand(4, 7)),
            'time' => fake()->dateTime()
        ];
    }
}
