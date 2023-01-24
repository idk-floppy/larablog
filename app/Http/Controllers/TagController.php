<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function search(Request $request)
    {
        $tags = Tag::query();
        if ($request->has('search')) {
            $tags->where('text', 'like', '%' . $request->search . '%');
        }
        return $tags->get();
    }
}