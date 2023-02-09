<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TextEditor extends Component
{
    public $text;
    public $tid;

    public function mount($text, $tid)
    {
        $this->text = $text;
        $this->tid = $tid;
    }

    public function render()
    {
        return view('livewire.text-editor');
    }
}
