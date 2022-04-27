<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(){
        return $this->belongsToMany('App\Models\User','role_user','role_id','user_id','id','id');
    }

    public function t_users(){
        return $this->belongsToMany('App\Models\User','role_user','role_id','user_id','id','id')
            ->whereDate('created_at',Carbon::today());
    }


}
