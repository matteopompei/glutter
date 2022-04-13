<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';
    protected $fillable = [
        'name',
        'image',
        'ingredients',
        'price',
        'visible',
        'id',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
