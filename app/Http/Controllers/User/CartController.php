<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\ShippingRequest;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * use to allow only guest
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Cart::destroy();

        Cart::restore(auth()->user()->id);

        $customerAlsoBought = Product::inRandomOrder();
        if (Cart::instance('default')->count() > 0)
        {
            foreach (Cart::content() as $item)
            {
                $customerAlsoBought->where('slug','!=',$item->slug);
            }
        }
        $customerAlsoBought = $customerAlsoBought->take(5)->get();
        return view('cart.index',compact('customerAlsoBought'));
    }

    public function store(Request $request)
    {
        //dd($request->size);
        Cart::destroy();
        Cart::restore(auth()->user()->id);

        $product = Product::where('slug',$request->slug)->where('status','Active')->first();
        //dd($product->thumbnail);
        abort_if($product == null,'404','Product not found');

        $duplicates = Cart::search(function ($cartItem , $rowid) use ($request){
            $product = Product::where('slug',$request->slug)->first();

            return $cartItem->id === $product->id;
        });

        if($duplicates->isNotEmpty()){
            return redirect('/cart')->with('popup_success','Product is already in your cart');
        }


        Cart::add($product->id,$product->name,1,$product->price, ['size' => $request->size, 'color' => $request->color, 'thumbnail'=>$product->thumbnail])
            ->associate('App\Models\Product');
        Cart::store(auth()->user()->id);
        
        return redirect('/cart')->with('popup_success','Product has been added to your cart');

    }

    public function shipping()
    {
        Cart::destroy();
        Cart::restore(auth()->user()->id);
        
        if (Cart::instance('default')->count() == 0){
            return back()->with('popup_success','Please add something to cart first');
        }

        $user = auth()->user();

        $addresses = $user->address()->select(['id','first_name','last_name','address','app_address','city','country','zipcode','region'])->get();

        $u_address = session('address');
        $date_estimated=$this->estimateDeliveryDate();

        return view('cart.shipping',compact('user','addresses','u_address', 'date_estimated'));

    }

    public function saveForLater($id)
    {

        $item = Cart::get($id);


        Cart::remove($id);

        $duplicates =  Cart::instance('saveForLater')->search(function ($cartItem , $rowid) use ($id){

            return $cartItem->id === $id;
        });

        if($duplicates->isNotEmpty()){
            return back()->with('popup_success','Product is already in saved for later');
        }


        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Models\Product');

        return back()->with('popup_success', 'Product has been saved for later!');
    }

    public function saveForLaterDetail($product_id)
    {

        $item = Product::find($product_id);

        $duplicates =  Cart::instance('saveForLater')->search(function ($cartItem , $rowid) use ($product_id){
            return $cartItem->id === (int)$product_id;
        });

        if($duplicates->isNotEmpty()){
            return back()->with('popup_success','Product is already in saved for later');
        }


        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Models\Product');

        return back()->with('popup_success', 'Product has been saved for later!');
    }

    public function empty()
    {
        Cart::instance('saveForLater')->destroy();
        Cart::instance('default')->destroy();
    }

    public function destroy($id)
    {
        Cart::destroy();
        Cart::restore(auth()->user()->id);

        Cart::remove($id);

        Cart::store(auth()->user()->id);

        return redirect('/cart')->with('popup_success','Product has been removed from your cart');
    }

    public function destroy_saveForLater($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return back()->with('popup_success','Product has been removed!');

    }
    public function estimateDeliveryDate(){
        $date_estimated="";
        $startdate=Carbon::now()->addDays(5);
        $enddate=Carbon::now()->addDays(7);
        if(($enddate->day)<3){
            $date_estimated= $startdate->format('M d') . " - " . Carbon::parse($enddate)->format('M d');
        }
        else{
            $date_estimated= $startdate->format('M d') . " - " . $enddate->day;
        }   
        return $date_estimated;
    }
}
