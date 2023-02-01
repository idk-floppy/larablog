<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DefaultButton extends Component
{
    public $value;
    public function __construct($value = 'Button text')
    {
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.default-button');
    }
}