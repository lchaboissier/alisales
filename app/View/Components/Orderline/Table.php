<?php

namespace App\View\Components\Orderline;

use Illuminate\View\Component;

class Table extends Component
{
    public $lines;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($lines)
    {
        $this->lines=$lines;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.orderline.table');
    }
}
