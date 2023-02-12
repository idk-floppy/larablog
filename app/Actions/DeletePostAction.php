<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class DeletePostAction
{
    public function handle(Post $post)
    {
        DB::beginTransaction();
        try {
            $post->tags()->sync([]);
            $post->delete();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => 'Something went wrong...', 'success' => false]);
        }
        DB::commit();
        return response()->json(['message' => 'Post successfully deleted!', 'url' => route('blog.home'), 'success' => true]);
    }
}
