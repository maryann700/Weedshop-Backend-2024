<?php

include(__DIR__ . "/../system/config.inc.php");

if(empty($_SERVER['HTTP_APPKEY'])) {
    $result = array("response"=>"false","msg"=>"Please provide api key.","data"=>array());
} else if($_SERVER['HTTP_APPKEY'] != APPKEY) {
    $result = array("response"=>"false","msg"=>"Please provide valid api key.","data"=>array());
} else if(!isset($_REQUEST['product']) || empty($_REQUEST['product'])) {
    $result = array("response"=>"false","msg"=>"Please provide products detail.","data"=>array());
} else if(!isset($_REQUEST['address']) || empty($_REQUEST['address'])) {
    $result = array("response"=>"false","msg"=>"Please provide address.","data"=>array());
} else if(!isset($_REQUEST["user_id"]) || empty($_REQUEST["user_id"])) {
    $result = array("response"=>"false","msg"=>"Please provide user id.","data"=>array());
} else if(!isset($_REQUEST["store_id"]) || empty($_REQUEST["store_id"])) {
    $result = array("response"=>"false","msg"=>"Please provide store id.","data"=>array());
} else if(!isset($_REQUEST["delivery_charge"]) || empty($_REQUEST["delivery_charge"])) {
    $result = array("response"=>"false","msg"=>"Please provide delivery charge.","data"=>array());
} else {
    $products = json_decode($_REQUEST['product'],true);    
    $user_id = trim($_REQUEST["user_id"]);
    $store_id = trim($_REQUEST["store_id"]);
    $address_id = trim($_REQUEST['address']);
    $delivery_charge = trim($_REQUEST['delivery_charge']);
    
    $db->where("o.user_id", $user_id);        
    $db->where('o.status', Array('Pending','Inprocess'), 'IN');
    $db->orderBy("o.order_date","desc");
    $current_order = $db->get ("orders o",array(0,1),'o.id');
    if ($db->count > 0) {  
        $result = array("response"=>"false","msg"=>"Warning! You can not place new order untill your current order completed!","data"=>array());
    } else {
        $delivery_address = "";
        $delivery_latitude = "";
        $delivery_longitude = "";
        $sub_total = 0;
        $delivery_charge = $delivery_charge;
        $final_total = 0;
        $order_date = date('Y-m-d H:i:s');
        $status = "Pending";

        //get address information
        $db->where("id",$address_id);
        $address = $db->getOne("user_address");    
        $delivery_name = $address['firstname']." ".$address['lastname'];
        $delivery_phone = $address['phone'];
        $delivery_address = $address['address']." ".$address['city']." ".$address['region']." CA ".$address['zipcode'];
        $delivery_latitude = $address['latitude'];
        $delivery_longitude = $address['longitude'];
        $order_code = "WD".time().rand();
        //insert order detail to order table
        $order_data = Array(
            "order_code" => $order_code,
            "user_id" => $user_id,
            "driver_id" => 0,
            "store_id" => $store_id,
            "address_id" => $address_id,
            "delivery_name" => $delivery_name,
            "delivery_phone" => $delivery_phone,
            "delivery_address" => $delivery_address,
            "delivery_latitude" => $delivery_latitude,
            "delivery_longitude" => $delivery_longitude,
            "sub_total" => $sub_total,
            "delivery_charge" => $delivery_charge,
            "final_total" => $final_total,
            "order_date" => $order_date,
            "status" => $status
        );
       $order_id = $db->insert ("orders",$order_data);     
        //echo $db->getLastQuery(); exit;
        if($order_id) {    
            if(count($products)>0) {            
                //insert product detail 
                for($i=0;$i<count($products);$i++) {   
                    $pr_price = (float)$products[$i]['price'];
                    $pr_qty = (int)$products[$i]['quantity'];
                    $pr_total = (float)($pr_price*$pr_qty);
                    $sub_total = ($sub_total + $pr_total);
                    $order_prod = Array(
                        "order_id" => $order_id,
                        "product_id" => $products[$i]['product_id'],
                        "product_name" => trim($products[$i]['product_name']),
                        "type" => trim($products[$i]['type']),
                        "price" => $products[$i]['price'],
                        "quantity" => $products[$i]['quantity'],
                        "attribute_description" => trim($products[$i]['attribute_description']),
                    );
                    $order_prod_id = $db->insert("order_products",$order_prod);  

                    //update product quantity                
                    $up_prod_qty = $db->rawQuery('UPDATE products SET `quantity` = quantity - ? WHERE  id = ?', Array ($products[$i]['quantity'],$products[$i]['product_id']));

                }

                //update total
                $update_order = array(                
                    "sub_total" => $sub_total,
                    "final_total" => ($sub_total + $delivery_charge)
                );
                $db->where("id",$order_id);
                $db->update("orders",$update_order);
            }  
            // clear cart 
            $db->where("user_id",$user_id);
            $db->where("store_id",$store_id);
            $del_cart = $db->delete("cart");

            // dispatch driver
            
            $fields = array(
                'order_id' => $order_id,
                'store_id' => $store_id            
            );
            $curl_options = array(
                CURLOPT_URL => $siteurl."api/dispatch_driver.php",
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => http_build_query( $fields ),
                CURLOPT_HTTP_VERSION => 1.0,
                CURLOPT_HEADER => 0,
                CURLOPT_TIMEOUT => 1
            );
            $curl = curl_init();
            curl_setopt_array( $curl, $curl_options );
            $result = curl_exec( $curl );        
            curl_close( $curl );   
            
            $narr['user_id'] = $user_id;
            $narr['text'] = "Order confirmed! Your order id is $order_code";
            usernotification($narr);    

            $result = array("response"=>"true","msg"=>"Order has been placed successfully.","data"=>array("order_id"=>$order_id));
        } else {
            $result = array("response"=>"flase","msg"=>"Something goes wrong, please try again!","data"=>array());
        }
    }
}

echo sendResponse($result);
exit;
