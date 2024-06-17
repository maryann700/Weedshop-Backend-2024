<?php
include('../../system/config.inc.php');
  /* 
   * Paging
   */

  //var_dump($_POST["selected"]);
 if($_REQUEST['id'] != '') {
 $id = explode("|",$_REQUEST['id']);
    $db->where("id",$id[1]);
    $db->where("store_id",$_SESSION['store']['id']);
    $db->getOne ("products");
    if($db->count <= 0) {
        echo "0";
        exit;
    } else {
        $db->where("id",$id[0]);
        $pr_img = $db->getOne ("product_images");
        unlink($product_img_path.$pr_img['image']);
        
        $db->where("id",$id[0]);
        if($db->delete('product_images')) {
            echo "1";
            exit;
        } else {
            echo "0";
            exit;
        }
    }
    
 } else {
    echo "0";
    exit;
 }
 
?>