<?php

namespace App\Http\Controllers\Product;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use App\Models\CategoryParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreRequest $request)
    {
        $category = Category::where('name',$request->name)->where('main',$request->main_category)->first();

        if ($category == null)
        {
            $slug = Helper::createSlug(Category::class, $request['name']);
            $category = Category::firstOrNew([
                'name' => $request['name'],
                'slug' => $slug,
                'main' => $request['main_category'],
            ]);
            $category->save();
        }elseif($request->parent_category != null){
            if (in_array($request->parent_category,$category->parents->pluck('name')->toArray())){
                return back()->with('popup_error','Category already belongs to parent category');
            }elseif ($request->parent_category == $request['name']){
                return back()->with('popup_error','Category cannot belongs to itself');
            }
        }else{
            return back()->with('popup_error','Category already exists');
        }

        if ($request->parent_category != null)
        {
            $cat = Category::where('name',$request->parent_category)
                ->where('main',$request->main_category)->first();

            if ($cat == null){
                return back()->with('popup_error','There was a problem with the parent category');
            }
            CategoryParent::create([
                'category_id' => $category->id,
                'parent_id' => $cat->id,
            ]);
        }


        return back()->with('popup_success','Category has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $slug)
    {
        $cat = Category::where('slug',$slug)->first();

        abort_if($cat == null, 404);

        if ($request->name != $cat->name){
            $category = Category::where('name',$cat->name)->where('main',$request->main_category)->first();


            if ($category == null)
            {
                $slug = Helper::createSlug(Category::class, $request['name']);
                $category = Category::firstOrNew([
                    'name' => $request['name'],
                    'slug' => $slug,
                    'main' => $request['main_category'],
                ]);
                $category->save();
            }elseif($request->parent_category != null){
                if (in_array($request->parent_category,$category->parents->pluck('name')->toArray())){
                    return back()->with('popup_error','Category already belongs to parent category');
                }elseif ($request->parent_category == $request['name']){
                    return back()->with('popup_error','Category cannot belongs to itself');
                }
            }else{
                return back()->with('popup_error','Category already exists');
            }
        }

        if ($request->parent_category != null)
        {
            $cat = Category::where('name',$request->parent_category)
                ->where('main',$request->main_category)->first();

            CategoryParent::create([
                'category_id' => $category->id,
                'parent_id' => $cat->id,
            ]);
        }


        return back()->with('popup_success','Category has been created');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($slug)
    {
        $category = Category::where('slug',$slug)->first();

        if ($category->parent_id == null){
            DB::table('categories')->where('parent_id',$category->id)
                ->update(['parent_id' => null]);
        }

        $category->delete();


        return back()->with('pop_success','Category has been delete');
    }
}
