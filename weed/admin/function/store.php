<?php 
checkAdminLogin();

if(isset($_POST['action']) && $_POST['action'] == "addeditstore" && $_POST['id'] != "") {
    validateCSRFToken();
    #echo "<pre>"; print_r($_POST); exit;
    $id = $_POST['id'];
    
    
    if(isset($_POST['delete']) && $_POST['delete'] == "delete") {        
        $db->where ('id', $id);
        $results = $db->getOne ('store',null,"image,logo");
        if($results['image'])
            unlink(STORE_PROFILE_IMG_PATH.$results['image']);
        if($results['logo'])
            unlink(STORE_PROFILE_IMG_PATH.$results['logo']);
        
        $data['status'] = 'Deleted';
        $data['image'] = '';
        $data['logo'] = '';
        $db->where ('id', $id);
        $db->update ('store', $data);
        
        setSuccessMessage("Store deleted successfully!");
        header("location:store.php");
        die();
    }
    
    $data = Array (
	'name' => $_POST['store']['name'],
        'owner' => $_POST['store']['owner'],
        'email' => $_POST['store']['email'],        
        'description' => $_POST['store']['description'],
        'phone' => $_POST['store']['phone'],
        'address' => $_POST['store']['address'],
        'region' => $_POST['store']['region'],
        'zipcode' => $_POST['store']['zipcode'],
        'latitude' => $_POST['store']['latitude'],
        'longitude' => $_POST['store']['longitude'],
        'status' => $_POST['store']['status']
    );    
    
    if($id == "add") {
        //check duplicate email for store
        $db->where ("email", $_POST['store']['email']); 
        $db->where ("status", 'Deleted', "!=");         
        $chkstore = $db->getOne ("store");
        if($db->count > 0) {            
            setErrorMessage("Error! email already exist, please try agin!");
            header("location:store_edit.php?id=".$id);
            die(); 
        }
        
        //check password cofirm password
        if($_POST['store']['password'] != $_POST['store']['cpassword']) {
            setErrorMessage("Error! password and confirm password should be same, please try agin!");
            header("location:store_edit.php?id=".$id);
            die();
        }
        
        //insert store
        $data['password'] = md5($_POST['store']['password']);
        $data['created_date'] = date('Y-m-d H:i:s');            
        $id = $db->insert ('store', $data);   
        //send email to store for registraion by admin
        $body = '<p>Hello {#name#},</p><p>Your store regisration successuflly by admin.</p><p>Below is your login detail:</p><p>Login Url: {#url#}<br>Email : {#email#}<br>Password: {#pass#}</p><br><br>';    
        $body = str_replace('{#name#}', $_POST['store']['name'], $body);    
        $body = str_replace('{#url#}', $storeurl, $body);
        $body = str_replace('{#email#}', $_POST['store']['email'], $body);
        $body = str_replace('{#pass#}', $_POST['store']['password'], $body);
        $subject = "Your Store Registration - Weed High5";  
        send_mail($_POST['store']['email'], $subject, $body);
        
        //upload image
        if($_FILES['image']['name'] !='') {
            $up_result = uploadImage($_FILES['image']['name'],$_FILES['image']['tmp_name'],STORE_PROFILE_IMG_PATH);
            if($up_result['uploaded']) {
                $data = Array (
                    'image' => $up_result['uploaded_name']
                );
                $db->where ('id', $id);
                $db->update ('store', $data);
            }              
        }      
        //upload logo
        if($_FILES['logo']['name'] !='') {
            $up_result = uploadImage($_FILES['logo']['name'],$_FILES['logo']['tmp_name'],STORE_PROFILE_IMG_PATH);
            if($up_result['uploaded']) {
                $data = Array (
                    'logo' => $up_result['uploaded_name']
                );
                $db->where ('id', $id);
                $db->update ('store', $data);
            }              
        }
        
        setSuccessMessage("Store added successfully!");        
    } else {
        $db->where ("email", $_POST['store']['email']); 
        $db->where ("status", 'Deleted', "!=");
        $db->where ("id", $id, "!=");
        $chkstore = $db->getOne ("store");
        if($db->count > 0) {            
            setErrorMessage("Error! email already exist, please try agin!");
            header("location:store_edit.php?id=".$id);
            die(); 
        }
        
        $db->where ("id", $id);
        $db->update ('store', $data);
                
        
        //upload image
        if($_FILES['image']['name'] !='') {
            $up_result = uploadImage($_FILES['image']['name'],$_FILES['image']['tmp_name'],STORE_PROFILE_IMG_PATH);
            if($up_result['uploaded']) {
                $db->where ('id', $id);
                $results = $db->getOne ('store');
                if($results['image'])
                    unlink(STORE_PROFILE_IMG_PATH.$results['image']);
                //update image field in db
                $data = Array (
                    'image' => $up_result['uploaded_name']
                );
                $db->where ('id', $id);
                $db->update ('store', $data); 
            }
        }
        //upload logo
        if($_FILES['logo']['name'] !='') {
            $up_result = uploadImage($_FILES['logo']['name'],$_FILES['logo']['tmp_name'],STORE_PROFILE_IMG_PATH);
            if($up_result['uploaded']) {
                $db->where ('id', $id);
                $results = $db->getOne ('store');
                if($results['logo'])
                    unlink(STORE_PROFILE_IMG_PATH.$results['logo']);
                //update image field in db
                $data = Array (
                    'logo' => $up_result['uploaded_name']
                );
                $db->where ('id', $id);
                $db->update ('store', $data); 
            }
        }
        
        setSuccessMessage("Store updated successfully!");
    }
    if(isset($_POST['saveedit'])) {            
        header("location:store_edit.php?id=".$id);
        die(); 
    } else {            
        header("location:store.php");
        die(); 
    }    
}

$id = $_GET['id'];
if(isset($id) && $id != "add") {    
    $db->where ("id", $id);
    $store = $db->getOne ("store");    
} else {
    $store = array(
        'name' => '',
        'owner' => '',
        'email' => '',
        'password' => '',
        'description' => '',
        'phone' => '',
        'address' => '',
        'region' => '',
        'zipcode' => '',
        'latitude' => '',
        'longitude' => '',
        'password' => '',
        'cpassword' => '',
        'image' => '',
        'logo' => '',
        'status' => ''
    );
    $id = "add";
}

//get all Attributes
$db->where ("status", 'Active');
$regions = $db->get ("region");

?>