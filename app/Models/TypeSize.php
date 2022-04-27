<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSize extends Model
{
    use HasFactory;

    protected $table = 'type_sizes';

    protected $fillable = ['name'];
}
