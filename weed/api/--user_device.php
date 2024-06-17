<?php

include(__DIR__ . "/../system/config.inc.php");

//get delivery charges
$db->where ("status", "Active");     
$db->orderBy("min_distance","asc");
$fees = $db->get ("delivery_fees");
if ($db->count <= 0) {          
    $fees = array();
}

if(empty($_SERVER['HTTP_APPKEY'])) {
    $result = array("response"=>"false","msg"=>"Please provide api key.","data"=>array());
} else if($_SERVER['HTTP_APPKEY'] != APPKEY) {
    $result = array("response"=>"false","msg"=>"Please provide valid api key.","data"=>array());
} else if(!isset($_POST["user_id"]) || empty($_POST["user_id"])) {
    $result = array("response"=>"false","msg"=>"Please provide user id.","data"=>$fees);
} else if(!isset($_POST["uniqueid"]) || empty($_POST["uniqueid"])) {
    $result = array("response"=>"false","msg"=>"Please provide unique id.","data"=>$fees);
} else if(!isset($_POST["token"]) || empty($_POST["token"])) {
    $result = array("response"=>"false","msg"=>"Please provide device token.","data"=>$fees);
} else if(!isset($_POST["device_type"]) || empty($_POST["device_type"])) {
    $result = array("response"=>"false","msg"=>"Please provide device type.","data"=>$fees);
} else {
    $user_id = trim($_POST["user_id"]);
    $uniqueid = trim($_POST["uniqueid"]);
   // $status = trim($_POST["status"]);
    
    $token = trim($_POST["token"]);
    $device_type = trim($_POST["device_type"]);
   
    $date = date('Y-m-d H:i:s');

   /* ----------status deleted response-----------*/
   // echo "in";die;
    // $user_status=$db->get("user",array(0,1),'status');
    // $status= $db->where("status",$status);
    // print_r(  $status);
    // exit;
   


   /*-----------end status deleted------------*/
    
    $db->where("user_id",$user_id);
    $db->where("uniqueid",$uniqueid);
    $db->get("user_device",array(0,1),'id');
    if($db->count > 0 ) {
        $data = array(
            'device_token' => $token,
            'device_type' => $device_type,
            'modified_date' => $date
        );
        $db->where('user_id',$user_id);
        $db->where('uniqueid',$uniqueid);
        $db->update("user_device",$data);   
        $result = array("response"=>"true","msg"=>"User device updated successfully!","data"=>$fees,"user_status"=>$status);  
    } else {
        $data = array(
            'user_id' => $user_id,
            'uniqueid' => $uniqueid,
            'device_token' => $token,
            'device_type' => $device_type,
            'created_date' => $date,
            'modified_date' => $date
        );
        $id = $db->insert ("user_device",$data);        
        $result = array("response"=>"true","msg"=>"User device inserted successfully!","data"=>$fees,"user_status"=>$status);  
    }    
}

echo sendResponse($result);
exit;
