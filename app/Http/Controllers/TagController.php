<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Actions\DeleteTagAndRelatedPosts;

class TagController extends Controller
{
    public function search(Request $request)
    {
        $tags = Tag::query();
        if ($request->has('search')) {
            $tags->where('text', 'like', '%' . $request->search . '%');
        }
        return $tags->get();
    }

    public function index()
    {
        $tags = Tag::query()->with('posts')->when(request('q'), function ($q) {
            return $q->searchMain(request('q'));
        });
        return view('homepage', [
            'tags' => $tags->paginate(10)
        ]);
    }

    public function destroy(Tag $tag, DeleteTagAndRelatedPosts $action)
    {
        $response = $action->handle($tag);
        return response()->json(['success' => 'Post successfully deleted!', 'url' => route('blog.home')]);
    }
}
