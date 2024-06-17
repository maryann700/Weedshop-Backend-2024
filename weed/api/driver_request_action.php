<?php

include(__DIR__ . "/../system/config.inc.php");

if(empty($_SERVER['HTTP_APPKEY'])) {
    $result = array("response"=>"false","msg"=>"Please provide api key.","data"=>array());
} else if($_SERVER['HTTP_APPKEY'] != APPKEY) {
    $result = array("response"=>"false","msg"=>"Please provide valid api key.","data"=>array());
} else if(!isset($_POST["driver_id"]) || empty($_POST["driver_id"])) {
    $result = array("response"=>"false","msg"=>"Please provide driver id.","data"=>array());
} else if(!isset($_POST["order_id"]) || empty($_POST["order_id"])) {
    $result = array("response"=>"false","msg"=>"Please provide order id.","data"=>array());
} else if(!isset($_POST["action"]) || empty($_POST["action"])) {
    $result = array("response"=>"false","msg"=>"Please provide action.","data"=>array());
} else {
    $driver_id = trim($_POST["driver_id"]);
    $order_id = trim($_POST["order_id"]);
    $action = trim($_POST["action"]);
    
    if($action=="accept") {
        $db->where("id",$order_id);
        $db->where("driver_id",0);
        $db->get("orders",array(0,1),"id");
        if($db->count > 0) {
            $data = array("driver_id" => $driver_id,"status"=>"Inprocess","start_time"=>date('Y-m-d H:i:s'));
            $db->where("id",$order_id);
            $db->update("orders",$data);
            
            $data1 = array("status"=>"Accept");
            $db->where("driver_id",$driver_id);
            $db->where("order_id",$order_id);
            $db->update("driver_request",$data1);
            
//            $db->where("order_id",$order_id);
//            $db->delete("driver_request");

            $orequest = getDriverOrderRequest($order_id);
            $narr['user_id'] = $orequest[0]['user_id'];
            $narr['text'] = "Your order assigned to ".$orequest[0]['driver_name']."! Order Will arrive soon.";
            usernotification($narr); 
            
            $result = array("response"=>"true","msg"=>"Your request accepted successfully!","data"=>$orequest); 
        } else {
           $result = array("response"=>"false","msg"=>"Your request canceled because order accepted by another driver!","data"=>array()); 
        }
    } else {
        $data1 = array("status"=>"Decline");
        $db->where("driver_id",$driver_id);
        $db->where("order_id",$order_id);
        $db->update("driver_request",$data1);
        $result = array("response"=>"true","msg"=>"Your request declined successfully!","data"=>$orequest); 
    }
    
   
}

echo sendResponse($result);
exit;