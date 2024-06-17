<?php
include(__DIR__ . "/../system/config.inc.php");
if(empty($_SERVER['HTTP_APPKEY'])) {
	$result = array("response"=>"false","msg"=>"Please provide api key.","data"=>array());
} else if($_SERVER['HTTP_APPKEY'] != APPKEY) {
	$result = array("response"=>"false","msg"=>"Please provide valid api key.","data"=>array());
} else if(!isset($_POST["user_id"]) || empty($_POST["user_id"])) 
{    $result = array("response"=>"false","msg"=>"Please provide user id.","data"=>array());
} else if(!isset($_POST["action"]) || empty($_POST["action"])) {
	$result = array("response"=>"false","msg"=>"Please provide action.","data"=>array());
} else {    
	$user_id = trim($_POST["user_id"]); 
	if($_POST["action"]=="add") {   
		if(!isset($_POST["product_id"]) || empty($_POST["product_id"])) {  
			$result = array("response"=>"false","msg"=>"Please provide product id.","data"=>array());
		} 
		else if(!isset($_POST["store_id"]) || empty($_POST["store_id"])) {       
			$result = array("response"=>"false","msg"=>"Please provide store id.","data"=>array());      
		} else if(!isset($_POST["quantity"]) || empty($_POST["quantity"])) {          
			$result = array("response"=>"false","msg"=>"Please provide quantity.","data"=>array()); 
		} else {       
			$store_id = trim($_POST["store_id"]);           
			$product_id = trim($_POST["product_id"]);           
			$quantity = trim($_POST["quantity"]);           
			$duplicateStore = checkDuplicateStoreCartItem($user_id,$store_id);            
			$duplicate = checkDuplicateCartItem($user_id,$store_id,$product_id);            
			$not_availabe = checkItemQuantityAvailable($product_id,$quantity);            
			if($duplicateStore) {               
				$result = array("response"=>"false","msg"=>"Order from multiple store is not allowed, You must place current order and start again.","data"=>array());            
			} else if($duplicate) {                
				$result = array("response"=>"false","msg"=>"Product already added to cart.","data"=>array());           
			} else if($not_availabe) {  
			                   //$cart = getUserCart($user_id);  
				$cart = getUserItemDetail($product_id); 
				$msg = ($not_availabe=="1") ? "Product sold out!" : "Product has not enough quantity!";   
				$result = array("response"=>"false","msg"=>$msg,"data"=>$cart); 
			} else { 

				$data = array("store_id" => $store_id,"user_id" => $user_id,"product_id" => $product_id,"quantity" => $quantity);
				$cart_id = $db->insert("cart",$data);
                //$cart = getUserCart($user_id);
				$cart = getUserItemDetail($product_id);
				$msg = "Item added to cart successfully";
				$result = array("response"=>"true","msg"=>$msg,"data"=>$cart);
			}
		}
	} else if($_POST["action"]=="update") {
		//echo sendResponse($_POST);exit();
		if(!isset($_POST["store_id"]) || empty($_POST["store_id"])) {
			$result = array("response"=>"false","msg"=>"Please provide store id.","data"=>array());
		} else if(!isset($_POST["product"]) || empty($_POST["product"])) {
			$result = array("response"=>"false","msg"=>"Please provide product data.","data"=>array());
		} else {
			$store_id = trim($_POST["store_id"]);            
			$products = json_decode(trim($_POST["product"]),true);                        
			if(count($products)>0) {  
                    //update product detail                 
				for($i=0;$i<count($products);$i++) {                    
					$data = array("quantity" => $products[$i]['quantity']);
					//echo sendResponse($data);exit();
					$db->where("user_id",$user_id);                    
					$db->where("store_id",$store_id);                    
					$db->where("product_id",$products[$i]['product_id']);   
					$cart_id = $db->update("cart",$data);                                    
				}            
			}                       
			$cart = getUserCart($user_id);            
			$msg = "Cart item updated";            
			$result = array("response"=>"true","msg"=>$msg,"data"=>$cart);
		}    
	} else if($_POST["action"]=="delete") {        
		if(!isset($_POST["product_id"]) || empty($_POST["product_id"])) {            
			$result = array("response"=>"false","msg"=>"Please provide product id.","data"=>array());        
		} else {            
			$product_id = trim($_POST["product_id"]);                        
			$db->where("user_id",$user_id);            
			$db->where("product_id",$product_id);            
			$del = $db->delete("cart");            
			$cart = getUserCart($user_id);            
			$msg = "Cart item deleted";            
			$result = array("response"=>"true","msg"=>$msg,"data"=>$cart);        
		}    
	} else if($_POST["action"]=="update_product"){
		if(!isset($_POST["store_id"]) || empty($_POST["store_id"])) {
			$result = array("response"=>"false","msg"=>"Please provide store id.","data"=>array());
		} else if(!isset($_POST["product_id"]) || empty($_POST["product_id"])) {
			$result = array("response"=>"false","msg"=>"Please provide product id.","data"=>array());
		} else if(!isset($_POST["user_id"]) || empty($_POST["user_id"])){
			$result = array("response"=>"false","msg"=>"Please provide valid user id.","data"=>array());
		} else if(!isset($_POST["quantity"]) || empty($_POST["quantity"])){
			$result = array("response"=>"false","msg"=>"Please provide product quantity.","data"=>array());
		} else {
			$store_id = trim($_POST["store_id"]);
			if(count($_POST["quantity"])>0) {
				$data = array("quantity" => $_POST["quantity"]);
				$db->where("user_id",$_POST["user_id"]);
				$db->where("store_id",$store_id);
				$db->where("product_id",$_POST["product_id"]);
				$cart_id = $db->update("cart",$data);
			}
			$cart = getUserCart($_POST["user_id"]);
			$msg = "Cart item updated";            
			$result = array("response"=>"true","msg"=>$msg,"data"=>$cart);
		}
	} else {        
		$cart = getUserCart($user_id);        
		$msg = "Cart details";        
		$result = array("response"=>"true","msg"=>$msg,"data"=>$cart);        
	}    
}echo sendResponse($result);
exit;