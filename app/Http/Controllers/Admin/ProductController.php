<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\TypeSize;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        
        $products = Product::orderBy('created_at','desc')->get();


        return view('admin.dashboard.product.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        $featured_cats = Category::where('main','Featured')->get();

        $type_sizes = TypeSize::all();
        $colors = Color::all();

        return view('admin.dashboard.product.create',compact('categories','featured_cats', 'type_sizes', 'colors'));
    }

    public function edit($slug)
    {
        $product = Product::with(['sizes', 'type_size', 'colors'])->where('slug',$slug)->first();

        $parents = Category::where('main',$product->main)->get();


        $categories = Category::all();

        $cat = $product->categories->pluck('id')->toArray();

        $parent_cat = $product->categories()
            ->whereHas('parents',function ($query){

            },'=',0)->first();

        $sub_cat = $product->categories()
            ->whereHas('parents',function ($query){

            },'>',0)->first();

        $categories = Category::all();

        $childs =[];
        if ($parent_cat != null){
            $childs = $parent_cat->child;
        }

        $featured_cats = Category::where('main','Featured')->get();

        $type_sizes = TypeSize::all();
        $colors = Color::all();
        $sizes = Size::where('type_size_id', $product->type_size_id)->get();

        return view('admin.dashboard.product.edit',compact('product','featured_cats','categories','cat','parents','parent_cat','sub_cat','childs', 'type_sizes', 'colors', 'sizes'));
    }
}
