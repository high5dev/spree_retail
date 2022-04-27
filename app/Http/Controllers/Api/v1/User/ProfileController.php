<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CardStoreRequest;
use App\Http\Requests\User\StoreAddress;
use App\Http\Resources\AddressResponse;
use App\Http\Resources\Profile\AddressesResponse;
use App\Http\Resources\Profile\CardResponse;
use App\Http\Resources\Profile\OrderProductsResponse;
use App\Http\Resources\Profile\OrdersResponse;
use App\Http\Resources\Profile\UserResponse;
use App\Models\Address;
use App\Models\Order;
use App\Models\UserCard;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Exception\MissingParameterException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return new UserResponse($user);
    }

    public function card()
    {
        $user = auth()->user();

        $u_card = $user->card;

        if (is_null($u_card)){
            abort(404,'No card found');
        }
        return new CardResponse($u_card);
    }

    public function cardStore(CardStoreRequest $request)
    {
        $user = auth()->user();

        if ($user->card != null){
            abort(400,'Cannot add more then one card at a time');
        }

        try {
            $customer = Stripe::customers()->create([
                'email' => auth()->user()->email,
            ]);


            $card = Stripe::cards()->create($customer['id'], $request->stripeToken);

            $card_data = new UserCard();

            $card_data->user_id = auth()->user()->id;
            $card_data->name = $request['name_on_card'];
            $card_data->card_number = $card['last4'];
            $card_data->exp_month = $card['exp_month'];
            $card_data->exp_year = $card['exp_year'];
            $card_data->stripe_id = $card['id'];

            $card_data->save();

            $user->stripe_id = $customer['id'];
            $user->save();

            return response(['message' => 'Card added successfully'], 201);
        } catch (CardErrorException $e) {
            abort(400,'Something went wrong');
        } catch (MissingParameterException $e){
            abort(400,'Something went wrong');
        }

    }

    public function cardDestroy()
    {
        $user = auth()->user();

        $card = $user->card;
        if ($user->card == null){
            abort(404,'No card found');
        }

        $card->delete();
        $user->stripe_id = null;
        $user->save();

        return response(['message' => 'Card deleted successfully'], 204);

    }

    public function address()
    {
        $user = auth()->user();

        $addresses = $user->address;

        if (count($addresses) == 0){
            abort(404,'No address found');
        }

        return new AddressesResponse($addresses);
    }

    public function addressStore(StoreAddress $request)
    {
        $user = auth()->user();

        //Check for max two address
        $addresses = $user->address;
        if (count($addresses) >= 2){
            abort(400,'Maximum two address are allowed');
        }

        auth()->user()->store_address($request);


        return response(['message' => 'Address added successfully'], 201);
    }

    public function addressUpdate(StoreAddress $request,$id)
    {
        $user = auth()->user();

        $address = Address::findOrFail($id);

        if ($address->user_id != $user->id){
            abort(401,'This address does not belongs to you');
        }

        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->address = $request->address;
        $address->app_address = $request->app_address;
        $address->city = $request->city;
        $address->region = $request->region;
        $address->country = $request->country;
        $address->zipcode = $request->zipcode;

        $address->save();

        return response(['message' => 'Address updated'], 201);
    }

    public function order()
    {
        $user = auth()->user();

        $orders = $user->orders()->where('error',null)->get();

        return new OrdersResponse($orders);
    }

    public function fedexStatus($id)
    {
        $user = auth()->user();

        $order = Order::findOrFail($id);

        abort_if($order->user_id != $user->id,402,'Order not belongs to user');

        $status = $order->tracking_info();

        if ($status == null)
        {
            return response(['message' => 'Unable to track the order'], 422);
        }

        return response(['fedex_status' => $status], 200);
    }

    public function orderProducts($id)
    {
        $user = auth()->user();

        $order = Order::findOrFail($id);

        $products = $order->products;
        return new OrderProductsResponse($products);
    }

}
