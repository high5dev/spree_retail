<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\VendorStripe;
use App\Models\VendorTransfer;
use App\StripeConnect;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function index()
    {
//        //check account balance
//        \Stripe\Stripe::setApiKey('sk_test_51HAVtEHT5fE06PMk51wnREw3fpfg9kW7JfCauYixueSNYBQdFUvYvRvauHyY1h7lNMbwaW1w1Scokzy8gbWwoVQm00G02wCbGA');
//
//        $balance = \Stripe\Balance::retrieve(
//            ['stripe_account' => 'acct_1IgARkQYro4EqFQ0']
//        );
//
//
//        dd($balance);




//        //update to mannual
//        $stripe = new \Stripe\StripeClient(
//            'sk_test_51HAVtEHT5fE06PMk51wnREw3fpfg9kW7JfCauYixueSNYBQdFUvYvRvauHyY1h7lNMbwaW1w1Scokzy8gbWwoVQm00G02wCbGA'
//        );
//        $update = $stripe->accounts->update(
//            'acct_1Ig7UYQZLRZlZxNV',
//            [
//                'settings' => [
//                    'payouts' => [
//                        'schedule' => [
//                            'interval' => 'weekly',
//                            'weekly_anchor' => 'wednesday'
//                        ],
//                    ],
//                ],
//            ]
//        );
//
//        dd($update);
//
//
//        $stripe = new \Stripe\StripeClient(
//            'sk_test_51HAVtEHT5fE06PMk51wnREw3fpfg9kW7JfCauYixueSNYBQdFUvYvRvauHyY1h7lNMbwaW1w1Scokzy8gbWwoVQm00G02wCbGA'
//        );
//        $payouts = $stripe->payouts->create([
//            'amount' => 1100,
//            'currency' => 'usd',
//            'destination' => 'acct_1IfYQ2QdAyQHUZs7',
//        ]);
//
//        dd($payouts);
//
//
//
//
//
//
//
//        $stripe = new \Stripe\StripeClient(
//            config('stripe.private_key')
//        );
//        $account = $stripe->accounts->retrieve(
//            'acct_1Ig7UYQZLRZlZxNV',
//            []
//        );
//
//        dd($account);
//
//
//
//
//        $stripe = new \Stripe\StripeClient(
//            config('stripe.private_key')
//        );
//        $transfer = $stripe->transfers->create([
//            'amount' => 4000,
//            'currency' => 'usd',
//            'destination' => 'acct_1Ig7UYQZLRZlZxNV',
//            'transfer_group' => 'ORDER_95',
//        ]);
//
//        dd($transfer);
        $vendorId = Auth::user()->id;
        $connected = false;
        $VendorStripe = VendorStripe::where( ['vendor_id' => $vendorId] )->first();
        if(  !empty( $VendorStripe ) && isset($VendorStripe->account_id) ){
            //Retrieve account info
            $stripe = new \Stripe\StripeClient(
                config('stripe.private_key')
            );
            $account = $stripe->accounts->retrieve(
                $VendorStripe->account_id,
                []
            );

            \Stripe\Stripe::setApiKey(config('stripe.private_key'));

            $balance = \Stripe\Balance::retrieve(
            ['stripe_account' => 'acct_1IgARkQYro4EqFQ0']
            );


//            //Check if transfer is enabled
//            if ($account->capabilities->transfers == true){
//                $transfers = true;
//            }
//            //Check if payouts are enabled
//            if ($account->payouts_enabled == true){
//                $payouts = true;
//            }

            $connected = true;
            return view('vendor.dashboard.bank.index',compact('connected','account','VendorStripe','balance'));
        }
        return view('vendor.dashboard.bank.index',compact('connected'));


    }

    public function new()
    {
        $vendorId = Auth::user()->id;
        \Stripe\Stripe::setApiKey('sk_test_51HAVtEHT5fE06PMk51wnREw3fpfg9kW7JfCauYixueSNYBQdFUvYvRvauHyY1h7lNMbwaW1w1Scokzy8gbWwoVQm00G02wCbGA');
        $account = \Stripe\Account::create([
            'type' => 'express',
            'settings' => ['payouts' => ['schedule' => ['interval' => 'weekly','weekly_anchor' => 'wednesday']]]
        ]);
        session(['account_id' => $account->id]);
        $origin = "http://127.0.0.1:8000/vendor/dashboard/bank";
        $account_id = $account->id;
        $account_link_url = \Stripe\AccountLink::create([
            'type' => 'account_onboarding',
            'account' => $account_id,
            'refresh_url' => "{$origin}/onboard-user",
            'return_url' => "{$origin}/stripe-connected?vendor_id={$vendorId}&account_id={$account_id}"
        ]);
        echo json_encode(array('url' => $account_link_url));
        exit;
    }

    public function stripeConnected(Request $request)
    {

        $item = VendorStripe::firstOrNew(array('vendor_id' => $request->input('vendor_id')));
        $account_id = $request->input('account_id');

        if ($account_id && $account_id != "") {
            $item->account_id = $account_id;
            $item->status = 'Active';
            $item->save();
            return redirect("/vendor/dashboard/bank")->with("popup_success", "Stripe connected with your account successfully.");
        } else {
            return redirect("/vendor/dashboard/bank")->with("popup_success", "Can't connect stripe at the moment, please try again.");
        }
    }

    public function transfers()
    {
        $transfers = VendorTransfer::where('vendor_id',auth()->user()->id)->get();


        return view('vendor.dashboard.bank.transfer',compact('transfers'));
    }
}
