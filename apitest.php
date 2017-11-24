<?php
define('BASEURL','http://mage2.clean/');
$token = '';
$apiUser = 'apicustomer'; 
$apiPass = 'admin123';
ini_set("soap.wsdl_cache_enabled", 0);
ini_set('display_errors', 1);
$params  = array('username' => $apiUser, 'password' => $apiPass);
$request = new SoapClient(BASEURL.'soap/default?wsdl&services=integrationAdminTokenServiceV1',array('soap_version' => SOAP_1_2,
		 'proxy_host'     => "localhost",'proxy_port'     => 8888,
		'cache_wsdl' => WSDL_CACHE_NONE
));
$request->__setCookie('XDEBUG_SESSION', 'PHPSTORM');
$result = $request->integrationAdminTokenServiceV1CreateAdminAccessToken($params); 
if(isset($result->result)){
	$token = $result->result;
}
$opts = array(
            'http'=>array(
                'header' => 'Authorization: Bearer '.$token
            )
        );		
// getting products
/*

$wsdlUrl = BASEURL.'index.php/soap/default?wsdl&services=opencGCApiGcapiapiStockV1';
$context = stream_context_create($opts);
	try {
		$request = new SoapClient($wsdlUrl, ['version' => SOAP_1_2, 'context' => $context
		, 'proxy_host'     => "localhost",'proxy_port'     => 8888

		]);
		} catch(Exception $e){
		var_dump($e);
	}
	
$result = $request->opencGCApiGcapiapiStockV1List(array('products' => array(1,2)));
echo '<pre>';
print_r($result); 
*/
// update products stock
$wsdlUrl = BASEURL.'index.php/soap/default?&wsdl&services=opencGCApiGcapiapiStockV1';
$context = stream_context_create($opts);
	try {
		$request = new SoapClient($wsdlUrl, ['version' => SOAP_1_2, 'context' => $context
		, 'proxy_host'     => "localhost", 'proxy_port'     => 8888

		]);
		} catch(Exception $e){
		var_dump($e);
	}
	$request->__setCookie('XDEBUG_SESSION', 'PHPSTORM');

$result = $request->opencGCApiGcapiapiStockV1Update((object) array('productId' => 1, 
	'data' => (object) array('qty' => 26, 'is_in_stock' => 1, 'manage_stock' =>1, 'use_config_manage_stock' => 1, 'use_config_backorders' => 1, 'backorders' => 1))
	//'data' => 'test')
	);
echo '<pre>';
print_r($result); 

//get products list
// update products
/*
$wsdlUrl = BASEURL.'index.php/soap/default?wsdl&services=opencGCApiGcapiapiProductV1';
$context = stream_context_create($opts);
	try {
		$request = new SoapClient($wsdlUrl, ['version' => SOAP_1_2, 'context' => $context
		, 'proxy_host'     => "localhost", 'proxy_port'     => 8888

		]);
		} catch(Exception $e){
		var_dump($e);
	}
	
$result = $request->opencGCApiGcapiapiProductV1List(array('showEnabled' => 1, 'filters' => NULL, 'store' => NULL));
echo '<pre>';
print_r($result); 

//get product info
$wsdlUrl = BASEURL.'index.php/soap/default?wsdl&services=opencGCApiGcapiapiProductV1';
$context = stream_context_create($opts);
	try {
		$request = new SoapClient($wsdlUrl, ['version' => SOAP_1_2, 'context' => $context
		, 'proxy_host'     => "localhost", 'proxy_port'     => 8888

		]);
		} catch(Exception $e){
		var_dump($e);
	}
	
$result = $request->opencGCApiGcapiapiProductV1Info(array('productId' => 1));
echo '<pre>';
print_r($result); 

$wsdlUrl = BASEURL.'index.php/soap/default?wsdl&services=opencGCApiGcapiapiCartProductV1';
$context = stream_context_create($opts);
	try {
		$request = new SoapClient($wsdlUrl, ['version' => SOAP_1_2, 'context' => $context
		, 'proxy_host'     => "localhost", 'proxy_port'     => 8888

		]);
		} catch(Exception $e){
		var_dump($e);
	}
	
$result = $request->opencGCApiGcapiapiCartProductV1Items(array('quoteId' => 2));
echo '<pre>';
print_r($result); 
*/
/*
$wsdlUrl = BASEURL.'index.php/soap/default?wsdl&services=opencGCApiGcapiapiCartShippingV1';
$context = stream_context_create($opts);
	try {
		$request = new SoapClient($wsdlUrl, ['version' => SOAP_1_2, 'context' => $context
		, 'proxy_host'     => "localhost", 'proxy_port'     => 8888

		]);
		} catch(Exception $e){
		var_dump($e);
	}
	
$result = $request->opencGCApiGcapiapiCartShippingV1List(array('quoteId' => 2));
echo '<pre>';
print_r($result); 
*/