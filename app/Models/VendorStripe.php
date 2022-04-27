<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorStripe extends Model
{
    use HasFactory;

    protected $table = 'vendor_stripe';

    protected $guarded = [];
}
