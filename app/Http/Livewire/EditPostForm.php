<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPostForm extends Component
{
    public Post $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.edit-post-form');
    }
}
