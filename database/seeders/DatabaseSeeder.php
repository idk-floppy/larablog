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
        $this->command->alert('Seeding models');
        $this->call([
            PostSeeder::class,
            TagSeeder::class,
        ]);

        $this->command->alert('Seeding post-tag relations');
        $this->command->info('Wait until you see "seeding finished" message');
        $tags = Tag::all();
        Post::all()->each(function ($post) use ($tags) {
            $post->tags()->sync(
                $tags->random(rand(0, 3))->pluck('id')->toArray()
            );
        });
        $this->command->alert('Seeding finished');
    }
}