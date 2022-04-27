<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cart\CartResponse;
use App\Http\Resources\ProductResponse;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        Cart::restore(auth()->user()->id);

        if (Cart::instance('default')->count() == 0){
            return response()->json(['message' => 'No item in the cart']);
        }

        $customerAlsoBought = Product::inRandomOrder();
        if (Cart::instance('default')->count() > 0)
        {
            foreach (Cart::content() as $item)
            {
                $customerAlsoBought->where('slug','!=',$item->slug);
            }
        }
        $customerAlsoBought = $customerAlsoBought->take(5)->get();

        $items = [];
        $count = 0;
        $temp = [];
        foreach (Cart::content() as $item) {

            $temp['rowId'] = $item->rowId;
            $temp['name'] = $item->name;
            $temp['qty'] = $item->qty;

            $temp['product'] = new ProductResponse( $item->model);

            $items[$count] = $temp;

            $count++;
        }
        return response([
            'items' => $items,
            'subtotal' => Cart::subtotal(),
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);
        Cart::restore(auth()->user()->id);

        $product = Product::where('id',$request->id)->where('status','Active')->first();

        abort_if($product == null,'404','Product not found');

        $duplicates = Cart::search(function ($cartItem , $rowid) use ($request){
            $product = Product::where('id',$request->id)->first();

            return $cartItem->id === $product->id;
        });

        if($duplicates->isNotEmpty()){
            return response(['message' => 'Product is already in your cart'], 400);
        }


        Cart::add($product->id,$product->name,$request->quantity,$product->price)
            ->associate('App\Models\Product');

        Cart::store(auth()->user()->id);

        return response(['message' => 'Product has been added to your cart'], 201);

    }

    public function destroy(Request $request)
    {
        $request->validate([
            'rowId' => 'required|string',
        ]);

        Cart::restore(auth()->user()->id);

        try {
            Cart::remove($request->rowId);
        }catch (\Exception $e){
            return response(['message' => 'Item does not exist in cart'], 400);
        }

        Cart::store(auth()->user()->id);

        return response(['message' => 'Product has been removed from cart'], 201);
    }
}
