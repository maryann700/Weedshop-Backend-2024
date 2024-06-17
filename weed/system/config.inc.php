<?php

ob_start();
session_start();
############################################
#	Database Server
############################################
//error_reporting(0);
$sitepath=$_SERVER['DOCUMENT_ROOT']."/weed/";
define('SITEPATH',$sitepath);
require_once(SITEPATH.'system/MysqliDb.php');
require_once(SITEPATH.'system/commonfunc.php');

//Necessary for upload path
define ('UPLOADROOT', '');
define ('CHARSET', 'utf-8');

//require_once("system/img.php");

################################################################
#		Database Class
################################################################
global $db,$storeurl,$siteurl,$sendcl;
if($_SERVER['HTTP_HOST']=="localhost"){
    $db = new MysqliDb ('localhost', 'root', '', 'weed');    
} else {
    //live db and path
    $db = new MysqliDb ('localhost', 'high5del_weed', '@wF_tDcu_#i.', 'high5del_weed');
}
$sendcl = new Send();

##  GET MASTER ADMIN DATA  ##
$sitename="High5 Weed | ";

if($_SERVER['HTTP_HOST']=="localhost"){
	$siteurl="http://localhost/weed/";
    $adminurl="http://localhost/weed/admin/";
    $storeurl="http://localhost/weed/store/";
} else {
        //live path
   $siteurl="http://high5delivery.com/weed/";
   $adminurl="http://high5delivery.com/weed/admin/";
   $storeurl="http://high5delivery.com/weed/store/";
}

//$_SESSION['KCFINDER']['uploadURL'] = "../upload";
//$_SESSION['KCFINDER']['uploadDir'] = "../upload";//user_$atype/$id";
//$_SESSION['KCFINDER']['disabled'] = false;

//$ip = $_SERVER['REMOTE_ADDR'];

$currency = "$";
$image_upload_path = $_SERVER['DOCUMENT_ROOT']."/weed/store/upload/";
$profile_img_path = $image_upload_path."store/";
$product_img_path = $image_upload_path."products/";
define('STORE_PROFILE_IMG_PATH',$profile_img_path);
define('STORE_PROFILE_IMG_URL',$storeurl."upload/store/");
define('PRODUCT_IMG_PATH',$product_img_path);
define('PRODUCT_IMG_URL',$storeurl."upload/products/");
define('USER_UPLOAD_PATH',$_SERVER['DOCUMENT_ROOT']."/weed/upload/");
define('USER_UPLOAD_URL',$siteurl."upload/");


define('APPKEY',"582e7d442740f326cc32a5ade9ed92f1");
//define('APPMODE',"development");
define('APPMODE',"production");
define('DELIVERY_CHARGE',"1");
define('REQUESTTIMEOUT',60);
define('MAXREQUEST',2);
?>
