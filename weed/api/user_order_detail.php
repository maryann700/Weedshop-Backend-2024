<?phpinclude(__DIR__ . "/../system/config.inc.php");if(empty($_SERVER['HTTP_APPKEY'])) {    $result = array("response"=>"false","msg"=>"Please provide api key.","data"=>array());} else if($_SERVER['HTTP_APPKEY'] != APPKEY) {    $result = array("response"=>"false","msg"=>"Please provide valid api key.","data"=>array());} else if(!isset($_POST["user_id"]) || empty($_POST["user_id"])) {    $result = array("response"=>"false","msg"=>"Please provide user id.","data"=>array());} else if(!isset($_POST["order_id"]) || empty($_POST["order_id"])) {    $result = array("response"=>"false","msg"=>"Please provide order id.","data"=>array());} else {    $user_id = trim($_POST["user_id"]);     $order_id = trim($_POST["order_id"]);         $db->join("store s","o.store_id=s.id","LEFT");    $db->where("o.user_id", $user_id);     $db->where("o.id", $order_id);        //$orders = $db->getOne ("orders o");    $orders = $db->get ("orders o",array(0,1),'o.*,s.name as store_name,s.owner as store_owner, s.address as store_address, s.phone as store_phone,s.image as store_image,CONCAT("'.STORE_PROFILE_IMG_URL.'",s.image) AS store_image_url');        if ($db->count > 0) {             $db->join("products p","op.product_id=p.id","LEFT");        $db->join("type t","p.type_id=t.id","LEFT");        $db->where("op.order_id",$orders[0]['id']);                    $db->orderBy("op.id","asc");        $prod_detail = $db->get("order_products op",null,'op.order_id,op.product_id,op.product_name,op.price,op.quantity,op.attribute_description,p.image,CONCAT("'.PRODUCT_IMG_URL.'",p.`image`) AS `image_url`,t.name as type,t.color');        $orders[0]['total_products'] = count($prod_detail);        //echo $db->getLastQuery(); exit;        $orders[0]['products'] = $prod_detail;                        $msg = "Order detail!";        $result = array("response"=>"true","msg"=>$msg,"data"=> $orders);                   } else {        $result = array("response"=>"false","msg"=>"Not any order found!","data"=>array());    }}echo sendResponse($result);exit;