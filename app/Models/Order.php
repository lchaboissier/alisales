<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=['datetime','amount','amountTVA','customer_id'];

    protected $casts=['datetime'=>'datetime'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderitems()
    {
        return $this->hasMany(Orderitem::class);
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount']=floatval($value);
    }
}
