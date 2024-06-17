<?php 
checkStoreLogin();

if(isset($_POST['action']) && $_POST['action'] == "profile") {
    validateCSRFToken();    
    $data = Array (
        'name' => $_POST['name'],
        'description' => trim($_POST['description']),
        'owner' => $_POST['owner'],
        'phone' => $_POST['phone'],
        'address' => trim($_POST['address']),
        'region' => $_POST['region'],
        'zipcode' => $_POST['zipcode'],
        'latitude' => $_POST['latitude'] ,
        'longitude' => $_POST['longitude']
    );
    $db->where ('id', $_SESSION['store']['id']);
    if ($db->update ('store', $data)) {
        setSuccessMessage("Your profile updated successfully!");
        header("location:profile.php");
        die(); 
    } else {
        setErrorMessage("Update error! Please try again.");
        header("location:profile.php");
        die();
    }    
}
if(isset($_POST['action']) && $_POST['action'] == "logoimage") {
    validateCSRFToken();      
    #echo "<pre>"; print_r($_FILES); exit;
    $valid_formats = array("jpg","jpeg","png");
    $success = 0;
    if($_FILES['image']['name'] !='') {
        $img_name = "";
        $store_id = $_SESSION['store']['id'];
        $ext = getExtension($_FILES['image']['name']);
        if(in_array(strtolower($ext),$valid_formats)){
            //if($_FILES['image']['size']<(1024*300)){
            $img_name = time()."img_".$store_id.".".$ext;            
            $tmp = $_FILES['image']['tmp_name'];                        
            if(move_uploaded_file($tmp, $profile_img_path.$img_name)){
                //remove old image
                $db->where ('id', $store_id);
                $results = $db->getOne ('store');
                if($results['image'])
                    unlink($profile_img_path.$results['image']);
                //update image field in db
                $data = Array (
                    'image' => $img_name
                );
                $db->where ('id', $store_id);
                $db->update ('store', $data);  
                $success = 1;
            } else {
                setErrorMessage("Upload error! Please try again!");
                header("location:profile.php");
                die(); 
            }                
            //} else { }
        } else {
            setErrorMessage("Upload error! Image extension not allowed.");
            header("location:profile.php");
            die();
        }       
    }
    
    if($_FILES['logo']['name'] != '') {
        $img_name = "";
        $store_id = $_SESSION['store']['id'];
        $ext = getExtension($_FILES['logo']['name']);
        if(in_array(strtolower($ext),$valid_formats)){
            //if($_FILES['image']['size']<(1024*300)){
            $img_name = time()."logo_".$store_id.".".$ext;            
            $tmp = $_FILES['logo']['tmp_name'];                        
            if(move_uploaded_file($tmp, $profile_img_path.$img_name)){
                //remove old image
                $db->where ('id', $store_id);
                $results = $db->getOne ('store');
                if($results['logo'])
                    unlink($profile_img_path.$results['logo']);
                //update logo field in db
                $data = Array (
                    'logo' => $img_name
                );
                $db->where ('id', $store_id);
                $db->update ('store', $data);  
                $success = 1;
            } else {
                setErrorMessage("Upload error! Please try again!");
                header("location:profile.php");
                die(); 
            }                
            //} else { }
        } else {
            setErrorMessage("Upload error! Image extension not allowed.");
            header("location:profile.php");
            die();
        } 
    }
    if($success) {
        setSuccessMessage("Your profile image updated successfully!");
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
            $db->where ('id', $_SESSION['store']['id']);
            $db->where ('password', $md5_oldpassword);
            $db->getOne ('store');
            if($db->count > 0) {
                $data = Array (
                    'password' => $md5_newpassword
                );
                $db->where ('id', $_SESSION['store']['id']); 
                $db->update ('store', $data);
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
$db->where ("id", $_SESSION['store']['id']);
$store = $db->getOne ("store");
//$store = $db->clean ($store);
$db->where('status',"Active");
$regions = $db->get ("region");
?>