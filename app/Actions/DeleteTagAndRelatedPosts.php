<?php

namespace App\Actions;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class DeleteTagAndRelatedPosts
{
    public function handle(Tag $tag)
    {
        DB::beginTransaction();
        try {
            $tag->posts()->sync([]);
            $tag->delete();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => 'Something went wrong...', 'success' => false]);
        }
        DB::commit();
        return response()->json(['message' => 'Tag successfully deleted!', 'url' => route('blog.home'), 'success' => true]);
    }
}
