<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();


        return view('admin.dashboard.category.index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();



        return view('admin.dashboard.category.create',compact('categories'));
    }

    public function edit($slug)
    {
        $category= Category::where('slug',$slug)->first();

        $parents = Category::where('main',$category->main)->get();

        $categories = Category::all();


        return view('admin.dashboard.category.edit',compact('category','categories','parents'));
    }

    public function show($slug)
    {
        $category= Category::where('slug',$slug)->first();

        $products = $category->products;

        return view('admin.dashboard.category.product',compact('products','category'));
    }

    public function parent(Request $request)
    {
        $categories = Category::where('main',$request->name)->get()->pluck('name');

        return response()->json([
            'array'   => json_encode($categories),
            'error'     => 0
        ]);
    }
    public function sub_parent(Request $request)
    {
        $categories = Category::where('name',$request->name)->first();

        return response()->json([
            'array'   => json_encode($categories->child->pluck('name')),
            'error'     => 0
        ]);
    }
}
