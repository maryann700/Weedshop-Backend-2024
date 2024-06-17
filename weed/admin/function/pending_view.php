<?php
checkAdminLogin();

if(isset($_POST['save'])){    
    $id=$_POST['order_id'];
    $data=Array(
            'driver_id' => $_POST['driver_id'],
            'status' =>'Inprocess',
            'start_time' => date('Y-m-d H:i:s')
    );
    $db->where('id',$id);
    $db->update('orders',$data);
    header("location:pending.php");
    exit;
}

$db->where('status','Inprocess');
$inprocessdriver = $db->get('orders',null,'driver_id');
$darray = array();
foreach($inprocessdriver as $key => $val) {	
	$darray[] = $val['driver_id'];
}

$db->where ("adminApproved","Approved");
$db->where("status","Active");
if(!empty($darray))
	$db->where("id",$darray,"Not In");
$drivers=$db->get("driver");


$db->join("user u", "o.user_id=u.id", "LEFT");
$db->join("driver d", "o.driver_id=d.id", "LEFT");
//$db->where ("o.store_id", $_SESSION['store']['id']);
$db->where ("o.id", $_GET['id']);
$order = $db->get ("orders o", Array (0, 1), "o.*,u.name as customer,u.email,u.zipcode,u.mobile,u.address,d.name as driver, d.email as driver_email, d.address as driver_address, d.mobile as driver_mobile,d.zipcode as driver_zipcode");
#echo "<pre>"; print_r($order); exit;

$db->where("s.id",$order[0]['store_id']);
$store = $db->get ("store s",Array(0,1),"s.id,s.name,s.owner,s.email,s.address,s.zipcode,s.region,s.phone");
if($db->count <= 0) {
    header("location:order.php");
    die();
}

$db->join("products p", "op.product_id=p.id","LEFT");
$db->where("op.order_id",$_GET['id']);
$products = $db->get ("order_products op",null,"op.product_id,op.price,op.quantity,op.attribute_description,p.name");
