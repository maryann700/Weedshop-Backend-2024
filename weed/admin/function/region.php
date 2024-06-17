<?php 
checkAdminLogin();

// delete product
if(isset($_GET['delete']) && $_GET['delete'] != "") {    
  
    $db->where ('id', $_GET['delete']);
    $db->delete('region');
        
    setSuccessMessage("Region deleted successfully!");
    header("location:region.php");
    die();
}
if(isset($_POST['action']) && $_POST['action'] == "addeditregion" && $_POST['id'] != "") {
    validateCSRFToken();
    
    $id = $_POST['id'];
    $db->where ("LOWER(name)", strtolower(trim($_POST['region']['name'])));
    if($id != 'add')
      $db->where ("id", $id, "!=");
    $db->getOne ('region');
    if($db->count > 0) {
        setErrorMessage("Region already added!, please try different name");
        header("location:region.php");
        die();
    }
    
    $data = Array (
	'name' => $_POST['region']['name'],        
        'status' => $_POST['region']['status']
    );        
    if($id == "add") {        
        $id = $db->insert ('region', $data);           
        setSuccessMessage("Region added successfully!");        
    } else {
        $db->where ("id", $id);
        $db->update ('region', $data);        
        setSuccessMessage("Region updated successfully!");
    }        
    header("location:region.php");
    die(); 

}


if(isset($_GET['id']) && $_GET['id'] != "add") {
    //check for product is logged in user or not  
    $id = $_GET['id'];
    $db->where ("id", $id);
    $region = $db->getOne ("region");    
} else {
    $region = array(
        'name' => '',        
        'status' => ''        
    );
    $id = "add";
}
//get all categories
$regions = $db->get ("region");


?>