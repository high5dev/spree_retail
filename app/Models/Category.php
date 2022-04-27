<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product','category_product','category_id','product_id','id','id');
    }

    public function parents()
    {
        return $this->belongsToMany('App\Models\Category','category_parent','category_id','parent_id','id','id');
    }

    public function child()
    {
        return $this->belongsToMany('App\Models\Category','category_parent','parent_id','category_id','id','id');
    }
}
