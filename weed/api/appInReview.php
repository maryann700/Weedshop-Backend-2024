<?php
include(__DIR__ . "/../system/config.inc.php");
if(empty($_SERVER['HTTP_APPKEY'])) {
	$result = array("response"=>"false","msg"=>"Please provide api key.","data"=>array());
} else if($_SERVER['HTTP_APPKEY'] != APPKEY) {
	$result = array("response"=>"false","msg"=>"Please provide valid api key.","data"=>array());
} else {  
	$approval = 0;
	$approval = $db->getOne("appIeReview",null,'approval');
	$result = array("response"=>"true","msg"=>$msg,"data"=>$approval);        
}echo sendResponse($result);
exit;