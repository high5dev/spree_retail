<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity','price','status');
    }

    public function subscription()
    {
        return $this->belongsTo('App\Models\Subscription')->withPivot('quantity','price');
    }

    public function tracking_info()
    {
        $temp = new Helper();
        if ($this->fedex_tracking_id != null){
            try {
                $response = $temp->trackingOrder($this->fedex_tracking_id);
                if ($response != null){
                    return $response->CompletedTrackDetails->TrackDetails->StatusDetail->Description;
                }
            }catch (\Exception $e)
            {
                return null;
            }
        }else{
            return null;
        }
    }


}
