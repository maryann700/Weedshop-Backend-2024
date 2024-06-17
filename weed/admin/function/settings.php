<?php 
checkAdminLogin();

if(isset($_POST['action']) && $_POST['action'] == "addeditsettings" && $_POST['id'] != "") {
    validateCSRFToken();
    #echo "<pre>"; print_r($_POST); exit;
    $id = 1;
    
    
    $data = $_POST['setting'];

    $db->where ("id", $id);
    $db->update ('settings', $data);        
    setSuccessMessage("Settings updated successfully!");
    
            
    header("location:settings.php");
    die(); 
   
}

$id = 1;
$db->where ("id", $id);
$setting = $db->getOne ("settings");    

?>