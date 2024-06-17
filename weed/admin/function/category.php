<?php 
checkAdminLogin();

// delete product
if(isset($_GET['delete']) && $_GET['delete'] != "") {    
  
    $db->where ('id', $_GET['delete']);
    $db->delete('category');
        
    setSuccessMessage("Category deleted successfully!");
    header("location:category.php");
    die();
}
if(isset($_POST['action']) && $_POST['action'] == "addeditcat" && $_POST['id'] != "") {
    validateCSRFToken();
    
    $id = $_POST['id'];
    $db->where ("LOWER(name)", strtolower(trim($_POST['category']['name'])));
    if($id != 'add')
      $db->where ("id", $id, "!=");
    $db->getOne ('category');
    if($db->count > 0) {
        setErrorMessage("Category already added!, please try different name");
        header("location:category.php");
        die();
    }
    
    $data = Array (
	'name' => $_POST['category']['name'],        
        'status' => $_POST['category']['status']
    );        
    if($id == "add") {        
        $id = $db->insert ('category', $data);           
        setSuccessMessage("Category added successfully!");        
    } else {
        $db->where ("id", $id);
        $db->update ('category', $data);        
        setSuccessMessage("Category updated successfully!");
    }        
    header("location:category.php");
    die(); 

}


if(isset($_GET['id']) && $_GET['id'] != "add") {
    //check for product is logged in user or not  
    $id = $_GET['id'];
    $db->where ("id", $id);
    $category = $db->getOne ("category");    
} else {
    $category = array(
        'name' => '',        
        'status' => ''        
    );
    $id = "add";
}
//get all categories
$categories = $db->get ("category");


?>