<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostImage extends Component
{
    public $image;
    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-image');
    }
}
