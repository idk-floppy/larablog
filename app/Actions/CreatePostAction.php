<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormValidation;
use Illuminate\Support\Arr;

class CreatePostAction
{
    public function handle(PostFormValidation $request)
    {
        DB::beginTransaction();
        try {
            $dataForNewPost = Arr::except($request->validated(), 'image');
            if ($request->image != null) {
                $image = request()->file('image')->store('images');
                $dataForNewPost['image'] = $image;
            }
            $newPost = Post::create($dataForNewPost);
            $newPost->refreshTags($request->tags ?? []);
        } catch (\Throwable $th) {
            DB::rollBack();
            return array('success' => false, 'msg' => response("<p><strong>Something went wrong... Please send this information to the administrator:</strong></p>\n\n" . $th, 500));
        }
        DB::commit();

        return array('success' => true, 'msg' => $newPost);
    }
}
