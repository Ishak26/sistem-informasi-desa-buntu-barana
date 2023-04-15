<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category'=>fake()->randomElement(['Acara','Olahrga','Gotong royong']),
            'slug'=>fake()->randomElement(['acara','olahrga','gotong-royong'])
        ];
    }
}
