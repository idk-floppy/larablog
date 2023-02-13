<?php

namespace App\Actions;

use App\Models\Post;
use Clockwork\Request\Request;
use Illuminate\Support\Facades\DB;

class RemoveImageFromPostAction
{
    public function handle(Post $post)
    {
        DB::beginTransaction();
        try {
            $post->update(['image' => null]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
        DB::commit();
        return response()->json(['success' => true]);
    }
}
