<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function Sodium\add;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Models\Role','role_user','user_id','role_id','id','id');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile','user_id','id');
    }

    public function vendor_profile()
    {
        return $this->hasOne('App\Models\VendorProfile','user_id','id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product','user_id','id');
    }

    public function address()
    {
        return $this->hasMany('App\Models\Address','user_id','id');
    }

    public function store_address($request){
        $address = Address::create([
            'user_id' => $this->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'app_address' => $request->app_address,
            'city' => $request->city,
            'region' => $request->region,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
        ]);

        return $address;
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order','user_id','id');
    }

    public function card()
    {
        return $this->hasOne('App\Models\UserCard','user_id','id');
    }

}
