<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerStoreRequest;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();


        return view('admin.dashboard.banner.index',compact('banners'));
    }

    public function create()
    {

        return view('admin.dashboard.banner.create');
    }

    public function store(BannerStoreRequest $request)
    {
        $fileNameToStore = Helper::fileStore($request->user(), $request['image'],'banner');

        $banner = Banner::create([
            'type' => $request['type'] == 1 ? 'Header' : 'Footer',
            'url' => $request['url'],
            'image' => $fileNameToStore,
        ]);

        return back()->with('popup_success','Banner created successfully');
    }

    public function edit($id)
    {
        $product = $banner = Banner::find($id);
        return view('admin.dashboard.banner.edit', compact('banner'));
    }

    public function update($id, Request $request)
    {
        $fileNameToStore = Helper::fileStore($request->user(), $request['image'],'banner');

        $banner = Banner::find($id); 
        $banner->update([
            'type' => $request['type'] == 1 ? 'Header' : 'Footer',
            'url' => $request['url'],
            'image' => $fileNameToStore,
        ]);

        return back()->with('popup_success','Banner updated successfully');
    }

    public function destroy($id){

        $banner = Banner::find($id); 

        $banner->delete(); 

        return back()->with('popup_success', 'Banner deleted successfully');
    }
}
