<?php

namespace App\View\Components\Form;

use Illuminate\Support\Facades\Auth;

class SelectCustomer extends Select
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name='customer_id',$label='Customer')
    {
        parent::__construct($this->list=Auth::user()->customers->keyBy('id'),$name,$label);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
