<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testBlogHomeIsAvailable()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText("Posts");
    }
    public function testPostIsCreatedAndIsReadable()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('blog.show', $post->id));
        $response->assertStatus(200);
        $response->assertSeeText($post->title);
    }
    public function testSearchExistsInBlogHomepage()
    {
        $response = $this->get(route('blog.home'));
        $response->assertStatus(200);
        $response->assertSee('Search');
    }
    public function testNewPostCreationFormExists()
    {
        $response = $this->get(route('blog.create'));
        $response->assertStatus(200);
        $response->assertSeeText('New Post');
        $response->assertSee('Save');
    }
}
