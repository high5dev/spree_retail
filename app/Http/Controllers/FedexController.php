<?php

namespace App\Http\Controllers;

use function PHPUnit\Framework\once;

require __DIR__.'/../../fedex-common.php5';

class FedexController extends Controller
{
    public function index()
    {
//        //The WSDL is not included with the sample code.
//        ////Please include and reference in $path_to_wsdl variable.
//        $path_to_wsdl = __DIR__."/../../wsdl/TrackService_v19.wsdl";
//
//        ini_set("soap.wsdl_cache_enabled", "0");
//
//        $client = new \SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information
//
//        $request['WebAuthenticationDetail'] = array(
//            'ParentCredential' => array(
//                'Key' => getProperty('parentkey'),
//                'Password' => getProperty('parentpassword')
//            ),
//            'UserCredential' => array(
//                'Key' => getProperty('key'),
//                'Password' => getProperty('password')
//            )
//        );
//
//        $request['ClientDetail'] = array(
//            'AccountNumber' => getProperty('shipaccount'),
//            'MeterNumber' => getProperty('meter')
//        );
//        $request['TransactionDetail'] = array('CustomerTransactionId' => '*** Track Request using PHP ***');
//        $request['Version'] = array(
//            'ServiceId' => 'trck',
//            'Major' => '19',
//            'Intermediate' => '0',
//            'Minor' => '0'
//        );
//        $request['SelectionDetails'] = array(
//            'PackageIdentifier' => array(
//                'Type' => 'TRACKING_NUMBER_OR_DOORTAG',
//                'Value' => '449044304137821' // Replace 'XXX' with a valid tracking identifier
//            )
//        );
//
//
//
//        try {
//            if(setEndpoint('changeEndpoint')){
//                $newLocation = $client->__setLocation(setEndpoint('endpoint'));
//            }
//
//            $response = $client ->track($request);
//
//            if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
//                if($response->HighestSeverity != 'SUCCESS'){
//                    echo '<table border="1">';
//                    echo '<tr><th>Track Reply</th><th>&nbsp;</th></tr>';
//                    trackDetails($response->Notifications, '');
//                    echo '</table>';
//                }else{
//                    if ($response->CompletedTrackDetails->HighestSeverity != 'SUCCESS'){
//                        echo '<table border="1">';
//                        echo '<tr><th>Shipment Level Tracking Details</th><th>&nbsp;</th></tr>';
//                        trackDetails($response->CompletedTrackDetails, '');
//                        echo '</table>';
//                    }else{
//                        echo '<table border="1">';
//                        echo '<tr><th>Package Level Tracking Details</th><th>&nbsp;</th></tr>';
//                        trackDetails($response->CompletedTrackDetails->TrackDetails, '');
//                        echo '</table>';
//                    }
//                }
//                printSuccess($client, $response);
//            }else{
//                printError($client, $response);
//            }
//
//            writeToLog($client);    // Write to log file
//        } catch (\SoapFault $exception) {
//            printFault($exception, $client);
//        }
//
//






















        //The WSDL is not included with the sample code.
        ////Please include and reference in $path_to_wsdl variable.
        $path_to_wsdl = __DIR__."/../../wsdl/RateService_v28.wsdl";

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
        $request['ReturnTransitAndCommit'] = true;
        $request['RequestedShipment']['DropoffType'] = 'DROP_BOX'; // valid values REGULAR_PICKUP, REQUEST_COURIER, DROP_BOX, BUSINESS_SERVICE_CENTER...
        $request['RequestedShipment']['ShipTimestamp'] = date('c');
        // Service Type and Packaging Type are not passed in the request
        $request['RequestedShipment']['Shipper'] = array(
            'Address'=>getProperty('address1')
        );
        $request['RequestedShipment']['Recipient'] = array(
            'Address'=>getProperty('address2')
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
        $request['RequestedShipment']['PackageCount'] = '1';
        $request['RequestedShipment']['RequestedPackageLineItems'] = array(
            '0' => array(
                'SequenceNumber' => 1,
                'GroupPackageCount' => 1,
                'Weight' => array(
                    'Value' => 150.0,
                    'Units' => 'LB'
                ),
                'Dimensions' => array(
                    'Length' => 30,
                    'Width' => 30,
                    'Height' => 30,
                    'Units' => 'IN'
                )
            )
        );



        try {
            if(setEndpoint('changeEndpoint')){
                $newLocation = $client->__setLocation(setEndpoint('endpoint'));
            }

            $response = $client ->getRates($request);

            if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
                echo 'Rates for following service type(s) were returned.'. Newline. Newline;
                echo '<table border="1">';
                echo '<tr><td>Service Type</td><td>Amount</td><td>Delivery Date</td>';
                //dd($response -> RateReplyDetails);
                if(is_array($response -> RateReplyDetails)){
                    foreach ($response -> RateReplyDetails as $rateReply){
                        $this->printRateReplyDetails($rateReply);
                    }
                }else{
                    $this->printRateReplyDetails($response -> RateReplyDetails);
                }
                echo '</table>'. Newline;
                printSuccess($client, $response);
            }else{
                printError($client, $response);
            }

            //writeToLog($client);    // Write to log file
        } catch (SoapFault $exception) {
            printFault($exception, $client);
        }
    }
    function printRateReplyDetails($rateReply){
        echo '<tr>';
        $serviceType = '<td>'.$rateReply -> ServiceType . '</td>';
        if($rateReply->RatedShipmentDetails && is_array($rateReply->RatedShipmentDetails)){
            $amount = '<td>$' . number_format($rateReply->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",") . '</td>';
        }elseif($rateReply->RatedShipmentDetails && ! is_array($rateReply->RatedShipmentDetails)){
            $amount = '<td>$' . number_format($rateReply->RatedShipmentDetails->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",") . '</td>';
        }
        if(property_exists($rateReply, 'DeliveryTimestamp') && isset($rateReply->DeliveryTimestamp)){
            $deliveryDate= '<td>' . $rateReply->DeliveryTimestamp . '</td>';
        }else{
            $deliveryDate= '<td>' . $rateReply->TransitTime . '</td>';
        }
        echo $serviceType . $amount. $deliveryDate;
        echo '</tr>';
    }
}
