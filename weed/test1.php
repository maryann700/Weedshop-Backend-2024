<?php 
// Dashboard file created by Mehul Sonagara # 17/3/2017
//include('system/config.inc.php');


//$fields = $_SERVER;
$fields = array(
                'order_id' => '12',
    );
    

$curl_options = array(
 CURLOPT_URL => "http://greatlike.org/weed/test.php",
 CURLOPT_POST => 1,
 CURLOPT_POSTFIELDS => http_build_query( $fields ),
 CURLOPT_HTTP_VERSION => 1.0,
 CURLOPT_HEADER => 0,
 CURLOPT_TIMEOUT => 1
 );
 $curl = curl_init();
 curl_setopt_array( $curl, $curl_options );
 $result = curl_exec( $curl );
 print_r($result);
 curl_close( $curl );
echo "I am echoing out since I am not waiting for a result";