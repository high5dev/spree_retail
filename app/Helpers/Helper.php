<?php
namespace App\Helpers;

use App\Models\Order;
use App\Models\User;
use App\Models\Color;
use App\Models\Size;
use App\Notifications\OrderNotification;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
require __DIR__.'/../fedex-common.php5';
class Helper
{
    public static function fileStore(User $user, $file, $folder)
    {
        try {
            //get file name with extension
            $fileNameWithExt = $file->getClientOriginalName();
            //get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $file->getClientOriginalExtension();
            //file name
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // $folder = base_path().'/public/storage/storage/'.$folder;


            $path = $file->storeAs($folder, $fileNameToStore,'public');
           // $path = Storage::put('storage/'.$folder.'/'.$fileNameToStore, $fileNameToStore );
           //Storage::disk('public')->put($fileNameToStore)

            return $fileNameToStore;
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }

    public static function createSlug($model, $name)
    {
        //Slug Create
        $slug = Str::slug( $name, "-");
        $slug = $slug."-";
        $temp = $model::where('slug','like',"{$slug}%")->orderBy('slug')->get()->last();
        if($temp != null)
        {
            $count = Str::afterLast($temp->slug, '-');
            $count +=1;
        }else{
            $count = 1;
        }
        $slug = $slug."".$count;

        return strtolower($slug);
    }

    public static function presentPrice($price)
    {
        $price = floatval($price)-0.01;
        return $price;
    }

    public static function makeOrderNotification(Order $order)
    {
        $admins = User::whereHas('roles',function ($query){
            $query->where('id',1);
        });

        Notification::send($admins, new OrderNotification(auth()->user(),$order));

    }

    public static function makeNotification($data,$type)
    {
        $url = null;
        if ($type == 'Order'){
            $url = route('admin.dashboard.order.show',$data->id);
            $notification = Notification::create([
                'message' => 'New order Created',
                'model_type' => $type,
                'model_id' => $data->id,
                'url' => $url,
            ]);
        }

    }

    public function validatePostalCode($code){
        $path_to_wsdl = __DIR__."/../wsdl/CountryService_v8.wsdl";

        ini_set("soap.wsdl_cache_enabled", "0");

        $client = new \SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

        $request['WebAuthenticationDetail'] = array(
            'ParentCredential' => array(
                'Key' => getProperty('parentkey'),
                'Password' => getProperty('parentpassword')
            ),
            'UserCredential' => array(
                'Key' => getProperty('key'),
                'Password' => getProperty('password')
            )
        );

        $request['ClientDetail'] = array(
            'AccountNumber' => getProperty('shipaccount'),
            'MeterNumber' => getProperty('meter')
        );
        $request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Validate Postal Code Request using PHP ***');
        $request['Version'] = array(
            'ServiceId' => 'cnty',
            'Major' => '8',
            'Intermediate' => '0',
            'Minor' => '0'
        );

        $request['Address'] = array(
            'PostalCode' => $code,
            'CountryCode' => 'US'
        );

        $request['CarrierCode'] = 'FDXE';


        try {
            if(setEndpoint('changeEndpoint')){
                $newLocation = $client->__setLocation(setEndpoint('endpoint'));
            }

            $response = $client -> validatePostal($request);

            //dd($response->PostalDetail);
            if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
                return true;
            }else{
                return false;
            }

        } catch (\SoapFault $exception) {
            return false;
        }
    }
    

