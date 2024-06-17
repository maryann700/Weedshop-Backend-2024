<?php 
checkAdminLogin();

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "adminaction") {    
    if($_REQUEST['adminApproved'] == "Approved") {
        if($_REQUEST['identy_id']!="") {
            $data = array(
                'adminApproved' => $_REQUEST['adminApproved'],
                'identification_id' => $_REQUEST['identy_id'],
                //'recommendation_id' => $_REQUEST['recomm_id'],
                'adminRejectReason' => ""
            );        
            $db->where("id",$_REQUEST['id']);
            $db->update ('user',$data);
            setSuccessMessage("User approved successfully.");
            /* send notification */
            $arr['user_id'] = $_REQUEST['id'];
            $arr['text'] = "Your account has been approved!";
            usernotification($arr);
            // $token = "30856d99cca28f793921f5c1602d092ae8fb4758c13904d15e56edecd30cee9b";
            // $text = "Your account approved on Weed";
            // $sendcl->ios($token, $text,"100");

            // $token = "fbUz0ZVEJAY:APA91bFp231WS4vWGaMbMhQSYzGkkS8myfBqIbcFA-jApD6REsK0667Honq608dGO4By_5UA0nipWi1Tw6T2Ex3sF-PnKKbWlho5yGtVjecCDrtrOlnqDlUEnljX9RMetOFXd5malk06";
            // $msg =  array("fulltext"=>$text,"type"=>"100");
            // $sendcl->android($token,$msg);
            /* end send noti */
            header("location:users.php");
            die();
        } else {
            setErrorMessage("Error! Admin approved action failed, please enter identification number for approve.");
            header("location:users.php");
            die();
        }
    } else if($_REQUEST['adminApproved'] == "Rejected") {
        $reason = "";
        if(isset($_REQUEST['reason']) && count($_REQUEST['reason'])>0) {
            $reason = implode(",",$_REQUEST['reason']);
            
            $data = array(
                'adminApproved' => $_REQUEST['adminApproved'],
                'adminRejectReason' => "$reason"
            );
            $db->where("id",$_REQUEST['id']);
            $db->update ('user',$data);
            setSuccessMessage("User rejected successfully.");
            header("location:users.php");
            die();
        } else {
            setErrorMessage("Error! Admin approved action failed, please select reason for reject.");
            header("location:users.php");
            die();
        }       
    }    
}