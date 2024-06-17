<?php 
checkStoreLogin();
$db->where("store_id",$_SESSION['store']['id']);
$db->where ("status", 'Deleted', "!=");
$totalProducts = $db->getValue ("products", "count(id)");
?>