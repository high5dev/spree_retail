<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','category_product','product_id','category_id','id','id');
    }

    public function dispatchs()
    {
        return $this->hasMany('App\Models\ProductDispatch','product_id','id');
    }

    public function sizes() {
        return $this->belongsToMany('App\Models\Size', 'product_size', 'product_id', 'size_id', 'id', 'id');
    }

    public function colors() {
        return $this->belongsToMany('App\Models\Color', 'product_colors', 'product_id', 'color_id', 'id', 'id');
    }

    public function type_size() {
        return $this->belongsTo('App\Models\TypeSize', 'type_size_id', 'id');
    }

    public function images() {
        return $this->hasMany('App\Models\ProductImage', 'product_id', 'id');
    }

    public function dispatchCount()
    {
        $dispatchs = $this->dispatchs()->where('status',config('enums.product_dispatch.shipped'))->get();

        $dispatched = 0;
        foreach ($dispatchs as $dispatch)
        {
            $dispatched = $dispatched + $dispatch->quantity;
        }
        return $dispatched;
    }
}
