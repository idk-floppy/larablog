<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditButton extends Component
{
    public $object;
    public $type;
    public function __construct($object, $type)
    {
        $this->object = $object;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.edit-button');
    }
}
