<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormValidation;

class UpdatePostAction
{
    public function handle(PostFormValidation $request)
    {
        DB::beginTransaction();
        try {
            $postToUpdate = Post::find($request->uid);
            $postToUpdate->update($request->validated());
            $postToUpdate->refreshTags($request->tags ?? []);
        } catch (\Throwable $th) {
            DB::rollBack();
            return array('success' => false, 'msg' => response("<p><strong>Something went wrong... Please send this information to the administrator:</strong></p>\n\n" . $th, 500));
        }
        DB::commit();

        return array('success' => true, 'msg' => $postToUpdate);
    }
}
