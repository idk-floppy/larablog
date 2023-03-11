<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Response;

class UpdateTagAction
{
    public function handle($request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $tagToUpdate = Tag::find($request->uid);
                $tagToUpdate->update(['text' => $request->validated('tag')]);
            } catch (\Throwable $th) {
                report($th);
                return response('An error occured.', Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response('OK', Response::HTTP_OK);
        });
    }
}
