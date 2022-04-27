<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Banner\BannersResponse;
use App\Http\Resources\Banner\FeatureBrandResponse;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\VendorProfile;

class BannerController extends Controller
{
    //
    public function index(){
        return new BannersResponse(Banner::all());
    }

    public function getFeaturedBrands(){
       
        return response()->json(['data' => FeatureBrandResponse::collection(VendorProfile::all()) ], 200);
    }
}
