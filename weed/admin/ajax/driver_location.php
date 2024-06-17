<?php
include('../../system/config.inc.php');
  /* 
   * Paging
   */

//echo "<pre>"; print_r($_REQUEST); exit;
if($_REQUEST['id']) {
    $db->where("driver_id",$_REQUEST['id']);
    $location = $db->getOne("driver_location");
    if($db->count>0) {
        echo sendResponse($location);
    } else {
        echo "";
    }   
}
exit;