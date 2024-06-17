<?php 
checkAdminLogin();

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "adminaction") {    
    if($_REQUEST['adminApproved'] == "Approved") {
        if($_REQUEST['identy_id']!="") {
            $data = array(
                'adminApproved' => $_REQUEST['adminApproved'],
                'identification_id' => $_REQUEST['identy_id'],
                'adminRejectReason' => ""
            );        
            $db->where("id",$_REQUEST['id']);
            $db->update ('driver',$data);
            // send notification
            $arr['driver_id'] = $_REQUEST['id'];
            $arr['text'] = "Your account has been approved!";
            drivernotification($arr);
            
            setSuccessMessage("Driver approved successfully.");
            header("location:drivers.php");
            die();
        } else {
            setErrorMessage("Error! Admin approved action failed, please enter identification number for approve.");
            header("location:drivers.php");
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
            $db->update ('driver',$data);
            setSuccessMessage("Driver rejected successfully.");
            header("location:drivers.php");
            die();
        } else {
            setErrorMessage("Error! Admin approved action failed, please select reason for reject.");
            header("location:drivers.php");
            die();
        }       
    }    
}