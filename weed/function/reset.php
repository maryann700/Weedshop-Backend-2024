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
        $user = $db->getOne ("user"); 	        
	if($db->count <= 0) {
            $_SESSION['msg']='expired';
            header("location:".$siteurl."reset.php");	
            die();
	}
	else{
            $_SESSION['reset']['id']=$user['id'];
            $_SESSION['reset']['email']=$user['email'];
            $_SESSION['reset']['token']=$user['token'];
            header("location:".$siteurl."reset.php");
            die();
	}
}

if(isset($_POST['action']) && $_POST['action'] == "reset") {
        validateCSRFToken();
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
        
	if($password!=$cpassword){
            $_SESSION['msg']='mismatch';
            header("location:".$siteurl."reset.php");	
            die();
	}	
	$password = md5($password);       
	$data = Array (
            'password' => $password,
            'token' => ''
        );
        $db->where ('id', $_SESSION['reset']['id']);
        $db->where ('email', $_SESSION['reset']['email']);
        $db->where ('token', $_SESSION['reset']['token']);
        $db->update ('user', $data); 	
	unset($_SESSION['reset']);
	$_SESSION['msg']='reset';
        //setSuccessMessage("Your password reset successfully. Please login in App with you new password");
	header("location:".$siteurl."reset.php");
	die();
}
?>