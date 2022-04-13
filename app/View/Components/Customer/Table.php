<?php

namespace App\View\Components\Customer;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Table extends Component
{
    public $customers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $customers)
    {
        $this->customers=$customers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.customer.table');
    }
}
