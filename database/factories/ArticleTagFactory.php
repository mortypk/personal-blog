<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'article_id' => Article::all()->random()->id,    
            'tag_id' => Tag::all()->random()->id,    
        ];
    }
}
