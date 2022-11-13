<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'full_text' => $this->faker->sentence(100),
            'image_url' => 'photo.jpg',
            'category_id' => Category::all()->random()->id,
            'publish' => $this->faker->boolean(),
        ];
    }
}
