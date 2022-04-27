<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_product';

    protected $guarded = [];

    public function order()
    {
        return $this->hasOne('App\Models\Order','id','order_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
    // public function user()
    // {
    //     return $this->hasOneThrough('App\Models\User','id','user_id');
    // }
}
