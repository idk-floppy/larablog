<?php

namespace App\Http\Controllers;

use App\Actions\CreatePostAction;
use App\Actions\DeletePostAction;
use App\Actions\RemoveImageFromPostAction;
use App\Actions\UpdatePostAction;
use Parsedown;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormValidation;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query()->with('tags')->when(request('q'), function ($q) {
            return $q->searchMain(request('q'));
        });
        $posts->text = $posts->title;
        return view('homepage', [
            'posts' => $posts->newestFirst()->paginate(12)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormValidation $request, CreatePostAction $action)
    {
        $response = $action->handle($request);
        if ($response['success']) {
            return redirect(route('blog.show', $response['msg']->id))->with('success', 'Post created successfully');
        } else {
            return $response['msg'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::query()->select('id AS id', 'title AS text', 'teaser AS teaser', 'content AS content', 'image AS image', 'created_at AS created_at')->find($post->id);
        $Parsedown = new Parsedown();
        $safeContent = $Parsedown->text($post->content);

        return view('show', [
            'post' => $post,
            'content' => $safeContent
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormValidation $request, UpdatePostAction $action)
    {
        $response = $action->handle($request);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, DeletePostAction $action)
    {
        $response = $action->handle($post);
        return response()->json(['success' => 'Post successfully deleted!', 'url' => route('blog.home')]);
    }

    public function deleteImage(Post $post, RemoveImageFromPostAction $action)
    {
        return $action->handle($post);
    }
}
