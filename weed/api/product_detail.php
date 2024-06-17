<?php
include(__DIR__ . "/../system/config.inc.php");
if(empty($_SERVER['HTTP_APPKEY'])) {    
	$result = array("response"=>"false","msg"=>"Please provide api key.","data"=>array());
} else if($_SERVER['HTTP_APPKEY'] != APPKEY) {
	$result = array("response"=>"false","msg"=>"Please provide valid api key.","data"=>array());
} else if(!isset($_POST["store_id"]) || empty($_POST["store_id"])) {
	$result = array("response"=>"false","msg"=>"Please provide store id.","data"=>array());
} else if(!isset($_POST["product_id"]) || empty($_POST["product_id"])) {
	$result = array("response"=>"false","msg"=>"Please provide product id.","data"=>array());
} else {
	$db->join("type t", "p.type_id=t.id", "LEFT");    
	$db->where("p.store_id",trim($_POST["store_id"]));    
	$db->where("p.id",trim($_POST["product_id"]));    
	$db->where("p.status",'Active');        
	$product = $db->get ('products p',1,'p.id,p.store_id,p.name,p.image,p.price,p.quantity,p.description,CONCAT("'.PRODUCT_IMG_URL.'",p.`image`) AS `main_image_url`,t.name as type,p.type_id,t.color');
            // echo $db->getLastQuery(); exit;    
	if($db->count > 0) {        
            // get product attributes        
		$db->join("attributes a", "pa.attribute_id=a.id", "LEFT");        
		$db->where("pa.product_id",$product[0]['id']);        
		$attributes = $db->get ('product_attributes pa',null,'a.name,pa.attribute_text,pa.attribute_id');        
		$product[0]['attributes'] = $attributes;        
		$product[0]['delivery_charge'] = DELIVERY_CHARGE;        
            //get product images                
		$db->where("product_id",trim($_POST["product_id"]));           
		$product_images = $db->get ('product_images',null,'product_id,image,CONCAT("'.PRODUCT_IMG_URL.'",`image`) AS `image_url`');               
		$product[0]['images'] = $product_images;        
		$result = array("response"=>"true","msg"=>"Products detail!","data"=>$product);     
	} else {        
		$result = array("response"=>"false","msg"=>"Product not found!","data"=>array());     
	}
}echo sendResponse($result);
exit;
?>