    public function shippingQuote($address)
    {
        try {
            Cart::restore(auth()->user()->id);
            //The WSDL is not included with the sample code.
            ////Please include and reference in $path_to_wsdl variable.
            $path_to_wsdl = __DIR__."/../wsdl/RateService_v28.wsdl";

            ini_set("soap.wsdl_cache_enabled", "0");

            $client = new \SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

            $request['WebAuthenticationDetail'] = array(
                'ParentCredential' => array(
                    'Key' => getProperty('parentkey'),
                    'Password' => getProperty('parentpassword')
                ),
                'UserCredential' => array(
                    'Key' => getProperty('key'),
                    'Password' => getProperty('password')
                )
            );
            $request['ClientDetail'] = array(
                'AccountNumber' => getProperty('shipaccount'),
                'MeterNumber' => getProperty('meter')
            );
            $request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Rate Available Services Request using PHP ***');
            $request['Version'] = array(
                'ServiceId' => 'crs',
                'Major' => '28',
                'Intermediate' => '0',
                'Minor' => '0'
            );
            $a_recipient = array(
                'PostalCode' => $address->zipcode,
                'CountryCode' => 'US'
            );

            $request['ReturnTransitAndCommit'] = true;
            $request['RequestedShipment']['DropoffType'] = 'DROP_BOX'; // valid values REGULAR_PICKUP, REQUEST_COURIER, DROP_BOX, BUSINESS_SERVICE_CENTER...
            $request['RequestedShipment']['ShipTimestamp'] = date('c');
            // Service Type and Packaging Type are not passed in the request
            $request['RequestedShipment']['Shipper'] = array(
                'Address'=>getProperty('address1')
            );
            $request['RequestedShipment']['Recipient'] = array(
                'Address'=>$a_recipient
            );
            $request['RequestedShipment']['ShippingChargesPayment'] = array(
                'PaymentType' => 'SENDER',
                'Payor' => array(
                    'ResponsibleParty' => array(
                        'AccountNumber' => getProperty('billaccount'),
                        'Contact' => null,
                        'Address' => array(
                            'CountryCode' => 'US'
                        )
                    )
                )
            );
            $request['RequestedShipment']['PackageCount'] = Cart::content('default')->count();

            $arr = array();

            $count = 0;
            foreach (Cart::content('default') as $item){
                $arr[$count] = array(
                    'SequenceNumber' => 1,
                    'GroupPackageCount' => 1,
                    'Weight' => array(
                        'Value' => $item->model->weight,
                        'Units' => 'LB'
                    ),
                    'Dimensions' => array(
                        'Length' => $item->model->length,
                        'Width' => $item->model->width,
                        'Height' => $item->model->height,
                        'Units' => 'IN'
                    )
                );
                $count++;
            }

            $request['RequestedShipment']['RequestedPackageLineItems'] = $arr;



            try {
                if(setEndpoint('changeEndpoint')){
                    $newLocation = $client->__setLocation(setEndpoint('endpoint'));
                }

                $response = $client ->getRates($request);

                if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){

                    return  $response -> RateReplyDetails;
                    //dd($response -> RateReplyDetails[0]->RatedShipmentDetails->ShipmentRateDetail->TotalNetChargeWithDutiesAndTaxes->Amount);

                }else{
                    return [];
                }

                //writeToLog($client);    // Write to log file
            } catch (\SoapFault $exception) {
                return [];
            }
        }catch (\Exception $e){
            return [];
        }

    }

    public function trackingOrder($t_id)
    {
        try {
            //The WSDL is not included with the sample code.
            ////Please include and reference in $path_to_wsdl variable.
            //$path_to_wsdl = __DIR__."/../../wsdl/TrackService_v19.wsdl";

            $path_to_wsdl = __DIR__."/../wsdl/TrackService_v19.wsdl";

            ini_set("soap.wsdl_cache_enabled", "0");

            $client = new \SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

            $request['WebAuthenticationDetail'] = array(
                'ParentCredential' => array(
                    'Key' => getProperty('parentkey'),
                    'Password' => getProperty('parentpassword')
                ),
                'UserCredential' => array(
                    'Key' => getProperty('key'),
                    'Password' => getProperty('password')
                )
            );

            $request['ClientDetail'] = array(
                'AccountNumber' => getProperty('shipaccount'),
                'MeterNumber' => getProperty('meter')
            );
            $request['TransactionDetail'] = array('CustomerTransactionId' => '*** Track Request using PHP ***');
            $request['Version'] = array(
                'ServiceId' => 'trck',
                'Major' => '19',
                'Intermediate' => '0',
                'Minor' => '0'
            );
            $request['SelectionDetails'] = array(
                'PackageIdentifier' => array(
                    'Type' => 'TRACKING_NUMBER_OR_DOORTAG',
                    'Value' => $t_id // Replace 'XXX' with a valid tracking identifier
                )
            );



            try {
                if(setEndpoint('changeEndpoint')){
                    $newLocation = $client->__setLocation(setEndpoint('endpoint'));
                }

                $response = $client ->track($request);

                if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
                    return $response;
                }else{
                    return null;
                }
            } catch (\SoapFault $exception) {
                return null;
            }
        }catch (\Exception $e)
        {
            return null;
        }
    }

    public static function getColors(){
        return Color::all();
    }

    public static function getSizes($type){
        return Size::join('type_sizes', 'type_sizes.product_type' , '=', 'sizes.product_type')->select('sizes.*')->where('type_sizes.id', $type)->get(); 
    }


}
