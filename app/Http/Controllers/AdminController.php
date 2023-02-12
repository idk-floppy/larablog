<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Actions\DeleteTagAndRelatedPosts;
use App\Actions\UpdateTagAction;
use App\Http\Requests\TagFormValidation;

class AdminController extends Controller
{
    public function listPosts()
    {
        $posts = Post::query()->select('id AS id', 'title AS text', 'teaser AS teaser', 'content AS content', 'created_at AS created_at')->when(request('q'), function ($q) {
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
        return response()->json(['success' => 'Post successfully deleted!', 'url' => route('blog.home')]);
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
        if ($response['success']) {
            return redirect(route('blog.home'))->with('success', 'Tag updated successfully');
        } else {
            return $response['msg'];
        }
    }
}
