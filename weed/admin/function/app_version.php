<?php 




if(isset($_POST['device_type']) && $_POST['device_type'] == "Android") {

    validateCSRFToken();    

    $data = Array (
        

        'cust_version' => $_POST['cust_version'],        

        'driver_version' => $_POST['driver_version']

        );
    

    $db->where ('id',1);

    if ($db->update ('app_version', $data)){

    echo $db->count . 'Your app version updated successfully!';
   }
    else{
    header("location:app_version.php");
    echo 'Update error! Please try again.' . $db->getLastError();
    }
   
}



if(isset($_POST['device_type']) && $_POST['device_type'] == "ios") {

    validateCSRFToken();
    $data = Array (

     'cust_version' => $_POST['cust_version'],        

     'driver_version' => $_POST['driver_version']

 );

     $db->where ('id', 2);

    if ($db->update ('app_version', $data)){

    echo $db->count . 'Your app version updated successfully!';
   }
    else{
         header("location:app_version.php");
    
        echo 'Update error! Please try again.' . $db->getLastError();
    }
}

     //get current user data

$db->where ("device_type",'ios' );
$store1 = $db->getOne ("app_version");
$db->where ("device_type",'Android' );
$store = $db->getOne ("app_version");




?>