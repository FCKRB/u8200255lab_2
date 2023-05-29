<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Populate articles
        Article::factory()->count(100)->create();

        // Populate tags
        Tag::factory()->count(100)->create();

        // Get all the tags attaching up to 5 random tags to each article
        $tags = Tag::all();

        // Populate the pivot table
        Article::All()->each(function ($article) use ($tags) {
            $article->tags()->sync(
                $tags->random(rand(1,5))->pluck('id')->toArray()
            );
        });
    }
}
