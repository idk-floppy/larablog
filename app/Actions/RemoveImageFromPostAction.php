<?php

namespace App\Actions;

use App\Models\Post;
use Clockwork\Request\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class RemoveImageFromPostAction
{
    public function handle(Post $post)
    {
        return DB::transaction(function () use ($post) {
            try {
                $post->update(['image' => null]);
            } catch (\Throwable $th) {
                report($th);
                return response('An error occured.', Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response('OK', Response::HTTP_OK);
        });
    }
}
