<?php
include('../../system/config.inc.php');
  /* 
   * Paging
   */

//echo "<pre>"; print_r($_REQUEST); exit;
$db->join("category c", "p.category_id=c.id", "LEFT");
$db->where("p.id",$_REQUEST['id']);
$product = $db->get ("products p", 1, "p.*,c.name as category");

$db->where("product_id",$_REQUEST['id']);
$product_images = $db->get ("product_images");


$db->where("id",$product[0]['store_id']);
$store = $db->getOne ("store");


 $html = '<div class="portlet blue-hoki box">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Product Details </div>                                
        </div>
        <div class="portlet-body">
            <div class="row static-info">
                <div class="col-md-3 name"> Product Name: </div>
                <div class="col-md-9 value"> '.$product[0]['name'].' </div>
            </div>
            <div class="row static-info">
                <div class="col-md-3 name"> Category: </div>
                <div class="col-md-9 value"> '.$product[0]['category'].' </div>
            </div>
            <div class="row static-info">
                <div class="col-md-3 name"> Quantity: </div>
                <div class="col-md-9 value"> '.$product[0]['quantity'].' </div>
            </div>
            <div class="row static-info">
                <div class="col-md-3 name"> Price: </div>
                <div class="col-md-9 value"> '.$product[0]['price'].' </div>
            </div>                               
        </div>
    </div>

    <div class="row">
    <div class="col-md-6 col-sm-12">
    <div class="portlet yellow-crusta box">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Product Images </div>                               
        </div>
        <div class="portlet-body">
            <div class="row static-info">';
                if(isset($product_images[0]['image']) && $product_images[0]['image']) {                
                    $html .= '<div class="col-md-4 name"> 
                        <a href="'.PRODUCT_IMG_URL.$product_images[0]['image'].'" class="fancybox-button" rel="fancybox-button">
                            <img class="img-responsive" src="'.PRODUCT_IMG_URL.$product_images[0]['image'].'" alt=""> 
                        </a>
                    </div>';
                }
                if(isset($product_images[1]['image']) && $product_images[1]['image']) {                
                    $html .= '<div class="col-md-4 name"> 
                        <a href="'.PRODUCT_IMG_URL.$product_images[1]['image'].'" class="fancybox-button" rel="fancybox-button">
                            <img class="img-responsive" src="'.PRODUCT_IMG_URL.$product_images[1]['image'].'" alt=""> 
                        </a>
                    </div>';
                }
                if(isset($product_images[2]['image']) && $product_images[2]['image']) {                
                    $html .= '<div class="col-md-4 name"> 
                        <a href="'.PRODUCT_IMG_URL.$product_images[2]['image'].'" class="fancybox-button" rel="fancybox-button">
                            <img class="img-responsive" src="'.PRODUCT_IMG_URL.$product_images[2]['image'].'" alt=""> 
                        </a>
                    </div>';
                }
            $html .='</div>
            <div class="row static-info">';
                if(isset($product_images[3]['image']) && $product_images[3]['image']) {                
                    $html .= '<div class="col-md-4 name"> 
                        <a href="'.PRODUCT_IMG_URL.$product_images[3]['image'].'" class="fancybox-button" rel="fancybox-button">
                            <img class="img-responsive" src="'.PRODUCT_IMG_URL.$product_images[3]['image'].'" alt=""> 
                        </a>
                    </div>';
                }
                if(isset($product_images[4]['image']) && $product_images[4]['image']) {                
                    $html .= '<div class="col-md-4 name"> 
                        <a href="'.PRODUCT_IMG_URL.$product_images[4]['image'].'" class="fancybox-button" rel="fancybox-button">
                            <img class="img-responsive" src="'.PRODUCT_IMG_URL.$product_images[4]['image'].'" alt=""> 
                        </a>
                    </div>';
                }
                if(isset($product_images[5]['image']) && $product_images[5]['image']) {                
                    $html .= '<div class="col-md-4 name"> 
                        <a href="'.PRODUCT_IMG_URL.$product_images[5]['image'].'" class="fancybox-button" rel="fancybox-button">
                            <img class="img-responsive" src="'.PRODUCT_IMG_URL.$product_images[5]['image'].'" alt=""> 
                        </a>
                    </div>';
                }
              
            $html .= '</div>                                
        </div>
    </div>
    </div>                                                        

    <div class="col-md-6 col-sm-12">
    <div class="portlet green-meadow box">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Store Information </div>                               
        </div>
        <div class="portlet-body">
            <div class="row static-info">
                <div class="col-md-5 name"> Store Name: </div>
                <div class="col-md-7 value"> '.$store['name'].' </div>
            </div>
            <div class="row static-info">
                <div class="col-md-5 name"> Email: </div>
                <div class="col-md-7 value"> '.$store['email'].' </div>
            </div>                                
            <div class="row static-info">
                <div class="col-md-5 name"> Phone Number: </div>
                <div class="col-md-7 value"> '.$store['phone'].' </div>
            </div>
            <div class="row static-info">
                <div class="col-md-5 name"> Address: </div>
                <div class="col-md-7 value"> '.$store['address'].' </div>
            </div>
        </div>
    </div>
    </div>     
    </div><script>$(".fancybox-button").fancybox();</script>';
 echo $html; exit;
