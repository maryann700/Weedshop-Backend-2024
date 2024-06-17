<?php 
checkAdminLogin();

// delete product
if(isset($_GET['delete']) && $_GET['delete'] != "") {    
  
    $db->where ('id', $_GET['delete']);
    $db->delete('type');
        
    setSuccessMessage("Type deleted successfully!");
    header("location:type.php");
    die();
}
if(isset($_POST['action']) && $_POST['action'] == "addedittype" && $_POST['id'] != "") {
    validateCSRFToken();
    
    $id = $_POST['id'];
    $db->where ("LOWER(name)", strtolower(trim($_POST['type']['name'])));
    if($id != 'add')
      $db->where ("id", $id, "!=");
    $db->getOne ('type');
    if($db->count > 0) {
        setErrorMessage("Type already added!, please try different name");
        header("location:type.php");
        die();
    }
    
    $data = Array (
	'name' => $_POST['type']['name'],  
        'color' => $_POST['type']['color'],
        'status' => $_POST['type']['status']
    );        
    if($id == "add") {        
        $id = $db->insert ('type', $data);           
        setSuccessMessage("Type added successfully!");        
    } else {
        $db->where ("id", $id);
        $db->update ('type', $data);        
        setSuccessMessage("Type updated successfully!");
    }        
    header("location:type.php");
    die(); 

}


if(isset($_GET['id']) && $_GET['id'] != "add") {
    //check for product is logged in user or not  
    $id = $_GET['id'];
    $db->where ("id", $id);
    $type = $db->getOne ("type");    
} else {
    $type = array(
        'name' => '',   
        'color' => '#ff8572',
        'status' => ''        
    );
    $id = "add";
}
//get all categories
$types = $db->get ("type");


?>