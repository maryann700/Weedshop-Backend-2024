<?php 
include('../system/config.inc.php');

include('function/users.php');

if(isset($_POST['rowid']) && $_POST['rowid']!=""){
	$rowid = $_POST['rowid'];

print_r($rowid);
exit;
// $users_delete = "DELETE FROM user WHERE id=$rowid";

// $result = mysqli_query($conn,$users_delete);

	$db->where('id', 1);
	if($db->delete('users')){


	echo 'successfully deleted';
}	// echo $rowid;
	// exit;
}

?>