<?php

namespace App\View\Components\List;

use Illuminate\View\Component;

class groupItem extends Component
{
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label)
    {
        $this->label=$label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list.group-item');
    }
}
