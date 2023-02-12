<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class EditTagForm extends Component
{

    public Tag $tag;

    public function mount($tag)
    {
        $this->tag = $tag;
    }
    public function render()
    {
        return view('livewire.edit-tag-form');
    }
}
