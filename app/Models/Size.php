<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sizes';

    const PRODUCT_TYPE = [
        'DENIM' => 'denim',
        'APPAREL' => 'apparel',
        'SHOE' => 'shoe'
    ];

    protected $fillable = ['name', 'product_type'];

}
