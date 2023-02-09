<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Select2 extends Component
{
    public $post;

    public function mount($post = null)
    {
        $this->post = $post;
    }

    public function getTagOptionsProperty()
    {
        $old = request()->old('tags');
        if ($this->post) { // checks if a post object is given
            return $old ?? $this->post->tags()->pluck('text')->toArray(); // if yes, takes either the old values or the post's values
        }
        return $old ?? []; // if no (so $post = null), returns either the old values or an empty array (so doing foreach doesn't fail with "array requested, string given")
    }

    public function render()
    {
        return view('livewire.select2');
    }
}