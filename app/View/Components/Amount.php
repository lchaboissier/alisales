<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Amount extends Component
{

    public $amount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(float $amount)
    {
        $this->amount=$amount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.amount');
    }
}
