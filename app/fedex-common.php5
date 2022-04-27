<?php
// Copyright 2009, FedEx Corporation. All rights reserved.

/**
 *  Print SOAP request and response
 */
define('Newline',"<br />");

function printSuccess($client, $response) {
    printReply($client, $response);
}

function printReply($client, $response){
	$highestSeverity=$response->HighestSeverity;
	if($highestSeverity=="SUCCESS"){echo '<h2>The transaction was successful.</h2>';}
	if($highestSeverity=="WARNING"){echo '<h2>The transaction returned a warning.</h2>';}
	if($highestSeverity=="ERROR"){echo '<h2>The transaction returned an Error.</h2>';}
	if($highestSeverity=="FAILURE"){echo '<h2>The transaction returned a Failure.</h2>';}
	echo "\n";
	printNotifications($response -> Notifications);
	printRequestResponse($client, $response);
}

function printRequestResponse($client){
	echo '<h2>Request</h2>' . "\n";
	echo '<pre>' . htmlspecialchars($client->__getLastRequest()). '</pre>';
	echo "\n";

	echo '<h2>Response</h2>'. "\n";
	echo '<pre>' . htmlspecialchars($client->__getLastResponse()). '</pre>';
	echo "\n";
}

/**
 *  Print SOAP Fault
 */
function printFault($exception, $client) {
   echo '<h2>Fault</h2>' . "<br>\n";
   echo "<b>Code:</b>{$exception->faultcode}<br>\n";
   echo "<b>String:</b>{$exception->faultstring}<br>\n";
   writeToLog($client);
   writeToLog($exception);

  echo '<h2>Request</h2>' . "\n";
	echo '<pre>' . htmlspecialchars($client->__getLastRequest()). '</pre>';
	echo "\n";
}

/**
 * SOAP request/response logging to a file
 */
function writeToLog($client){

  /**
	 * __DIR__ refers to the directory path of the library file.
	 * This location is not relative based on Include/Require.
	 */
	if (!$logfile = fopen(__DIR__.'/fedextransactions.log', "a"))
	{
   		error_func("Cannot open " . __DIR__.'/fedextransactions.log' . " file.\n", 0);
   		exit(1);
	}

 	fwrite($logfile, sprintf("\r%s:- %s",date("D M j G:i:s T Y"), $client->__getLastRequest(). "\r\n" . $client->__getLastResponse()."\r\n\r\n"));

}

/**
 * This section provides a convenient place to setup many commonly used variables
 * needed for the php sample code to function.
 */
