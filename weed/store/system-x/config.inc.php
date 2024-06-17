<?php
ob_start();
session_start();
############################################
#	Database Server
############################################
//error_reporting(0);

require_once('system/MysqliDb.php');
require_once("system/commonfunc.php");

//Necessary for upload path
define ('UPLOADROOT', '');
define ('CHARSET', 'utf-8');

require_once("system/img.php");

################################################################
#		Database Class
################################################################
global $db,$storeurl,$siteurl;
if($_SERVER['HTTP_HOST']=="localhost"){
    $db = new MysqliDb ('localhost', 'root', '', 'weed');    
} else {
    //live db and path
    $db = new MysqliDb ('localhost', 'cl21-weed', 'JkXb!2x!3', 'cl21-weed');
}

##  GET MASTER ADMIN DATA  ##
$sitename="High5 Weed | ";

if($_SERVER['HTTP_HOST']=="localhost"){
	$siteurl="http://localhost/weed/";
        $adminurl="http://localhost/weed/admin/";
        $storeurl="http://localhost/weed/store/";
} else {
        //live path
	$siteurl="http://project-demo-server.net/weed/";
        $adminurl="http://project-demo-server.net/weed/admin/";
        $storeurl="http://project-demo-server.net/weed/store/";
}

//$_SESSION['KCFINDER']['uploadURL'] = "../upload";
//$_SESSION['KCFINDER']['uploadDir'] = "../upload";//user_$atype/$id";
//$_SESSION['KCFINDER']['disabled'] = false;

//$ip = $_SERVER['REMOTE_ADDR'];

$currency = "$";
$image_upload_path = $_SERVER['DOCUMENT_ROOT']."/weed/store/upload/";
$profile_img_path = $image_upload_path."store/";
$product_img_path = $image_upload_path."products/";

?>
