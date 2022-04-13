<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Address extends Component
{
    public $address;
    public $postalCode;
    public $city;
    /**
     * Create a new component instance.
     * @param $address
     * @param $postalCode
     * @param $city
     */
    public function __construct($address, $postalCode, $city)
    {
        $this->address = $address;
        $this->postalCode = $postalCode;
        $this->city = $city;
    }

    public function query()
    {
        return urlencode($this->address.','.$this->city);
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.address');
    }
}
