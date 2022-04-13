<?php

namespace Database\Factories;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $amount = random_int(100,10000000)/100;
        return [
            'datetime'=>Carbon::now()->addDays(-random_int(0,365*5))->setHour(random_int(0,23))->setMinutes(random_int(0,59)),
            'amount'=>$amount,
            'amountTVA'=>$amount*0.2,
        ];
    }
}
