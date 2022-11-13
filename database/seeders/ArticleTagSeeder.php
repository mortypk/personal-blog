<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Article::all() as $Article) {
            foreach(Tag::all() as $Tag) {

                if (rand(1, 100) > 50) {
                    $Article->tags()->attach($Tag->id);
                }
            }
            $Article->save();
        }
    }
}
