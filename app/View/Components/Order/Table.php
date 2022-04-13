<?php

namespace App\View\Components\Order;

use Illuminate\View\Component;

class Table extends Component
{
    public $orders;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($orders)
    {
        $this->orders=$orders;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.order.table');
    }
}
