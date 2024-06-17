<?php 
checkAdminLogin();

if(isset($_POST['action']) && $_POST['action'] == "addeditemail" && $_POST['id'] != "") {
    validateCSRFToken();
    #echo "<pre>"; print_r($_POST); exit;
    $id = $_POST['id'];
    
    
    if(isset($_POST['delete']) && $_POST['delete'] == "delete") {               
        $db->where ('id', $id);
        $db->delete ('email_template');
        
        setSuccessMessage("Email Template deleted successfully!");
        header("location:email_template.php");
        die();
    }
    
    $data = Array (
	'name' => $_POST['email']['name'],
        'subject' => $_POST['email']['subject'],
        'email_body' => $_POST['email']['email_body'],        
        'status' => $_POST['email']['status']
    );    
    
    if($id == "add") {        
        //insert email template       
        $data['created_date'] = date('Y-m-d H:i:s');            
        $id = $db->insert ('email_template', $data);           
        setSuccessMessage("Email Template added successfully!");        
    } else {
        
        $db->where ("id", $id);
        $db->update ('email_template', $data);        
        setSuccessMessage("Email Template updated successfully!");
    }
    if(isset($_POST['saveedit'])) {            
        header("location:email_template_edit.php?id=".$id);
        die(); 
    } else {            
        header("location:email_template.php");
        die(); 
    }    
}

$id = $_GET['id'];
if(isset($id) && $id != "add") {    
    $db->where ("id", $id);
    $email = $db->getOne ("email_template");    
} else {
    $email = array(
        'name' => '',
        'subject' => '',
        'email_body' => '',
        'status' => ''
    );
    $id = "add";
}
?>