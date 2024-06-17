<?php

include(__DIR__ . "/../system/config.inc.php");

if(empty($_SERVER['HTTP_APPKEY'])) {
    $result = array("response"=>"false","msg"=>"Please provide api key.","data"=>array());
} else if($_SERVER['HTTP_APPKEY'] != APPKEY) {
    $result = array("response"=>"false","msg"=>"Please provide valid api key.","data"=>array());
} else if(!isset($_POST["email"]) || empty($_POST["email"])) {
    $result = array("response"=>"false","msg"=>"Please provide email.","data"=>array());
} else {
    $email = trim($_POST["email"]);    
    
    $db->where ("email", $email);    
    $user = $db->getOne ("driver");
    if ($db->count > 0) {    
        if($user['status'] == "Active") {
            $token = generateKey(10);
            $data = Array (
                'token' => $token	
            );
            $db->where ('id', $user['id']);
            $db->update ('driver', $data); 
            
            $body = '<p>Hello {#name#},</p><p>We have received request to reset your password.</p><p>Please click on the link below to reset your password</p><p><a href="{#link#}">Click here</a></p>';
            $encode = base64_encode(json_encode(array("email" => $email, "token" => $token)));
            $activate_link = $siteurl . "driverreset.php?reset=$encode";
            $body = str_replace('{#name#}', $user['name'], $body);    
            $body = str_replace('{#link#}', $activate_link, $body);
            $subject = "Password reset";
            #$email = "testineed@gmail.com";
            #echo $body; exit;
            send_mail($email, $subject, $body);
            
            $msg = "Please check your mailbox, we have sent a link to reset your password.";
            $result = array("response"=>"true","msg"=>$msg,"data"=>array());
        } else {
            $msg = "Your account is inactive, please activate your account first.";
            $result = array("response"=>"false","msg"=>$msg,"data"=>array());
        }
        
    } else {
        $result = array("response"=>"false","msg"=>"This email not found in our records, please try again","data"=>array());
    }
}

echo sendResponse($result);
exit;

?>