<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(rand(10, 255)),
            'teaser' => $this->faker->realText(rand(10, 128)),
            'content' => $this->faker->paragraphs(rand(1, 5), true),
            'created_at' => $this->faker->dateTimeBetween('-5 years', '-3 days'),
        ];
    }
}