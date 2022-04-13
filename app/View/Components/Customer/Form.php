<?php

namespace App\View\Components\Customer;

use Illuminate\View\Component;

class Form extends Component
{

    public $customer;
    public $route;
    public $method;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($customer=null)
    {
        $this->customer=$customer;
        $this->route = route($customer==null ? 'customer.store' : 'customer.update',['customer'=>$customer]);
        $this->method = $customer==null ? 'POST' : 'PUT';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.customer.form');
    }
}
