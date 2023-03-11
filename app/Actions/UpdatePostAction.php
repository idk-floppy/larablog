<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Response;

class UpdatePostAction
{
    public function handle($request)
    {
        return DB::transaction(function ()  use ($request) {
            try {
                $dataForPostToUpdate = Arr::except($request->validated(), 'image');
                if ($request->image != null) {
                    $image = request()->file('image')->store('images');
                    $dataForPostToUpdate['image'] = $image;
                }
                $postToUpdate = Post::find($request->uid);
                $postToUpdate->update($dataForPostToUpdate);
                $postToUpdate->refreshTags($request->tags ?? []);
            } catch (\Throwable $th) {
                report($th);
                return response('An error occured.', Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response('OK', Response::HTTP_OK);
        });
    }
}
