<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminPostsResponse200()
    {
        $response = $this->get(route('admin.listPosts'));
        $response->assertStatus(200);
        $response->assertseetext('Admin');
    }
    public function testAdminTagsResponse200()
    {
        $response = $this->get(route('admin.listTags'));
        $response->assertStatus(200);
        $response->assertseetext('Admin');
    }
}
