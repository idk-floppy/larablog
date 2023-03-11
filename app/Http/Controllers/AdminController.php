<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Actions\DeleteTagAndRelatedPosts;
use App\Actions\UpdateTagAction;
use App\Http\Requests\TagFormValidation;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function show(Tag $tag)
    {
        $tag->load('posts');
        return view('tag/show', [
            'tag' => $tag
        ]);
    }
    public function listPosts()
    {
        $posts = Post::query()->when(request('q'), function ($q) {
            return $q->searchMain(request('q'));
        });
        return view('admin/posts', [
            'posts' => $posts->newestFirst()->paginate(10)
        ]);
    }
    public function listTags()
    {
        $tags = Tag::query()->when(request('q'), function ($q) {
            return $q->searchMain(request('q'));
        });
        return view('admin/tags', [
            'tags' => $tags->paginate(10)
        ]);
    }
    public function destroy(Tag $tag, DeleteTagAndRelatedPosts $action)
    {
        $response = $action->handle($tag);
        return $response;
    }
    public function edit(Tag $tag)
    {
        return view('tag/edit', [
            'tag' => $tag,
        ]);
    }
    public function update(TagFormValidation $request, UpdateTagAction $action)
    {
        $response = $action->handle($request);
        return $response;
    }
}
