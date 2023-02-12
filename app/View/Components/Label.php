<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Label extends Component
{
    public $name;
    public $label;
    public function __construct($label, $name)
    {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.label');
    }
}
