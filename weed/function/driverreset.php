<?php 
//if(!isset($_GET['reset']) && !isset($_SESSION['reset']['id'])){
//	$_SESSION['msg']='expired';
//}

if(isset($_GET['reset']) && $_GET['reset']!=''){            
	$code = json_decode(base64_decode($_GET['reset']),true);
	$token = $code['token'];
	$email = $code['email'];
      
	
        $db->where ("token", $token);    
        $db->where ("email", $email);    
        $user = $db->getOne ("driver"); 	        
	if($db->count <= 0) {
            $_SESSION['msg']='expired';
            header("location:".$siteurl."driverreset.php");	
            die();
	}
	else{
            $_SESSION['dreset']['id']=$user['id'];
            $_SESSION['dreset']['email']=$user['email'];
            $_SESSION['dreset']['token']=$user['token'];
            header("location:".$siteurl."driverreset.php");
            die();
	}
}

if(isset($_POST['action']) && $_POST['action'] == "reset") {
        validateCSRFToken();
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
        
	if($password!=$cpassword){
            $_SESSION['msg']='mismatch';
            header("location:".$siteurl."driverreset.php");	
            die();
	}	
	$password = md5($password);       
	$data = Array (
            'password' => $password,
            'token' => ''
        );
        $db->where ('id', $_SESSION['dreset']['id']);
        $db->where ('email', $_SESSION['dreset']['email']);
        $db->where ('token', $_SESSION['dreset']['token']);
        $db->update ('driver', $data); 	
	unset($_SESSION['dreset']);
	$_SESSION['msg']='reset';
        //setSuccessMessage("Your password reset successfully. Please login in App with you new password");
	header("location:".$siteurl."driverreset.php");
	die();
}
?>