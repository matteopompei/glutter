<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'image',
        'ingredients',
        'price',
        'visible'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
