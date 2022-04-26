<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function dishes()
    {
        return $this->belongsToMany('App\Dish')->withPivot('quantity', 'order_id', 'dish_id', 'unit_price');
    }
}
