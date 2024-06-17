<?php 
alreadyLoggedinAdminRedirect();
if(isset($_POST['action']) && $_POST['action'] == "login") {	        
        validateCSRFToken();
	$email = $db->escape ($_POST['email']);
	$password = $db->escape ($_POST['password']);	
        if($email=="" || $password=="") {
            setErrorMessage("Eamail and Password both required");
            header("location:login.php");
            die();
        }
       
        $db->where ("email", $email);
        $db->where ("password", md5($password));
        //$db->where ("password", $password);
        if($db->has("admin")) {            
            $db->where ("email", $email);
            $db->where ("password", md5($password));            
            $user = $db->getOne ("admin");             
            if($user['status'] == 'Inactive') {
                setErrorMessage("Your account is Inactive, please contact administrator!");
                header("location:login.php");
                die();
            }
            $_SESSION['wadmin']['id'] = $user['id'];
            $_SESSION['wadmin']['name'] = $user['name'];
            $_SESSION['wadmin']['image'] = $user['image'];
            $_SESSION['wadmin']['email'] = $user['email'];
            setSuccessMessage("Welcome! You are Logged in successfully.");
            
            //for set cookie for remember
            if(!empty($_POST["remember"])) {
                setcookie ("admin_login",$_POST["email"],time()+ (60*60*24*30));
                setcookie ("admin_password",$_POST["password"],time()+ (60*60*24*30));
            } else {
                if(isset($_COOKIE["admin_login"])) {
                    setcookie ("admin_login","",time() - 3600);
                }
                if(isset($_COOKIE["admin_password"])) {
                    setcookie ("admin_password","",time() - 3600);
                }
            }
            header("location:index.php");
            die(); 
        } else {
            setErrorMessage("Email or Password wrong, Try again!");
            header("location:login.php");
            die();
        }          
}

if(isset($_POST['action']) && $_POST['action'] == "forgot") {
    validateCSRFToken();
    $email = $db->escape ($_POST['email']);
    
    $db->where ("email", $email);    
    $user = $db->getOne ("admin"); 
    if($db->count <= 0) {
        setErrorMessage("Your email is not found! Enter valid email.");
        header("location:login.php");
        die();
    }
    //return if user incactive.
    if($user['status'] == 'Inactive') {
        setErrorMessage("Your account is Inactive please contact administrator.");
        header("location:login.php");
        die();
    }
    $token = generateKey(10);
    //update record with token value
    $data = Array (
	'reset_code' => $token	
    );
    $db->where ('id', $user['id']);
    $db->update ('admin', $data);   
    //send mail with reset link
    $body = '<p>Hello {#name#},</p><p>We have received request to reset your password.</p><p>Please click on the link below to reset your password</p><p><a href="{#link#}">Click here</a></p>';
    $encode = base64_encode(json_encode(array("email" => $email, "token" => $token)));
    $activate_link = $adminurl . "reset/?reset=$encode";
    $body = str_replace('{#name#}', $user['name'], $body);    
    $body = str_replace('{#link#}', $activate_link, $body);
    $subject = "Password reset";
    
    send_mail($email, $subject, $body);
    
    setSuccessMessage("Your password reset link send to your e-mail address.");
    header("location:login.php");
    die();
}

if(!isset($_GET['reset']) && !isset($_SESSION['reset']['id'])){
	$_SESSION['msg']='expired';
}
if(isset($_GET['reset']) && $_GET['reset']!=''){            
	$code = json_decode(base64_decode($_GET['reset']),true);
	$token = $code['token'];
	$email = $code['email'];
	
        $db->where ("reset_code", $token);    
        $db->where ("email", $email);    
        $user = $db->getOne ("admin"); 	        
	if($db->count <= 0) {
            $_SESSION['msg']='expired';
            header("location:".$adminurl."reset.php");	
            die();
	}
	else{
            $_SESSION['wreset']['id']=$user['id'];
            $_SESSION['wreset']['email']=$user['email'];
            $_SESSION['wreset']['reset_code']=$user['reset_code'];
            header("location:".$adminurl."reset.php");
            die();
	}
}

if(isset($_POST['action']) && $_POST['action'] == "reset") {
        validateCSRFToken();
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	
	if($password!=$cpassword){
            $_SESSION['msg']='mismatch';
            header("location:".$adminurl."reset.php");	
            die();
	}	
	$password = md5($password);
        //$password = $password;
	$data = Array (
            'password' => $password,
            'reset_code' => ''
        );
        $db->where ('id', $_SESSION['wreset']['id']);
        $db->where ('email', $_SESSION['wreset']['email']);
        $db->where ('reset_code', $_SESSION['wreset']['reset_code']);
        $db->update ('admin', $data); 	
	unset($_SESSION['reset']);
	$_SESSION['msg']='reset';
        setSuccessMessage("Your password reset successfully.");
	header("location:".$adminurl."login.php");
	die();
}
?>