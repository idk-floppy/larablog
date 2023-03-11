<?php

namespace App\Actions;

use Exception;
use App\Models\Tag;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteTagAndRelatedPosts
{
    public function handle(Tag $tag)
    {
        return DB::transaction(function () use ($tag) {
            try {
                $tag->posts()->sync([]);
                $tag->delete();
            } catch (\Throwable $th) {
                report($th);
                return response('An error occured.', Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response('OK', Response::HTTP_OK);
        });
    }
}
