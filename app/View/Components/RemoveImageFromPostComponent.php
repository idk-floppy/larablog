<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RemoveImageFromPostComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $object;
    public function __construct($object)
    {
        $this->object = $object;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.remove-image-from-post-component');
    }
}
