<?php 
checkAdminLogin();

// delete product
if(isset($_GET['delete']) && $_GET['delete'] != "") {    
  
    $db->where ('id', $_GET['delete']);
    $db->delete('delivery_fees');
        
    setSuccessMessage("Fees deleted successfully!");
    header("location:delivery_fees.php");
    die();
}
if(isset($_POST['action']) && $_POST['action'] == "addeditfees" && $_POST['id'] != "") {
    validateCSRFToken();
    
    $id = $_POST['id'];
    $min_dist = trim($_POST['fees']['min_distance']);
    $max_dist = trim($_POST['fees']['max_distance']);
//    $db->where($min_dist, Array ('min_distance', 'max_distance'), 'BETWEEN');
//    $db->where ("(min_distance >= ? or max_distance <= ?)", Array($min_dist,$min_dist));
//    $db->where ("(min_distance >= ? or max_distance <= ?)", Array($max_dist,$max_dist));
//    if($id != 'add')
//      $db->where ("id", $id, "!=");
//    $db->getOne ('delivery_fees');
//    if($db->count > 0) {
//        setErrorMessage("Distance range already added!, please try different range");
//        header("location:delivery_fees.php");
//        die();
//    }
    
    $data = Array (
	'min_distance' => $_POST['fees']['min_distance'],        
        'max_distance' => $_POST['fees']['max_distance'],        
        'price' => $_POST['fees']['price'],        
        'status' => $_POST['fees']['status']
    );        
    if($id == "add") {        
        $id = $db->insert ('delivery_fees', $data);           
        setSuccessMessage("Fees added successfully!");        
    } else {
        $db->where ("id", $id);
        $db->update ('delivery_fees', $data);        
        setSuccessMessage("Fees updated successfully!");
    }        
    header("location:delivery_fees.php");
    die(); 

}


if(isset($_GET['id']) && $_GET['id'] != "add") {
    //check for product is logged in user or not  
    $id = $_GET['id'];
    $db->where ("id", $id);
    $fees = $db->getOne ("delivery_fees");    
} else {
    $fees = array(
        'min_distance' => '',        
        'max_distance' => '',        
        'price' => '',        
        'status' => ''
    );
    $id = "add";
}
//get all categories
$feesarr = $db->get ("delivery_fees");


?>