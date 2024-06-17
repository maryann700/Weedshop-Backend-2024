<?php 
checkStoreLogin();

if(isset($_POST['action']) && $_POST['action'] == "addeditproduct" && $_POST['id'] != "") {
    validateCSRFToken();
    #echo "<pre>"; print_r($_POST); exit;
    $id = $_POST['id'];
    //check for product is logged in user or not
    if($id != 'add')
        checkProdctStore($id);
    
    if(isset($_POST['delete']) && $_POST['delete'] == "delete") {        
        $db->where ('id', $id);
        $results = $db->getOne ('products');
        if($results['image'])
            unlink($product_img_path.$results['image']);
        
        $data['status'] = 'Deleted';
        $data['image'] = '';
        $db->where ('id', $id);
        $db->update ('products', $data);
        
        //delte product images
        $db->where ('product_id', $id);
        $imgresults = $db->get ('product_images');
        for($i=0;$i<count($imgresults);$i++)
            unlink($product_img_path.$imgresults[$i]['image']);
        $db->where ('product_id', $id);
        $db->delete('product_images');
        
        //delete attributes
        $db->where ('product_id', $id);
        $db->delete('product_attributes');
        
        setSuccessMessage("Your product deleted successfully!");
        header("location:product.php");
        die();
    }
    
    $data = Array (
	'name' => $_POST['product']['name'],
        'store_id' => $_SESSION['store']['id'],
        'description' => $_POST['product']['description'],
        'category_id' => $_POST['product']['category_id'],
        'type_id' => $_POST['product']['type_id'],
        'price' => $_POST['product']['price'],
        'quantity' => $_POST['product']['quantity'],
        'status' => $_POST['product']['status']
    );    
    $valid_formats = array("jpg","jpeg","png");
    if($id == "add") {
        //insert product
        $data['created_date'] = date('Y-m-d H:i:s');        
        $id = $db->insert ('products', $data);   
        
        //insert attributes
        if(!empty($_POST['attribute'][0]) && count($_POST['attribute'])>0) {
            addAttributes($_POST['attribute'],'product_attributes',$id);
        }
        
        //upload image
        if($_FILES['image']['name'] !='') {
            $up_result = uploadImage($_FILES['image']['name'],$_FILES['image']['tmp_name'],$product_img_path);
            if($up_result['uploaded']) {
                $data = Array (
                    'image' => $up_result['uploaded_name']
                );
                $db->where ('id', $id);
                $db->update ('products', $data);
            } else {
                if($up_result['msg'] == "Error") {
                    setErrorMessage("Upload error! try agin to upload image.");
                } else {
                    setErrorMessage("Upload error! Image extension not allowed.");
                }                
                header("location:product_edit.php?id=".$id);
                die();
            }                
        }
        //upload multiple image         
        if(count($_FILES['files']['name']) > 0) {
            uploadProductImages($_FILES,'files','image','product_images',$product_img_path,$id);
        }
        
        setSuccessMessage("Your product added successfully!");        
    } else {
        $db->where ("id", $id);
        $db->update ('products', $data);
        
        //insert attributes                
        $db->where ('product_id', $id);
        $db->delete('product_attributes');
       // echo (!empty($_POST['attribute'][0]));
       // echo "<pre>"; print_r($_POST['attribute']); exit;
        if(!empty($_POST['attribute'][0]) && count($_POST['attribute'])>0) {
            addAttributes($_POST['attribute'],'product_attributes',$id);
        }
        
        //upload image
        if($_FILES['image']['name'] !='') {
            $up_result = uploadImage($_FILES['image']['name'],$_FILES['image']['tmp_name'],$product_img_path);
            if($up_result['uploaded']) {
                $db->where ('id', $id);
                $results = $db->getOne ('products');
                if($results['image'])
                    unlink($product_img_path.$results['image']);
                //update image field in db
                $data = Array (
                    'image' => $up_result['uploaded_name']
                );
                $db->where ('id', $id);
                $db->update ('products', $data); 
            } else {
                if($up_result['msg'] == "Error") {
                    setErrorMessage("Upload error! try agin to upload image.");
                } else {
                    setErrorMessage("Upload error! Image extension not allowed.");
                }                
                header("location:product_edit.php?id=".$id);
                die();
            }  
        }
        
        //upload product images
        //upload multiple image         
        if(count($_FILES['files']['name']) > 0) {
            uploadProductImages($_FILES,'files','image','product_images',$product_img_path,$id);
        }
        
        setSuccessMessage("Your product updated successfully!");
    }
    if(isset($_POST['saveedit'])) {            
        header("location:product_edit.php?id=".$id);
        die(); 
    } else {            
        header("location:product.php");
        die(); 
    }    
}

$id = $_GET['id'];
if(isset($id) && $id != "add") {
    //check for product is logged in user or not
    checkProdctStore($id);
    $db->where ("id", $id);
    $product = $db->getOne ("products");    
} else {
    $product = array(
        'name' => '',
        'description' => '',
        'category_id' => '',
        'type_id' => '',
        'price' => '',
        'quantity' => '',
        'status' => '',
        'image' => '',
    );
    $id = "add";
}
//get all categories
$db->where ("status", 'Active');
$categories = $db->get ("category");
//get all types
$db->where ("status", 'Active');
$types = $db->get ("type");

//get all Attributes
$db->where ("status", 'Active');
$attributes = $db->get ("attributes");

//get all images of product
$prod_images = array();
$prod_attributes = array();
if($id != 'add') {
    $db->where ("product_id", $id);
    $prod_images = $db->get ("product_images");    
    
    //get all Attributes of product
    $db->where ("product_id", $id);
    $prod_attributes = $db->get ("product_attributes");
}
?>