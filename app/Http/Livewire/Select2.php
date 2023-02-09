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

    public function render()
    {
        return view('livewire.select2');
    }
}
