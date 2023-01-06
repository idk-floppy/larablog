<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextInputField extends Component
{
    public $name;
    public $id;
    public $pholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $id, $pholder)
    {
        $this->name = $name;
        $this->id = $id;
        $this->pholder = $pholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.text-input-field');
    }
}