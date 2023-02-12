<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class CreatePostAction
{
    public function handle(Request $request)
    {
        DB::beginTransaction();
        try {
        } catch (\Throwable $th) {
            DB::rollBack();
            return array('success' => false, 'msg' => response("<p><strong>Something went wrong... Please send this information to the administrator:</strong></p>\n\n" . $th, 500));
        }
        DB::commit();

        return array('success' => true, 'msg' => 'success message');
    }
}
