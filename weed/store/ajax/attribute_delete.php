<?php
include('../../system/config.inc.php');
  /* 
   * Paging
   */

  //var_dump($_POST["selected"]);
 if($_REQUEST['id'] != '') {
    $id = $_REQUEST['id'];    
    $db->where("id",$id);
    if($db->delete('product_attributes')) {
        echo "1";
        exit;
    } else {
        echo "0";
        exit;
    }
 } else {
    echo "0";
    exit;
 }
 