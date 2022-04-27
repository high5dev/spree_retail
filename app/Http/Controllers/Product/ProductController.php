<?php

namespace App\Http\Controllers\Product;

use App\Helpers\Helper;
use App\Helpers\Recommendation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductColorSize;
use App\Models\ProductImage;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('user')
            ->orderBy('created_at','desc')
            ->take(16)
            ->get();

        $colors = Color::all();
        $sizes = Size::all();
        $categories = config('enums.main_categories');

        return view('pages.featured',compact('products', 'colors', 'sizes', 'categories'));
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
     * @param  StoreRequest  $request
     */
    public function store(StoreRequest $request)
    {
        //$fileNameToStore = [];

        // foreach ($request['thumbnail'] as $thumbnail) {
        //     array_push($fileNameToStore, Helper::fileStore($request->user(), $thumbnail,'product'));
        // }
        $fileNameToStore = Helper::fileStore($request->user(), $request['thumbnail'], 'storage/product');
        $slug = Helper::createSlug(Product::class, $request['name']);
        $product = Product::create([
            'user_id' => auth()->user()->id,
            'name' => $request['name'],
            'featured' => $request['featured'],
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
        foreach($request->color as $color){
            ProductColor::create([
                'product_id'=>$product->id,
                'color_id'=>$color
            ]);
        }
        $recom = new Recommendation;

        $recom->updateSimilarityMatrix($product);

        $product->categories()->attach($request->category);
        $product->sizes()->attach($request->size);
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

        return redirect()->route('admin.dashboard.product.index')->with('popup_success','Product has been created');

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $category = null)
    {
        $product = Product::with(['sizes', 'user', 'user.vendor_profile'])->where('slug',$slug)->first();

        $recommendations = new Recommendation;

        $recommendations = $recommendations->recommend($product);

        $category = Category::where('slug',$category)->first();

        $colors = Color::all();
        $sizes = Size::all();
        // $product_colors=ProductColor::where('product_id', $product->id)->get();
        // dd($product_colors);
        return view('product.show',compact('product','category','recommendations', 'colors', 'sizes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($slug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateRequest $request, $slug)
    {
        $product = Product::where('slug',$slug)->first();
        $fileNameToStore = [];
        //Check if user has updated the thumbnail
        if ($request->has('thumbnail')){
            foreach ($request['thumbnail'] as $thumbnail) {
                array_push($fileNameToStore, Helper::fileStore($request->user(), $thumbnail,'storage/product'));
            }
        }else {
            if (count($product->thumbnail) == 0) {
                array_push($fileNameToStore, $product->thumbnail);
            } else {
                $fileNameToStore = array_map(function($img) {
                    return $img['path'];
                }, $product->thumbnail->toArray());
            }
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
        $product->featured = $request['featured'];
        $product->main = $request['main_category'];
        $product->quantity = $request['quantity'];
        $product->price = $request['price'];
        $product->description = $request['description'];
        $product->thumbnail = $fileNameToStore[0];
        $product->length = $request['length'];
        $product->width = $request['width'];
        $product->height = $request['height'];
        $product->weight = $request['weight'];
        $product->type_size_id = $request['type_size'];

        $product->save();

        $product->categories()->sync($request->category);
        $product->sizes()->sync($request->size);
        $product->colors()->sync($request->color);

        ProductImage::where('product_id', $product->id)->delete();
        foreach ($fileNameToStore as $file) {
            ProductImage::create([
                'product_id' => $product->id,
                'path' => $file
            ]);
        }

        $allProductId = ProductColorSize::where('product_id', $product->id)->pluck('id')->toArray();
        $arrKeepIDProductColorSize = [];
        foreach ($request->size as $size) {
            foreach ($request->color as $color) {
                $productColorSize = ProductColorSize::where('product_id', $product->id)->where('color_id', $color)->where('size_id', $size)->first();
                if(!$productColorSize) {
                    ProductColorSize::create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'size_id' => $size
                    ]);
                } else {
                    array_push($arrKeepIDProductColorSize, $productColorSize->id);
                }
            }
        }
        ProductColorSize::whereIn('id', array_diff($allProductId, $arrKeepIDProductColorSize))->delete();

        $recom = new Recommendation;

        $recom->updateSimilarityMatrix($product);

        return redirect()->route('admin.dashboard.product.index')->with('popup_success','Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($slug)
    {
        $product = Product::where('slug',$slug)->first();

        //Deleting Product
        $product->categories()->detach();

        //Deleting Blog Thumbnail
        Storage::delete('public/product/'.$product->thumbnail);

        $product->delete();


        return redirect()->route('admin.dashboard.product.index')->with('popup_success','Product has been deleted');
    }

    public function featured($featured) {
        $products = Product::with('user')
            ->where('featured', $featured)
            ->orderBy('created_at','desc')
            ->take(16)
            ->get();
        $colors = Color::all();
        $sizes = Size::all();
        $categories = config('enums.main_categories');

        return view('pages.featured',compact('products', 'featured', 'colors', 'sizes', 'categories'));
    }

    public function querySearch($query, $request) {
        $prices = $request->get('p');
        $colors = $request->get('c');
        $sizes = $request->get('s');
        $cat = $request->get('cat');

        if ($prices) {
            foreach ($prices as $price) {
                $range = explode('-', $price);
                if (count($range) == 2) {
                    $query->orWhereBetween('price', $range);
                } else {
                    $query->where('price', '>', (int)$range[0]);
                }
            }
        }

        if ($colors) {
            $query->whereHas('colors', function($q) use($colors) {
                $q->whereIn('color_id', $colors);
            });
        }

        if ($sizes) {
            $query->whereHas('sizes', function($q) use($sizes) {
                $q->whereIn('size_id', $sizes);
            });
        }

        if ($cat) {
            $query->whereHas('categories', function($q) use ($cat) {
                $q->where('main', $cat);
            });
        }

        return $query;
    }

    public function search(Request $request) {
        $query = Product::with('user')
            ->orderBy('created_at','desc');
        $query = $this->querySearch($query, $request);

        $products = $query->take(16)->get();
        $output = '';
        foreach ($products as $key => $product) {
            $output .= '<div class="col-3 mt-5 pl-0 pr-0">';
            $output .= "<a href=".route("product.show",[$product->slug]) .'"><img class= "customImage" src="'.asset('storage/product/'.$product->thumbnail).'" alt=""></a>';
            $output .= '<div class="textUnderImg">';
            $output .= '<h4>' . $product->user->vendor_profile->brand_name.'</h4>';
            $output .= '<p>'.$product->name.'</p>';
            $output .= '<h5>$'.$product->price.'.00</h5>';
            $output .= '</div>';
            $output .= '</div>';
        }

        return response()->json([
            'array'   => json_encode($output),
            'error'     => 0
        ]);
    }
}
