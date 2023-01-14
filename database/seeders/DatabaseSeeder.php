<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use App\Models\Post;
use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PostSeeder::class,
            TagSeeder::class,
        ]);

        $tags = Tag::all();

        Post::all()->each(function ($post) use ($tags) {
            $post->tags()->sync(
                $tags->random(rand(0, 3))->pluck('id')->toArray()
            );
        });
    }
}