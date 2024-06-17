<?php 
checkAdminLogin();

if(isset($_POST['action']) && $_POST['action'] == "profile") {
    validateCSRFToken();    
    $data = Array (
        'name' => $_POST['name'],        
        'phone' => $_POST['phone'],
        'address' => trim($_POST['address'])        
    );
    $db->where ('id', $_SESSION['wadmin']['id']);
    if ($db->update ('admin', $data)) {
        setSuccessMessage("Your profile updated successfully!");
        header("location:profile.php");
        die(); 
    } else {
        setErrorMessage("Update error! Please try again.");
        header("location:profile.php");
        die();
    }    
}

if(isset($_POST['action']) && $_POST['action'] == "change_password") {
    validateCSRFToken();
    $oldpassword=$_POST['o_password'];
    $newpassword=$_POST['password'];
    $cpassword=$_POST['c_password'];
    if(strlen($oldpassword)>0 && strlen($newpassword)>0 && strlen($cpassword)>0){
        $oldpassword = addslashes(trim($oldpassword));
        $md5_oldpassword = md5($oldpassword);
        //$md5_oldpassword = $oldpassword;
        $newpassword = addslashes(trim($newpassword));
        $md5_newpassword = md5($newpassword);
        //$md5_newpassword = $newpassword;
        $cpassword = addslashes(trim($cpassword));
        $md5_cpassword = md5($cpassword);
        //$md5_cpassword = $cpassword;
        $uid = $_SESSION['store']['id'];
        if ($newpassword == $cpassword) {
            $db->where ('id', $_SESSION['wadmin']['id']);
            $db->where ('password', $md5_oldpassword);
            $db->getOne ('admin');
            if($db->count > 0) {
                $data = Array (
                    'password' => $md5_newpassword
                );
                $db->where ('id', $_SESSION['wadmin']['id']); 
                $db->update ('admin', $data);
                setSuccessMessage("Your profile updated successfully!");
                header("location:profile.php");
                die();
            } else {
                setErrorMessage("Error! You have entered old password wrong, try again!");
                header("location:profile.php");
                die();
            }            
        } else {
            setErrorMessage("Error! New password and confirm password should be same!");
            header("location:profile.php");
            die();
        }
        
    } else {        
        setErrorMessage("Please enter value for all fields");
        header("location:profile.php");
        die();
    }
}
//get current user data
$db->where ("id", $_SESSION['wadmin']['id']);
$store = $db->getOne ("admin");
//$store = $db->clean ($store);
$db->where('status',"Active");
$regions = $db->get ("region");
?>