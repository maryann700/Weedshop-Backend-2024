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
    $driver_id = $_POST["driver_id"];
    $order_id = $_POST["order_id"];
    $action = $_POST["action"];
    
    if($action=="delivered") {        
        $data = array("status"=>"Completed", "collect_payment"=>"yes", "end_time"=>date('Y-m-d H:i:s'));
        $db->where("id",$order_id);
        $db->where("driver_id",$driver_id);
        $db->where("status","Inprocess");        
        if($db->update("orders",$data)) {
            $db->join("driver d","o.driver_id=d.id","LEFT");
            $db->where("o.id",$order_id);
            $order = $db->get ("orders o",array(0,1),'o.id,o.order_code,o.user_id,o.driver_id,o.store_id,d.name as driver_name');
            $narr['user_id'] = $order[0]['user_id'];
            $narr['text'] = "Your order delivered successfully by ".$order[0]['driver_name'];
            usernotification($narr);
            $result = array("response"=>"true","msg"=>"Your request delivered order successfully!","data"=>array());         
        } else {
            $result = array("response"=>"false","msg"=>"Your request failed for delivered order!","data"=>array());         
        }
        
    } else if($action=="pickup") {
        $data = array("pickup"=>"yes");
        $db->where("id",$order_id);
        $db->where("driver_id",$driver_id);                
        if($db->update("orders",$data)) {
            $db->join("driver d","o.driver_id=d.id","LEFT");
            $db->where("o.id",$order_id);
            $order = $db->get ("orders o",array(0,1),'o.id,o.order_code,o.user_id,o.driver_id,o.store_id,d.name as driver_name');
            $narr['user_id'] = $order[0]['user_id'];
            $narr['text'] = "Your order picked up by ".$order[0]['driver_name']."! Order will arrive soon.";
            usernotification($narr);
            $result = array("response"=>"true","msg"=>"Your request pickup order successfully!","data"=>array()); 
        } else {
            $result = array("response"=>"false","msg"=>"Your request failed for pickup order!","data"=>array()); 
        }
        
    } /* else if($action=="payment") {
        $data = array("collect_payment"=>"yes","status"=>"Completed");
        $db->where("id",$order_id);
        $db->where("driver_id",$driver_id);                
        if($db->update("orders",$data)) {
            $result = array("response"=>"true","msg"=>"Your request payment collected successfully!","data"=>array()); 
        } else {
            $result = array("response"=>"false","msg"=>"Your request failed for collect payment!","data"=>array()); 
        }
        
    }*/ else {
        $result = array("response"=>"false","msg"=>"Provide valid action!","data"=>array()); 
    }
}

echo sendResponse($result);
exit;