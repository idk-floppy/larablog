<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    public function listPosts()
    {
        $posts = Post::query()->with('tags')->when(request('q'), function ($q) {
            return $q->searchMain(request('q'));
        });
        return view('admin/posts', [
            'posts' => $posts->newestFirst()->paginate(10)
        ]);
    }
    public function listTags()
    {
    }
}
