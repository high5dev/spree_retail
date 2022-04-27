<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\CategoriesResponse;
use App\Http\Resources\Product\CategoryResponse;
use App\Http\Resources\Product\ProductsResponse;
use App\Http\Resources\ProductResponse;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\VendorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Recommendation;

class ProductController extends Controller
{
    public $recommandationHelper; 

    public function __construct(Recommendation $recommandationHelper){
        $this->recommandationHelper = $recommandationHelper;
    }

    public function index()
    {
        //Get new arrivals
        $new_products = Product::orderBy('created_at','desc')->where('status','Active')->take(5)->get();
//        //Get new latest
//        $fashion_products = Product::where('main','Fashion')->where('status','Active')->take(5)->get();
//        //Get health and beauty
//        $health_products = Product::where('main','Health & Beauty')->where('status','Active')->take(5)->get();

        $f_cats = Category::where('main','Featured')->get();


        //dd($f_cats);
        $h_banners = Banner::where('type', 'Header')->get();


        $f_banner = Banner::where('type', 'Footer')->first();


        return view('pages.home',compact('f_cats','h_banners','f_banner','new_products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return new ProductResponse($product);
    }

    public function featuredCategory()
    {
        $f_cats = Category::where('main','Featured')->get();

        return new CategoriesResponse($f_cats);
    }

    public function subCategory()
    {

        $categories = Category::whereIn('main',config('enums.main_categories'))
            ->has('parents','=',0)
            ->with('child')->get();

        if (count($categories) > 0)
        {

            return response([
                'categories' => new CategoriesResponse($categories)
            ]);
        }else{
            return response([
                'message' => 'No Sub-Categories exists'
            ],400);
        }
    }

    public function featuredCategoryProduct(Request $request)
    {
        $request->validate([
            'f_category' => ['required', 'string'],
        ]);

        $products = Product::where('featured',$request['f_category'])
            ->where('status','Active')->take(5)->get();

        if (count($products) == 0)
        {
            return response()->json(['message' => 'No featured product against this category']);
        }

        return new ProductsResponse($products);
    }

    public function subCategoryProducts(Request $request)
    {
        $request->validate([
            'main' => ['required', 'string'],
            'p_name' => ['required', 'string'],
            'filter' => ['nullable', 'string'],
        ]);

        $main = $request->main;
        $p_name = $request->p_name;

        $category = Category::where('name','Men')
            ->with('child')->first();

        if (count($category->child) == 0)
        {
            return response([
                'message' => 'No Main-Category exists'
            ],400);
        }

        $temp = array();
        $count = 0;
        foreach ($category->child as $child)
        {

            $products = Product::where('main',$main)
                ->where('status','Active')
                ->whereHas('categories',function ($query) use ($child){
                    $query->where('name',$child->name);
                })->whereHas('categories',function ($query) use ($category){
                    $query->where('name',$category->name);
                });

            switch ($request->filter)
            {
                case 'Latest':
                    $products->orderBy('created_at','desc');
                    break;
                case 'Popular':
                    $products->orderBy('sold','desc');
                    break;
                case 'Price_H_L':
                    $products->orderBy('price','desc');
                    break;
                case 'Price_L_H':
                    $products->orderBy('price','asc');
                    break;

            }

            $products = $products->take(5)->get();


            $temp[$count]['child'] = new CategoryResponse($child);
            $temp[$count]['products'] = (new ProductsResponse($products));

            $count++;
        }

        return $temp;
    }

    public function main(Request $request)
    {
        $request->validate([
            'main' => ['required', 'string'],
        ]);

        $name = null;
        if (in_array($request->main, config('enums.main_categories')))
        {
            $products = Product::where('main',$request->main)
                ->where('status','Active')->take(15)->get();
            $categories = Category::where('main',$request->main)
                ->has('parents','=',0)
                ->with('child')->get();

            return response([
                'products' =>  new ProductsResponse($products),
                'categories' => new CategoriesResponse($categories)
        ]);
        }else{
            return response([
                'message' => 'Category not exists'
            ],400);
        }

    }

    public function child(Request $request)
    {
        $request->validate([
            'main' => ['required', 'string'],
            'p_name' => ['required', 'string'],
            'name' => ['required', 'string'],
        ]);

        $main = $request->main;
        $p_name = $request->p_name;
        $name = $request->name;


        if (in_array($main, config('enums.main_categories')))
        {
            $category = Category::where('name',$name)
                ->whereHas('parents',function ($query) use ($p_name){
                    $query->where('name',$p_name);
                })->first();


            $categories = Category::where('main',$main)
                ->has('parents','=',0)
                ->with('child')->get();

            $products = Product::where('main',$main)
                ->where('status','Active')
                ->whereHas('categories',function ($query) use ($name){
                    $query->where('name',$name);
                })->whereHas('categories',function ($query) use ($p_name){
                    $query->where('name',$p_name);
                })
                ->get();


            return response([
                'products' =>  new ProductsResponse($products),
            ]);
        }else{
            return response([
                'message' => 'Main category not exists'
            ],400);
        }

    }

    public function search(Request $request)
    {
        $products=DB::table('products')->where('name','LIKE','%'.$request->search."%")
            ->where('status','Active')->take(6)->get();

        if($products)
        {
            return new ProductsResponse($products);
        }
    }

    public function brands()
    {
        $brands = VendorProfile::select('brand_name AS name')->get();

        return response([
            'data' => $brands
        ],200);
    }

    public function brandProducts(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);

        $vendor = VendorProfile::where('brand_name', $request->name)->first();

        abort_if($vendor == null ,'402','Brand not found');

        $products = Product::where('user_id',$vendor->user_id)
            ->where('status','Active')->paginate(10);

        return new ProductsResponse($products);
    }

    /**
     * @param int $product_id
     */
    public function getRecommendations($product_id){
        $product = Product::find($product_id);
        $recommendations = $this->recommandationHelper->recommend($product);

        return response()->json(['product' => new ProductResponse($product), 'recommendations' => ProductResponse::collection($recommendations)], 200);
    }
}