function getProperty($var){

  if($var == 'key') Return 'h4COCh1313uey2JT';
	if($var == 'password') Return 'YKxjXUpzkbvIulD4KyVkQb1hY';
	if($var == 'parentkey') Return 'Hb1TfWMygUh7bbHP';
	if($var == 'parentpassword') Return 'u0mnYl8d6FRQK5Ot8SyxMXVqq';
	if($var == 'shipaccount') Return '150067600';
	if($var == 'billaccount') Return '150067600';
	if($var == 'dutyaccount') Return '150067600';
	if($var == 'freightaccount') Return '150067600';
	if($var == 'trackaccount') Return '150067600';
	if($var == 'dutiesaccount') Return '150067600';
	if($var == 'importeraccount') Return '150067600';
	if($var == 'brokeraccount') Return '150067600';
	if($var == 'distributionaccount') Return '150067600';
	if($var == 'locationid') Return 'PLBA';
	if($var == 'printlabels') Return true;
	if($var == 'printdocuments') Return true;
	if($var == 'packagecount') Return '4';
	if($var == 'validateaccount') Return 'XXX';
	if($var == 'meter') Return '4004310';

	if($var == 'shiptimestamp') Return mktime(10, 0, 0, date("m"), date("d")+1, date("Y"));

	if($var == 'spodshipdate') Return '2018-05-08';
	if($var == 'serviceshipdate') Return '2018-05-07';
  if($var == 'shipdate') Return '2018-05-08';

	if($var == 'readydate') Return '2014-12-15T08:44:07';
	//if($var == 'closedate') Return date("Y-m-d");
	if($var == 'closedate') Return '2016-04-18';
	if($var == 'pickupdate') Return date("Y-m-d", mktime(8, 0, 0, date("m")  , date("d")+1, date("Y")));
	if($var == 'pickuptimestamp') Return mktime(8, 0, 0, date("m")  , date("d")+1, date("Y"));
	if($var == 'pickuplocationid') Return 'SQLA';
	if($var == 'pickupconfirmationnumber') Return '1';

	if($var == 'dispatchdate') Return date("Y-m-d", mktime(8, 0, 0, date("m")  , date("d")+1, date("Y")));
	if($var == 'dispatchlocationid') Return 'NQAA';
	if($var == 'dispatchconfirmationnumber') Return '4';

	if($var == 'tag_readytimestamp') Return mktime(10, 0, 0, date("m"), date("d")+1, date("Y"));
	if($var == 'tag_latesttimestamp') Return mktime(20, 0, 0, date("m"), date("d")+1, date("Y"));

	if($var == 'expirationdate') Return date("Y-m-d", mktime(8, 0, 0, date("m"), date("d")+15, date("Y")));
	if($var == 'begindate') Return '2014-10-16';
	if($var == 'enddate') Return '2014-10-16';

	if($var == 'trackingnumber') Return 'XXX';

	if($var == 'hubid') Return '5531';

	if($var == 'jobid') Return 'XXX';

	if($var == 'searchlocationphonenumber') Return '5555555555';
	if($var == 'customerreference') Return '39589';

	if($var == 'shipper') Return array(
		'Contact' => array(
			'PersonName' => 'Sender Name',
			'CompanyName' => 'Sender Company Name',
			'PhoneNumber' => '1234567890'
		),
		'Address' => array(
			'StreetLines' => array('Addres \r  s Line 1'),
			'City' => 'Collierville',
			'StateOrProvinceCode' => 'TN',
			'PostalCode' => '38017',
			'CountryCode' => 'US',
			'Residential' => 1
		)
	);
	if($var == 'recipient') Return array(
		'Contact' => array(
			'PersonName' => 'Recipient Name',
			'CompanyName' => 'Recipient Company Name',
			'PhoneNumber' => '1234567890'
		),
		'Address' => array(
			'StreetLines' => array('Address Line 1'),
			'City' => 'Herndon',
			'StateOrProvinceCode' => 'VA',
			'PostalCode' => '20171',
			'CountryCode' => 'US',
			'Residential' => 1
		)
	);

	if($var == 'address1') Return array(
		'PostalCode' => '10001',
		'CountryCode' => 'US'
    );
	if($var == 'address2') Return array(
        'City' => 'Houston',
		'PostalCode' => '20171',
		'CountryCode' => 'US'
	);
	if($var == 'searchlocationsaddress') Return array(
		'StreetLines'=> array('240 Central Park S'),
		'City'=>'Austin',
		'StateOrProvinceCode'=>'TX',
		'PostalCode'=>'78701',
		'CountryCode'=>'US'
	);

	if($var == 'shippingchargespayment') Return array(
		'PaymentType' => 'SENDER',
		'Payor' => array(
			'ResponsibleParty' => array(
				'AccountNumber' => getProperty('billaccount'),
				'Contact' => null,
				'Address' => array('CountryCode' => 'US')
			)
		)
	);
	if($var == 'freightbilling') Return array(
		'Contact'=>array(
			'ContactId' => 'freight1',
			'PersonName' => 'Big Shipper',
			'Title' => 'Manager',
			'CompanyName' => 'Freight Shipper Co',
			'PhoneNumber' => '1234567890'
		),
		'Address'=>array(
			'StreetLines'=>array(
				'1202 Chalet Ln',
				'Do Not Delete - Test Account'
			),
			'City' =>'Harrison',
			'StateOrProvinceCode' => 'AR',
			'PostalCode' => '72601-6353',
			'CountryCode' => 'US'
			)
	);
}

function setEndpoint($var){
	if($var == 'changeEndpoint') Return true;
	if($var == 'endpoint') Return 'https://wsbeta.fedex.com:443/web-services/dgds';
}

function printNotifications($notes){
	foreach($notes as $noteKey => $note){
		if(is_string($note)){
            echo $noteKey . ': ' . $note . Newline;
        }
        else{
        	printNotifications($note);
        }
	}
	echo Newline;
}

function printError($client, $response){
    printReply($client, $response);
}

function trackDetails($details, $spacer){
	foreach($details as $key => $value){
		if(is_array($value) || is_object($value)){
        	$newSpacer = $spacer. '&nbsp;&nbsp;&nbsp;&nbsp;';
    		echo '<tr><td>'. $spacer . $key.'</td><td>&nbsp;</td></tr>';
    		trackDetails($value, $newSpacer);
    	}elseif(empty($value)){
    		echo '<tr><td>'.$spacer. $key .'</td><td>'.$value.'</td></tr>';
    	}else{
    		echo '<tr><td>'.$spacer. $key .'</td><td>'.$value.'</td></tr>';
    	}
    }
}
?>
