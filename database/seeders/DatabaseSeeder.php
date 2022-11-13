<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\ArticleTagFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        \App\Models\User::factory()->create([
            'name' => 'nova',
            'email' => 'xpk123@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'asdfasdfsf',
        ]);
        \App\Models\Category::insert(['name' => 'Foods', 'created_at' => now()]);
        \App\Models\Category::insert(['name' => 'Sports', 'created_at' => now()]);
        \App\Models\Category::insert(['name' => 'Movies', 'created_at' => now()]);
        \App\Models\Category::insert(['name' => 'Fashion', 'created_at' => now()]);
        \App\Models\Category::insert(['name' => 'Travel', 'created_at' => now()]);
        $articles = \App\Models\Article::factory(10)->create();
        $tags = \App\Models\Tag::factory(5)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            $this->call([
                ArticleTagSeeder::class
            ]);
        
    }
}
