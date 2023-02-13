<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    // public const RULES = [
    //     'title' => 'required|min:2|max:255',
    //     'teaser' => 'max:255',
    //     'content' => 'max:50000|required',
    //     'tags' => 'max:3',
    //     'tags.*' => 'string|min:2|max:32|regex:/^[a-z0-9\ö\ü\ó\ő\ú\é\á\ű\í]/',
    // ];
    public function rules()
    {
        return [
            'title' => 'required|min:2|max:255',
            'teaser' => 'max:255',
            'image' => 'nullable|sometimes|image|mimes:jpeg,jpg,png,svg|dimensions:max_width=1920,max_height=1080,min_width=600,min_height=400|max:10240',
            'content' => 'max:50000|required',
            'tags' => 'max:3',
            'tags.*' => 'string|min:2|max:32|regex:/^[a-z0-9\ö\ü\ó\ő\ú\é\á\ű\í]/',
        ];
    }
}