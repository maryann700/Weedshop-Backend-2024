<?php

ob_end_clean(); 
ignore_user_abort();
ob_start();
header("Connection: close");
//header("Content-Length: " . ob_get_length());
ob_end_flush();
//flush();

 
include(__DIR__ . "/../system/config.inc.php");
function send_request($order_id,$store_id) {
    global $db;
    
    $db->where("id",$order_id);         
    $order = $db->getOne("orders"); 

    $assigned = 0;    
    if($order['sent_request']=='yes' || $order['driver_id']!='0' || $order['status']!='Pending') {
        $assigned = 1;
        $db->where('order_id', $order_id);
        $db->delete('driver_request');        
    }
    
    $arr_driver = array();
    $db->where("order_id",$order_id);
    $arr_driver1 = $db->get("driver_request");    
    for($j=0;$j<count($arr_driver1);$j++)
        $arr_driver[]=$arr_driver1[$j]['driver_id'];
    
    $db->where('status','Inprocess');    
    $arr_driver2 = $db->get("orders",null,"driver_id");    
    for($j=0;$j<count($arr_driver2);$j++)
        $arr_driver[]=$arr_driver2[$j]['driver_id'];
    
    
    $store_lat_lng = getStoreLatLng($store_id);
    $lat = $store_lat_lng[0]['latitude'];
    $lng = $store_lat_lng[0]['longitude'];
    $dist = ",( 6371 * acos( cos( radians({$lat}) ) * cos( radians( dl.`latitude` ) ) * cos( radians( dl.`longitude` ) - radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( dl.`latitude` ) ) ) ) AS distance";    
    $db->join("driver_location dl","d.id=dl.driver_id","LEFT");
    if(!empty($arr_driver))
        $db->where("d.id",$arr_driver,"NOT IN");  
    $db->where("dl.latitude","","!=");
    $db->where("dl.longitude","","!=");
    $db->where("d.status","Active");
    $db->where("d.adminApproved","Approved");
    $db->orderBy ("distance","asc");     
    $drivers = $db->get("driver d",array(0,MAXREQUEST),"d.id".$dist);    
    //echo '<pre>'; prin_r($drivers);
//    exit;    
    if($db->count > 0 && $assigned == 0) {       
        for($i=0;$i<count($drivers);$i++) {
            $data[]=array(
                'driver_id' => $drivers[$i]['id'],
                'order_id' => $order_id,
                'status' => 'Pending'
            );
            $narr['driver_id'] = $drivers[$i]['id'];
            $narr['text'] = "New order available! Click to accept the job.";
            drivernotification($narr);
        }
        $ids = $db->insertMulti('driver_request', $data);
        
        sleep(REQUESTTIMEOUT);
        send_request($order_id,$store_id);
    }    
    $upd_data = array(
        'sent_request' => 'yes'
    );
    $db->where("id",$order_id);
    $db->update("orders",$upd_data);
    
    $db->where("order_id",$order_id);
    $db->delete("driver_request");
}
if(!isset($_REQUEST["order_id"]) || empty($_REQUEST["order_id"])) {
   return true;
   exit;
} else if(!isset($_REQUEST["store_id"]) || empty($_REQUEST["store_id"])) {
   return true;
   exit;
} else {       
   send_request($_REQUEST["order_id"],$_REQUEST["store_id"]); 
}


