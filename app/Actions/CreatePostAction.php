<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CreatePostAction
{
    public function handle($request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $dataForNewPost = Arr::except($request->validated(), 'image');
                if ($request->image != null) {
                    $image = request()->file('image')->store('images');
                    $dataForNewPost['image'] = $image;
                }
                $newPost = Post::create($dataForNewPost);
                $newPost->refreshTags($request->tags ?? []);
            } catch (\Throwable $th) {
                report($th);
                return response('An error occured.', Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response('OK', Response::HTTP_OK);
        });
    }
}
