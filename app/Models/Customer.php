<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable=['name','address','postalCode','city','email','url','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class)->orderBy('datetime','desc');
    }

    /**
     * @return int|mixed
     */
    public function amount()
    {
        return $this->orders()->sum('amount');
    }

    public function getSelectLabelAttribute()
    {
        return $this->name;
    }
}


















