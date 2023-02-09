<?php

namespace App\Http\Livewire;

use App\Actions\CreatePostAction;
use App\Http\Requests\PostFormValidation;
use Livewire\Component;

class CreatePostForm extends Component
{
    // protected $rules = PostFormValidation::RULES;

    // public $title;
    // public $teaser;
    // public $content;
    // public array $tags;

    // public function validateForm()
    // {
    //     dd($this->all());
    //     $this->validate();
    //     $response = (new CreatePostAction)->handle($request);

    //     if ($response['success']) {
    //         return redirect(route('blog.show', $response['msg']->id))->with('success', 'Post created successfully');
    //     } else {
    //         return $response['msg'];
    //     }
    // }

    public function render()
    {
        return view('livewire.create-post-form');
    }
}