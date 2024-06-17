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
} else if(!isset($_POST["language"]) || empty($_POST["language"])) {
    $result = array("response"=>"false","msg"=>"Please provide language.","data"=>$fees);
}else if(!isset($_POST["device_os"]) || empty($_POST["device_os"])) {
    $result = array("response"=>"false","msg"=>"Please provide device os.","data"=>$fees);
}else if(!isset($_POST["device_model"]) || empty($_POST["device_model"])) {
    $result = array("response"=>"false","msg"=>"Please provide device model.","data"=>$fees);
}else if(!isset($_POST["device_manufacturer"]) || empty($_POST["device_manufacturer"])) {
    $result = array("response"=>"false","msg"=>"Please provide device manufacturer.","data"=>$fees);
}else if(!isset($_POST["app_version"]) || empty($_POST["app_version"])) {
    $result = array("response"=>"false","msg"=>"Please provide app version.","data"=>$fees);
}else if(!isset($_POST["build_version"]) || empty($_POST["build_version"])) {
    $result = array("response"=>"false","msg"=>"Please provide build version.","data"=>$fees);
}else if(!isset($_POST["build_type"]) || empty($_POST["build_type"])) {
    $result = array("response"=>"false","msg"=>"Please provide build type.","data"=>$fees);
}else if(!isset($_POST["app_type"]) || empty($_POST["app_type"])) {
    $result = array("response"=>"false","msg"=>"Please provide device manufacturer.","data"=>$fees);
}
else {
    $user_id = trim($_POST["user_id"]);
    $uniqueid = trim($_POST["uniqueid"]);
    $token = trim($_POST["token"]);
    $device_type = trim($_POST["device_type"]);
    $language = trim($_POST["language"]);
    
    $device_os = trim($_POST["device_os"]);
    $device_model = trim($_POST["device_model"]);
    $device_manufacturer = trim($_POST["device_manufacturer"]);
    $app_version = trim($_POST["app_version"]);
    $build_version = trim($_POST["build_version"]);

    $build_type = trim($_POST["build_type"]);
    $app_type = trim($_POST["app_type"]);
   
   
    $date = date('Y-m-d H:i:s');

   /* ----------status deleted response-----------*/
    
    $status= $db->where("id",$user_id);
    $user_status=$db->getOne("user",'status');

   /*-----------end status deleted------------*/


   /*------------app version----------------*/
  
   $cols = Array ("device_type", "app_type", "build_type","app_version","build_version");

    $users = $db->get ("user_device", null, $cols);
    $arr = array();
    foreach ($users as $key => $value) {
        if($device_type =='ios'){
            $user_status1=$db->where ("device_type",'ios' );
             $status1 = $db->getOne ("app_version");
            $store ='';
         }
        else
         {
             $user_status2=$db->where ("device_type",'Android' );
             $store = $db->getOne ("app_version");
            $status1='';
         }
        //  echo "<pre>";print_r($value);
        // echo "value device_type :-   ".$value['device_type'].'<br/>';
        // echo "device_type  :-   ".$device_type.'<br/>';
        // echo "value app_type  :-   ".$value['app_type'].'<br/>';
        // echo "app_type  :-   ".$app_type.'<br/>';
        // echo "value build_type :-    ".$value['build_type'].'<br/>';
        // echo "build_type  :-   ".$build_type.'<br/>';
        // echo "value app_version  :-   ".$value['app_version'].'=<br/>';
        // echo "app_version :-    ".$app_version.'<br/>';
        // echo "value  build_version  :-   ".$value['build_version'].'<br/>';
        // echo "build_version  :-   ".$build_version.'<br/>';

        //  die;
        if($value['app_version'] <= $app_version && $value['build_version'] <= $build_version){
                $msg="update available";
                $d['msg']=$msg;
                $d['status']=false;
                            
        }
        else{
            $msg="not updated or no version";
            $d['msg']=$msg;
            $d['status']=true;

        }   
  }


   /*------------end app version----------------------------*/
    
    $db->where("user_id",$user_id);
    $db->where("uniqueid",$uniqueid);
    $db->get("user_device",array(0,1),'id');
    if($db->count > 0 ) {
        $data = array(
            'device_token' => $token,
            'device_type' => $device_type,
            'modified_date' => $date,
            'device_type'=>$device_type,
            'language'=>$language,
            'device_os'=>$device_os,
            'device_model'=>$device_model,
            'device_manufacturer'=>$device_manufacturer,
            'app_version'=>$app_version,
            'build_version'=>$build_version,
            'build_type'=>$build_type,
            'app_type'=>$app_type
        );
        $db->where('user_id',$user_id);
        $db->where('uniqueid',$uniqueid);
        $db->update("user_device",$data);   
        $result = array("response"=>"true","msg"=>"Your account has been suspended. You will be logged out of the app.","data"=>$fees,"user_status"=>$user_status,
            "app_version_android"=>$store,"app_version_ios"=>$status1,"app version"=>$d);  
    } else {
        $data = array(
            'user_id' => $user_id,
            'uniqueid' => $uniqueid,
            'device_token' => $token,
            'device_type' => $device_type,
            'created_date' => $date,
            'modified_date' => $date,
            'device_type'=>$device_type,
            'language'=> $language,
            'device_os'=>$device_os,
            'device_model'=>$device_model,
            'device_manufacturer'=>$device_manufacturer,
            'app_version'=>$app_version,
            'build_version'=>$build_version,
            'build_type'=>$build_type,
            'app_type'=>$app_type
        );
        $id = $db->insert ("user_device",$data);        
        $result = array("response"=>"true","msg"=>"User device inserted successfully!","data"=>$fees,"user_status"=>$user_status,"app_version_android"=>$store,"app_version_ios"=>$status1,"update available"=>$d);  
    }    
}

echo sendResponse($result);
exit;
