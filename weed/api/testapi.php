<?php
ob_end_clean(); 
ignore_user_abort();
ob_start();
header("Connection: close");
header("Content-Length: " . ob_get_length());
ob_end_flush();
//flush();

 
include(__DIR__ . "/../system/config.inc.php");
function send_request($order_id,$store_id,$page) {
    global $db;
    
    $db->where("driver_id","0","!=");
    $db->where("status","Pending","!=");
    $db->where("id",$order_id);    
    $order = $db->getOne("orders");    
    $assigned = 0;
    if($db->count > 0) {
        $assigned = 1;
        $db->where('order_id', $order_id);
        $db->delete('driver_request');        
    }
    //$arr_driver = array();
    $db->where("order_id",$order_id);
    $arr_driver = $db->get("driver_request");
    
    
    $store_lat_lng = getStoreLatLng($store_id);
    $lat = $store_lat_lng[0]['latitude'];
    $lng = $store_lat_lng[0]['longitude'];
    $dist = ",( 6371 * acos( cos( radians({$lat}) ) * cos( radians( dl.`latitude` ) ) * cos( radians( dl.`longitude` ) - radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( dl.`latitude` ) ) ) ) AS distance";    
    $db->join("driver_location dl","d.id=dl.driver_id","LEFT");
   // $db->where("d.id",$arr_driver,"NOTIN");
    $db->orderBy("distance","asc");
    $db->pageLimit = MAXREQUEST;
    $drivers = $db->arraybuilder()->paginate("driver d",$page,"d.id,dl.latitude,dl.longitude".$dist);
   # echo $db->getLastQuery();
   # echo '<pre>'; print_r($drivers); exit;
    if($db->count > 0 && $assigned == 0) {
        for($i=0;$i<count($drivers);$i++) {
            $data[]=array(
                'driver_id' => $drivers[$i]['id'],
                'order_id' => $order_id,
                'status' => 'Pending'
            );
        }
        $ids = $db->insertMulti('driver_request', $data);
        $page++;
        sleep(REQUESTTIMEOUT);
        send_request($order_id,$store_id,$page);
    }    
    $upd_data = array(
        'sent_request' => 'yes'
    );
    $db->where("id",$order_id);
    $db->update("orders",$upd_data);
}
if(!isset($_REQUEST["order_id"]) || empty($_REQUEST["order_id"])) {
   return true;
   exit;
} else if(!isset($_REQUEST["store_id"]) || empty($_REQUEST["store_id"])) {
   return true;
   exit;
} else {   
   send_request($_REQUEST["order_id"],$_REQUEST["store_id"],1); 
}


