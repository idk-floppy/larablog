<?php

namespace App\Http\Controllers;

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
    public function store(PostFormValidation $request)
    {
        DB::beginTransaction();
        try {
            $newPost = Post::create($request->validated());
            $newPost->refreshTags($request->tags ?? []);
            $commit = true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return response("<p><strong>Something went wrong... Please send this information to the administrator:</strong></p>\n\n" . $th, 500);
        }
        DB::commit();
        return redirect(route('blog.show', $newPost->id))->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
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
    public function update(PostFormValidation $request, Post $post)
    {
        DB::beginTransaction();
        try {
            $post = $post->find($request->uid);
            $post->update($request->validated());
            $post->refreshTags($request->tags ?? []);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response("<p><strong>Something went wrong... Please send this information to the administrator:</strong></p>\n\n" . $th, 500);
        }
        DB::commit();
        return redirect(route('blog.show', $post->id))->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        DB::beginTransaction();
        try {
            $post->tags()->sync([]);
            $post->delete();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response("<p><strong>Something went wrong... Please send this information to the administrator:</strong></p>\n\n" . $th, 500);
        }
        DB::commit();
        return redirect(route('blog.home'))->with('success', 'Post deleted successfully');
    }
}