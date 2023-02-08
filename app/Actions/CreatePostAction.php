<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormValidation;

class CreatePostAction
{
    public function handle(PostFormValidation $request)
    {
        DB::beginTransaction();
        try {
            $newPost = Post::create($request->validated());
            $newPost->refreshTags($request->tags ?? []);
            $commit = true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return array('success' => false, 'msg' => response("<p><strong>Something went wrong... Please send this information to the administrator:</strong></p>\n\n" . $th, 500));
        }
        DB::commit();

        return array('success' => true, 'msg' => $newPost);
    }
}
