<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\TagFormValidation;
use App\Models\Tag;

class UpdateTagAction
{
    public function handle(TagFormValidation $request)
    {
        DB::beginTransaction();
        try {
            $tagToUpdate = Tag::find($request->uid);
            $tagToUpdate->update(['text' => $request->validated('tag')]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return array('success' => false, 'msg' => response("<p><strong>Something went wrong... Please send this information to the administrator:</strong></p>\n\n" . $th, 500));
        }
        DB::commit();

        return array('success' => true, 'msg' => $tagToUpdate->id);
    }
}
