<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\Helper;
use App\Helpers\Recommendation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
Use App\Models\Color;
use App\Models\ProductColorSize;
use App\Models\Size;
use App\Models\TypeSize;
use App\Models\VendorStripe;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();


        return view('vendor.dashboard.product.index',compact('products'));
    }

    public function create()
    {
        $VendorStripe = VendorStripe::where( ['vendor_id' => auth()->user()->id] )->first();

        if ($VendorStripe == null){
            return back()->with('popup_error','Please attach your bank account first');
        }
        $categories = Category::all();
        $type_sizes = TypeSize::all();
        $colors= Color::all();
        return view('vendor.dashboard.product.create',compact('categories', 'colors', 'type_sizes'));
    }
    public function edit($slug)
    {
        $VendorStripe = VendorStripe::where( ['vendor_id' => auth()->user()->id] )->first();
        if ($VendorStripe == null){
            return back()->with('popup_error','Please attach your bank account first');
        }
        $product = Product::where('slug',$slug)->where('user_id',auth()->user()->id)->first();
        if ($product == null){
            return back()->with('popup_error','Product does not exists');
        }
        if ($product->status != config('enums.product_status.active')){
            return back()->with('popup_error','Product cannot be edited because it is not active');
        }
        $parents = Category::where('main',$product->main)->get();
        $categories = Category::all();
        $type_sizes = TypeSize::all();
        $colors= Color::all();
        $productColors=ProductColor::select('color_id')->where('product_id', $product->id)->get();
        $sizes = Size::where('type_size_id', $product->type_size_id)->get();
        $cat = $product->categories->pluck('id')->toArray();        
        return view('vendor.dashboard.product.edit',compact('product','categories','cat','parents', 'type_sizes', 'colors', 'productColors', 'sizes'));
    }

    public function store(StoreRequest $request)
    {
        $VendorStripe = VendorStripe::where( ['vendor_id' => auth()->user()->id] )->first();
        if ($VendorStripe == null){
            return back()->with('popup_error','Please attach your bank account first');
        }
        //$fileNameToStore=[];
        $fileNameToStore = Helper::fileStore($request->user(), $request['thumbnail'],'product');
        $slug = Helper::createSlug(Product::class, $request['name']);
        $product = Product::create([
            'user_id' => auth()->user()->id,
            'name' => $request['name'],
            'main' => $request['main_category'],
            'slug' => $slug,
            'quantity' => $request['quantity'],
            'remaining' => $request['quantity'],
            'price' => $request['price'],
            'description' => $request['description'],
            'thumbnail' => $fileNameToStore,
            'status' => 'Active',
            'length' => $request['length'],
            'width' => $request['width'],
            'height' => $request['height'],
            'weight' => $request['weight'],
            'type_size_id' => $request['type_size']
        ]);
        $recom = new Recommendation;

        $recom->updateSimilarityMatrix($product);

        $product->categories()->attach($request->category);
        $product->sizes()->attach($request->size);
        //$product->colors()->attach($request->color);
        foreach ($request->size as $size) {
            foreach ($request->color as $color) {
                ProductColorSize::create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'size_id' => $size
                ]);
            }
        }
        // foreach ($fileNameToStore as $file) {
        //     ProductImage::create([
        //         'product_id' => $product->id,
        //         'path' => $file
        //     ]);
        // }
        foreach($request->color as $color){
            ProductColor::create([
                'product_id'=>$product->id,
                'color_id'=>$color
            ]);
        }
        
        $recom = new Recommendation;

        $recom->updateSimilarityMatrix($product);

        $product->categories()->attach($request->category);

        return redirect()->route('vendor.dashboard.product.index')->with('popup_success','Product has been created');

    }

    public function update(UpdateRequest $request, $slug)
    {
        $VendorStripe = VendorStripe::where( ['vendor_id' => auth()->user()->id] )->first();
        if ($VendorStripe == null){
            return back()->with('popup_error','Please attach your bank account first');
        }

        $product = Product::where('slug',$slug)->where('user_id',auth()->user()->id)->first();

        if ($product == null){
            return back()->with('popup_error','Product does not exists');
        }

        if ($product->status != config('enums.product_status.active')){
            return back()->with('popup_error','Product cannot be edited because it is not active');
        }

        $product = Product::where('slug',$slug)->first();

        //Check if user has updated the thumbnail
        if ($request->has('thumbnail')){
            $fileNameToStore = Helper::fileStore($request->user(), $request['thumbnail'],'product');
        }else{
            $fileNameToStore = $product->thumbnail;
        }

        //Check if user has changed the name
        if ($request['name'] != $product->name){
            $slug = Helper::createSlug(Product::class, $request['name']);
        }else{
            $slug = $product->slug;
        }

        //Update Product

        $product->name = $request['name'];
        $product->slug = $slug;
        $product->main = $request['main_category'];
        $product->quantity = $request['quantity'];
        $product->price = $request['price'];
        $product->description = $request['description'];
        $product->thumbnail = $fileNameToStore;
        $product->length = $request['length'];
        $product->width = $request['width'];
        $product->height = $request['height'];
        $product->weight = $request['weight'];
        $product->type_size_id = $request['type_size'];

        $product->save();
        $product->categories()->sync($request->category);
        $product->sizes()->sync($request->size);
        $product->colors()->sync($request->color);


        $recom = new Recommendation;

        $recom->updateSimilarityMatrix($product);

        return redirect()->route('vendor.dashboard.product.index')->with('popup_success','Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($slug)
    {
        $product = Product::where('slug',$slug)->where('user_id',auth()->user()->id)->first();

        if ($product == null){
            return back()->with('popup_error','Product does not exists');
        }
        $inactive_d = $product->inactive;

        $t_d = Carbon::now()->toDateString();
        if ($inactive_d != null)
        {
            $date_w = Carbon::createFromDate($inactive_d);
            $now = Carbon::now();
            $diff = $date_w->diffInDays($now);
            if ($diff < 40){
                $diff = 40 - $diff;
                return redirect()->route('vendor.dashboard.product.index')->with('popup_error','Product has been set as inactive and will be deleted after 40 days. Until then it will not be shown on our site. '.$diff.' day(s) remaining');
            }
        }else{
            $product->status = config('enums.product_status.inactive');
            $product->inactive = $t_d;
            $product->save();
            return redirect()->route('vendor.dashboard.product.index')->with('popup_error','Product has been set as inactive and will be deleted after 40 days. Until then it will not be shown on our site');
        }
        //Deleting Product
        $product->categories()->detach();


        $product->delete();


        return redirect()->route('vendor.dashboard.product.index')->with('popup_success','Product has been deleted');
    }

    public function active($slug)
    {
        $product = Product::where('slug',$slug)->where('user_id',auth()->user()->id)->first();

        if ($product == null){
            return back()->with('popup_error','Product does not exists');
        }

        $product->status = config('enums.product_status.active');
        $product->inactive = null;
        $product->save();

        return back()->with('popup_success','Product has been activated');
    }

    public function parent(Request $request)
    {
        $categories = Category::where('main',$request->name)->get()->pluck('name');

        return response()->json([
            'array'   => json_encode($categories),
            'error'     => 0
        ]);
    }

    public function typeSize(Request $request, $type_size_id)
    {
        // $type_sizes = Size::where('product_type', $request->product_type)->get()->toArray();

        // return response()->json([
        //     'array'   => json_encode($type_sizes),
        //     'error'     => 0
        // ]);
        $sizes = Size::where('type_size_id', $type_size_id)->get()->toArray();
        return response()->json([
            'array'   => json_encode($sizes),
            'error'     => 0
        ]);
    }

    public function initTypeSize(Request $request) {
        $product = Product::with(['sizes', 'type_size'])->find($request->product_id);
        if (isset($product->type_size) && isset($product->type_size->product_type)) {
            $sizes = Size::where('product_type', $product->type_size->product_type)->get();
        } else {
            $sizes = [];
        }
        $results = [];
        foreach ($sizes as $size) {
            $isSelected = false;
            if (count($product->sizes) > 0) {
                foreach ($product->sizes as $p_size) {
                    if ($size->id == $p_size->id) {
                        $isSelected = true;
                    }
                }
            }
            array_push($results, [
                'id' => $size->id,
                'name' => $size->name,
                'selected' => $isSelected
            ]);
        }

        return response()->json([
            'array'   => json_encode($results),
            'error'     => 0
        ]);
    }
}
