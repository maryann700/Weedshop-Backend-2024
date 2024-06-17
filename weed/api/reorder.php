<?php
include(__DIR__ . "/../system/config.inc.php");
if(empty($_SERVER['HTTP_APPKEY'])) {
	$result = array("response"=>"false","msg"=>"Please provide api key.","data"=>array());
} else if($_SERVER['HTTP_APPKEY'] != APPKEY) {
	$result = array("response"=>"false","msg"=>"Please provide valid api key.","data"=>array());
} else if(!isset($_POST["user_id"]) || empty($_POST["user_id"])) {    
	$result = array("response"=>"false","msg"=>"Please provide user id.","data"=>array());
} else if(!isset($_POST["order_id"]) || empty($_POST["order_id"])) {    
	$result = array("response"=>"false","msg"=>"Please provide order id.","data"=>array());
} else {    
	$user_id = trim($_POST["user_id"]); 
	$order_id = trim($_POST["order_id"]); 

	$db->where ("user_id",$user_id);
	$db->where ("id",$order_id);
    $data = $db->getOne("orders");

    $db->where ("user_id",$user_id);
    $data1 = $db->get("cart");
// echo "<pre>";print_r($data1);die;
    
    	if(!empty($data1) && $data['store_id']!=$data1['store_id']){
    		$result = array("response"=>"false","msg"=>"Your cart is not empty. Please clear your cart and try to re-order after that.","data"=>[]);
    	}else{
    		$db->where('order_id',$order_id);
    		$product = $db->get("order_products");

    		foreach ($product as $key => $value) {

    			$data2 = array("store_id" => $data['store_id'],"user_id" => $user_id,"product_id" => $value['product_id'],"quantity" => $value['quantity']);
    			//echo "<pre>";print_r($data2);die;
				$cart_id = $db->insert("cart",$data2);
    		}
    		$cart = getUserCart($user_id);        
			$msg = "Cart details";        
			$result = array("response"=>"true","msg"=>"when cart has another shop's product","data"=>$cart);
    	}
}echo sendResponse($result);
exit;
?>