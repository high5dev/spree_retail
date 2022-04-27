<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitchenApplication extends Model
{
    use HasFactory;

    protected $table ='kitchen_applications';

    protected $guarded = [];
}
