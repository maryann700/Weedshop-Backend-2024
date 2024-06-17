<?php

################################################################
#		Common Function
##################################################################

//FUnction FOR Generate Random numbers
function random()
{
	$input = array(4,6,2,8,5,1,7,3,9,"N","A","M","E","K");
	$rand_keys = array_rand($input,7);
	$rand_number = "";
	for($i=0; $i<7; $i++)
	{
		$rand_number = $rand_number.$input[$rand_keys[$i]];
	}
	return $rand_number;
}

// FUNCTION FOR THE SENDING SIMPLE OR HTML MAILS
function SendEmail($to,$from,$subject,$msg,$cond)
{//echo $msg;die();
	//$cond=0     For the simple mail to send
	//$cond=1     For Html Format Mail Send
	if($cond==0)
	{
		$mail_subject = $subject;
		$message = $msg;
		$mail_to = $to;
		$mail_from = $from;
		$headers = "From:".$mail_from;

		mail($mail_to, $mail_subject, $message, $headers);
	}
	if($cond==1)
	{
		/* recipients */
		//-->$to  = "mary@example.com" . ", " ; // note the comma


		/* subject */
		//-->$subject = "Birthday Reminders for August";

		/* message */
		$message = '
		<html>
		<head>
		<title>'.$_SESSION['config_val'][0]['varcurrency'].'</title>
		</head>
		<body>
		<table width=100% border=0 cellspacing=0 cellpadding=0 >
		<tr>
		<td class="skinbg">'.$msg.'</td>
		</tr>
		<tr>
		<td class="skinbg">&nbsp;</td>
		</tr>
		</table>
		</body>
		</html>';

		/* To send HTML mail, you can set the Content-type header. */
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

		/* additional headers */
		$headers .= "To: ".$to."\r\n";
		$headers .= "From: ".$from."\r\n";

		/* and now mail it */
			//echo $to.",". $subject.",". $message.",.". $headers;die();
		if(mail($to, $subject, $message, $headers))
			{return true;}

	}
}


// FUNCTION FOR CHECKING THE VARAIBLE IS SET OR NOT (REQUEST  OR SESSION )
function issetvar($val="",$fixkept="")
{
	
	if(isset($_REQUEST[$val]))
	{
		return $_REQUEST[$val];
	}
	else
	{
		if(isset($_SESSION[$val]))
		{
			return $_SESSION[$val];
		}
		else
		{	
			if(trim($fixkept)!="")
			{
				return $fixkept;
			}
			else
			{
				return false;
			}
		}
	}
}


// FUNCTION FOR CHECKING  THAT ANY MAGIC QUOTES ARE REPLACED IN STRING
function mymagictxt($theValue)
{
	$theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;	
	$theValue= str_replace("%<%","&lt;",$theValue);
	$theValue= str_replace("%>%","&gt;",$theValue);
	return $theValue;
}


// parsedate from time stamp in linux
function printdate($timestamp)
{
	if(strpos($timestamp, "-"))
	{
		$timestamp=explode(" ",$timestamp);
		$timestamp=explode("-",$timestamp[0]);
		$yr=$timestamp[0];
		$month=$timestamp[1];
		$day=$timestamp[2];
		
	}
	else
	{
		$yr=substr($timestamp, 0, 4);
		$month=substr($timestamp, 4, 2);
		$day=substr($timestamp, 6, 2);
	}
	$mon[1]="Jan";
	$mon[2]="Feb";
	$mon[3]="Mar";
	$mon[4]="Apr";
	$mon[5]="May";
	$mon[6]="June";
	$mon[7]="July";
	$mon[8]="Aug";
	$mon[9]="Sep";
	$mon[10]="Oct";
	$mon[11]="Nov";
	$mon[12]="Dec";
	//$date = $yr."-".$mon[ceil($month)]."-".$day;
	$date = $day."-".$mon[ceil($month)]."-".$yr;
	return $date;
	
}

#### Function to prevent database attack:
function check_input($value)
{
	// Stripslashes
	if (get_magic_quotes_gpc())
	{
		$value = stripslashes($value);
	}
	// Quote if not a number
	if (!is_numeric($value))
	{
		$value = "'" . mysql_real_escape_string($value) . "'";
	}
	return trim($value);
}

#### function should print out: February, March, April, May, and June
### Between two dates...
function get_months($date1, $date2) {
	$time1  = strtotime($date1);
	$time2  = strtotime($date2);
	$my     = date('mY', $time2);

	$months = array(date('F', $time1));
	$f      = '';

	while($time1 < $time2) {
		$time1 = strtotime((date('Y-m-d', $time1).' +15days'));
		if(date('F', $time1) != $f) {
			$f = date('F', $time1);
			if(date('mY', $time1) != $my && ($time1 < $time2))
				$months[] = date('F', $time1);
		}
	}

	$months[] = date('F', $time2);
	return $months;
}

function site_Encryption($val)
{
	$letter1 = ucfirst(chr(rand(97,122)));
	$letter2 = ucfirst(chr(rand(97,122)));
	$letter3 = ucfirst(chr(rand(97,122)));
	$letter4 = ucfirst(chr(rand(97,122)));
	$str1=$letter1.$letter4."#";
	$str2="#".$letter2.$letter3;
	return base64_encode($str1.$val.$str2);
}

function site_Decryption($val)
{
	$exp = explode("#",base64_decode($val));
	return $exp[1];
}

function selfURL() {
	$s = empty($_SERVER["HTTPS"]) ? ''
	: ($_SERVER["HTTPS"] == "on") ? "s"
	: "";
	$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? ""
	: (":".$_SERVER["SERVER_PORT"]);
	return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}
function strleft($s1, $s2) {
	return substr($s1, 0, strpos($s1, $s2));
}

function Removeword($msg,$pat){
	//wrightdown which you want to remove 
	//$pattern = '([i][d][=]\w*[&]*)';
	//$pattern = '([c][a][t][e][=]\w*[&]*)';
	//$pattern = '([p][a][g][e][=]\w*[&]*)';
	//$pattern = '([m][s][g][=]\w*[&]*)';
	$string =$msg;
	$pattern = $pat;
	$replacement = '';
	$rowstring=preg_replace($pattern, $replacement, $string);
	$last = substr($rowstring, -1);
	if($last=='?'){
		return  substr($rowstring,0,-1);
	}else if($last=='&'){
		return substr($rowstring,0,-1);
	} else {
		return $rowstring;
	}
}

//get last page page name of any url
function lastpage() {
	$fullurl=parse_url($_SERVER["REQUEST_URI"]);
	$Arrayofurl=explode ("/",$fullurl[path]);
	return end($Arrayofurl);
}

//get all data after ?
function Getalldataafter(){;
	$level1=explode ("/",$_SERVER['REQUEST_URI']);
	$level2=end($level1);
	$level3=explode ("?",$level2);
	return $level3[1];
}

function Replacestring($string) {
	$find=array(' ', '&');
	$replace = array('_', '+');
	$data=str_replace($find, $replace, $string); 
	return $data; 
}

function ReverceReplacestring($string) {
	$replace=array(' ', '&');
	$find = array('_', '+');
	$data=str_replace($find, $replace, $string);
	return $data; 
}


function loginFormStingEncode($string)
{
	$string = addslashes($string);
	$string = stringHTMLEncode($string);
	return $string;
}
function loginFormStingDecode($string)
{
	$string = stripslashes($string);
	$string = stringHTMLDecode($string);
	return $string;
}

function stringHTMLEncode($string)
{
	return htmlentities($string);
}

function stringHTMLDecode($string)
{
	return html_entity_decode($string);
}

function cleanurl($str) {
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);

	return $clean;
}

function cleanInput($input) {

	$search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
);

	$output = preg_replace($search, '', $input);
	return $output;
}
function sanitize($input) {
	if (is_array($input)) {
		foreach($input as $var=>$val) {
			$output[$var] = sanitize($val);
		}
	}
	else {
		if (get_magic_quotes_gpc()) {
			$input = stripslashes($input);
		}
		$input  = cleanInput($input);
		$output = mysql_real_escape_string($input);
	}
	return $output;
}

function echo_data($input){
	echo stripslashes($input);
}
function first_words($in, $n, $after='')
{
	$txt = str_replace(">", "> ",$in);
	$txt = strip_tags($txt);
	$txt = preg_replace('/\s+/', ' ', $txt);
	$final='';
	$words = explode(" ", trim($txt),$n+1);
	if (count($words) > $n) {
		array_pop($words);
		$final = $after;
	}

	$res = "";
	foreach ($words as $word)
		$res .= $word . " ";

	$res = substr($res,0,-1);
	return $res . $final;
}
/*
targetpath : path from upload directory i.e slider/
filename : name of the input type=file field
pagename : name of the page on which to be redirected on error
fieldname : name of the field in database
*/
function image_upload($dir,$filename,$pagename,$fieldname){
	if (!is_dir(get_dir()."/".$dir)) {
		mkdir(get_dir()."/".$dir,0777,true);         
	}
	if ($_FILES[$filename]['name'] != '') {
		$extension = suffix($_FILES[$filename]['name']);
		$extension = strtolower($extension);
		$uni = uniqid();
		$extra_bit = ($_REQUEST['page']=="")?"":(strpos($pagename,"?"))?"&page=".$_REQUEST['page']:"?page=".$_REQUEST['page'];
		if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$name = $uni . '.' . $extension;
			$target_path = get_dir()."/".$dir . basename($name);
			if (move_uploaded_file($_FILES[$filename]['tmp_name'], $target_path)) {
			} else {
				$_SESSION['msg']=2;
				header("location:".$pagename.$extra_bit);
				die();
			}
		} else {
			$_SESSION['msg']=1;
			header("location:".$pagename.$extra_bit);
			die();
		}
		$icont[0] = "`".$fieldname."`,";
		$icont[1]="'".trim($dir,'/')."/$name',";
		$icont[2]= "`".$fieldname."`='".trim($dir,'/')."/$name',";
		return $icont;
	}
	return false;
}
function file_upload($dir,$filename,$pagename,$fieldname,$ext){
	if (!is_dir(get_dir()."/".$dir)) {
		mkdir(get_dir()."/".$dir,0777,true);         
	}
	if ($_FILES[$filename]['name'] != '') {
		$extension = suffix($_FILES[$filename]['name']);
		$extension = strtolower($extension);
		if($extension!=$ext){
			$_SESSION['msg-type']=$ext;
			header("location:".$pagename.$extra_bit);
			die();
		}
		$uni = uniqid();
		$extra_bit = ($_REQUEST['page']=="")?"":(strpos($pagename,"?"))?"&page=".$_REQUEST['page']:"?page=".$_REQUEST['page'];
		
		$name = $uni . '.' . $extension;
		$target_path = get_dir()."/".$dir . basename($name);
		if (move_uploaded_file($_FILES[$filename]['tmp_name'], $target_path)) {
		} else {
			$_SESSION['msg']=2;
			header("location:".$pagename.$extra_bit);
			die();
		}
		
		$icont[0] = "`".$fieldname."`,";
		$icont[1]="'".trim($dir,'/')."/$name',";
		$icont[2]= "`".$fieldname."`='".trim($dir,'/')."/$name',";
		return $icont;
	}
	return false;
}
function uniqueName($name){
	return trim(preg_replace('/[^a-zA-Z0-9]+/','-',strtolower($name)),'-');
}
function getcurrency($price, $currency){
	echo $currency." "	.$price;
}
function remove_dir($dir) {
	$files = glob( $dir . '*', GLOB_MARK );
	foreach( $files as $file ){
		if( substr( $file, -1 ) == '/' )
			remove_dir( $file );
		else
			unlink( $file );
	}
	rmdir( $dir );
}
function createZip($source, $destination)
{
	if (!extension_loaded('zip') || !file_exists($source)) {
		return false;
	}

	$zip = new ZipArchive();
	if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
		return false;
	}

    //$source = str_replace('\\', '/', realpath($source));

	if (is_dir($source) === true)
	{
		$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

		foreach ($files as $file)
		{
			$file = str_replace('\\', '/', $file);

            // Ignore "." and ".." folders
			if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
				continue;

            //$file = realpath($file);

			if (is_dir($file) === true)
			{
				$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
			}
			else if (is_file($file) === true)
			{
				$zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
			}
		}
	}
	else if (is_file($source) === true)
	{
		$zip->addFromString(basename($source), file_get_contents($source));
	}

	return $zip->close();
}

//function for generate csrf code for security purpose.
function generateCSRFToken() {
	$csrfkey = sha1(microtime());
	$_SESSION['csrf'] = $csrfkey;
}
function validateCSRFToken() {
	if(!isset($_SESSION['csrf']) || $_SESSION['csrf'] !== $_POST['csrf']) {        
		setErrorMessage("CSRF token mismatch!");
		header("location:".$_SERVER['REQUEST_URI']);
		exit;
	}
}
function alreadyLoggedinRedirect() {
	if(isset($_SESSION['store']) && $_SESSION['store']['id'] != '') {
		header("location:index.php");
		die();
	}
}
function alreadyLoggedinAdminRedirect() {
	if(isset($_SESSION['wadmin']) && $_SESSION['wadmin']['id'] != '') {
		header("location:index.php");
		die();
	}
}
function checkStoreLogin() {
	if(!isset($_SESSION['store']) || $_SESSION['store']['id'] == ''){
		header("location:login.php");
		die();
	}
}
function checkAdminLogin() {
	if(!isset($_SESSION['wadmin']) || $_SESSION['wadmin']['id'] == ''){
		header("location:login.php");
		die();
	}
}
function setErrorMessage($msg) {
	$_SESSION['err_msg'] = $msg;
}
function unsetErrorMessage() {
	unset($_SESSION['err_msg']);
}
function getErrorMessage() {
	return $_SESSION['err_msg'];
}
function checkErrorMessage() {
	if(isset($_SESSION['err_msg'])) {
		return 1;
	}
	return 0;
}
function setSuccessMessage($msg) {
	$_SESSION['suc_msg'] = $msg; 
}
function unsetSuccessMessage() {
	unset($_SESSION['suc_msg']);
}
function getSuccessMessage() {
	return $_SESSION['suc_msg'];
}
function checkSuccessMessage() {
	if(isset($_SESSION['suc_msg'])) {
		return 1;
	}
	return 0;
}

function generateKey($length = 6) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$string = '';

	for ($i = 0; $i < $length; $i++) {
		$string .= $characters[mt_rand(0, strlen($characters) - 1)];
	}

	return $string;
}

function send_mail($receiver, $subject ,$body, $sender="", $sender_name=""){
	global $db,$storeurl,$siteurl;
	
	include_once 'PHPMailer/PHPMailerAutoload.php';
	
	$subject = str_replace('{#webname#}','HIGH5 WEED',$subject);
	
	$html = getMailHeader();
	
	$html .= $body;
	
	$html .= getMailFooter();
	
	$html = str_replace('{#weburl#}',$siteurl,$html);
	
	$html = str_replace('{#webname#}','HIGH5 WEED',$html);
	
	if($sender=='')
		$sender = 'testineed@gmail.com';
	
	if($sender_name=='')
		$sender_name = "Hig5Weed";
	
	
		/*// To send HTML mail, you can set the Content-type header. 
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		//additional headers 
		$headers .= "To: ".$receiver."\r\n";
		$headers .= "From: ".$sender_name." <".$sender.">\r\n";
		$headers .= "X-Mailer: PHP/" . phpversion();
		
		//Header of mail
		if(mail($receiver,$subject,$html,$headers,"-f".$sender)){
			return 'success';
		}
		else{
			return "error";
		}*/
		
		//Create a new PHPMailer instance
		$mail = new PHPMailer();
		//Set who the message is to be sent from
		$mail->setFrom($sender, $sender_name);
		//Set who the message is to be sent to
		$mail->addAddress($receiver);
		//Set the subject line
		$mail->Subject = $subject;
		//Read an HTML message body from an external file, convert referenced images to embedded,
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
		
		$mail->msgHTML($html);
		
		//send the message, check for errors
		if (!$mail->send()) {
			return "error";
		} else {
			return "success";
		}
		

	}

	function getMailHeader(){
		return '<!DOCTYPE html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Mail Template</title>
		<style type="text/css">
		@import url(http://fonts.googleapis.com/css?family=Open+Sans);
		body{
			font-size:13px;	
			font-family: "Open Sans", sans-serif;
			margin:0px;
			padding:0px;
		}
		a,img{
			text-decoration:none;
			border:none;	
		}
		a{
			color:#4976a2;	
		}
		a:hover{
			color:#e67e22;	
		}
		p{
			margin:10px 0px;	
		}
		h1,h2,h3,h4,h5,h6{
			color:#215F96;
			margin:5px 0px;
			text-transform:uppercase;
		}
		table{
			border:1px solid #dee8f2;
			border-collapse:collapse;
			border-right:none;
			border-bottom:none;
		}
		td{
			border-right:1px solid #dee8f2;
		}
		tr{
			border-bottom:1px solid #dee8f2;
		}	
		</style>
		</head>
		<body>
		<div class="wrapper" style="width:100%;	max-width:800px; border:1px solid #2d3e50; border-radius:5px;">
		<div class="mail-logo" style="display:block; padding:10px; background:#2d3e50;">
		<a href="{#weburl#}"><img src="{#weburl#}assets/pages/img/weed-logo.png" alt="{#webname#}" /></a>
		<span style="font-size:40px; font-style:italic;	color:#FFF;	margin-top:25px; margin-right:10px;	float:right;">

		</span>
		</div>
		<div class="content" style="min-height:150px; display:block; padding:15px;">';
	}

	function getMailFooter(){
		return '</div>
		<div class="footer" style="display:block; color:#FFF; font-size:14px; padding:5px 10px;	background:#2d3e50">
		<p>&copy; Copyright {#webname#}</p>
		</div>
		</div>
		</body>
		</html>';
	}

	function getExtension($str){
		$i = strrpos($str,".");
		if (!$i) { return ""; } 

		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}

	function checkProdctStore($id) {
		global $db;
		$db->where("store_id",$_SESSION['store']['id']);
		$db->where("id",$id);
		$db->get("products");
		if($db->count <= 0) {
			setErrorMessage("Please select valid product!");
			header("location:product.php");
			exit;
		}
	}

	function uploadImage($fname,$ftmp,$fpath) {
		$img_name = "";
		$valid_formats=array("jpg","jpeg","png");
    //$store_id = $_SESSION['store']['id'];
		$ext = getExtension($fname);
		if(in_array(strtolower($ext),$valid_formats)){
        //if($_FILES['image']['size']<(1024*300)){
			$img_name = "wd_".time().rand(1,1000).".".$ext;                    
			if(move_uploaded_file($ftmp, $fpath.$img_name)){
				return array(
					'uploaded' => 1,
					'uploaded_name' => $img_name,
					'msg' => 'Success'
				);                            
			} else {
				return array(
					'uploaded' => 0,
					'uploaded_name' => '',
					'msg' => 'Error'
				); 
			}               
        //} else { }
		} else {        
			return array(
				'uploaded' => 0,
				'uploaded_name' => '',
				'msg' => 'Extension Error'
			);
		}  
	}

	function sendResponse($data) {    
		header('Content-Type: application/json');
		return json_encode($data);
	}

	function getStoreName($storeid) {
		global $db;
		$db->where("id",$storeid);
		$store = $db->getOne("store");
		return $store['name'];
	}

	function addAttributes($post_arr,$table,$prod_id) {
		global $db;
		for($i=0;$i<count($post_arr);$i++) {
			if($post_arr[$i]['attr_id']!="" && $post_arr[$i]['attr_txt']!="") {
				$attdata = Array (
					'product_id' => $prod_id,
					'attribute_id' => $post_arr[$i]['attr_id'],
					'attribute_text' => $post_arr[$i]['attr_txt']
				);
				$aid = $db->insert('product_attributes', $attdata);
			}
		}
	}

	function uploadProductImages($files,$postfilefield,$dbfield,$table,$path,$prod_id) {
		global $db;
		for($i=0;$i<count($files[$postfilefield]['name']);$i++) {
			if($files[$postfilefield]['name'][$i] != '') {                    
				$up_result = uploadImage($files[$postfilefield]['name'][$i],$files[$postfilefield]['tmp_name'][$i],$path);                    
				if($up_result['uploaded']) {
					$data1 = Array (
						'product_id' => $prod_id,
						$dbfield => $up_result['uploaded_name']
					);                        
					$imgid = $db->insert ($table, $data1);
				}
			}
		}
	}

	function getUserAddresses($userid) {
		global $db;
		$db->where("user_id",trim($userid));
		$db->where("status",'Deleted', "!=");    
		$addresses = $db->get ('user_address');  
		return $addresses;
	}

	function getOrderStatusClass($status) {
		$status_list = array(
			"Pending" => "info",
			"Inprocess" => "warning",
			"Completed" => "success",
			"Cancel" => "danger"
		); 
		return $status_list[$status];
	}
	function getDriverName($driver_id) {
		global $db;
		$db->where("id",$driver_id);
		$driver = $db->get("driver",Array(0,1),"name");
		return $driver[0]['name'];    
	}
	function getlatlng($zip) {
		$zip = urlencode($zip);
		$data = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$zip);
		$data = (array) json_decode($data);
		if($data["status"] == "OK") {
			$arr = array("lat"=>$data["results"][0]->geometry->location->lat,"lng"=>$data["results"][0]->geometry->location->lng);
		} else {
			$arr = null;
		}
		return $arr;
	}
	function getaddress($lat,$lng) {
		$data = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng");
		$data = (array)json_decode($data);
		if($data["status"] == 'OK') {
			return $data["results"][0]->formatted_address;
		} else {
			return null;
		}
	}
	function getStoreLatLng($store_id) {
		global $db;
		$db->where("id",$store_id);
		$store = $db->get("store", array(0,1),"latitude,longitude");
		return $store;
	}
	function checkDuplicateCartItem($user_id,$store_id,$product_id) {
		global $db;
		$db->where("store_id",$store_id);
		$db->where("user_id",$user_id);
		$db->where("product_id",$product_id);
		$cart = $db->getOne("cart");
		if($db->count > 0) {
			return 1;
		} 
		return 0;
	}
	function getUserCart($user_id) {
		global $db;
		$db->join("products p","c.product_id=p.id","LEFT");
		$db->join("type t","p.type_id=t.id","LEFT");
		$db->join("store s","c.store_id=s.id","LEFT");
    //$db->where("c.store_id",$store_id);    
		$db->where("c.user_id",$user_id);
		$cart = $db->get("cart c",null,"c.store_id,s.name as store_name,c.product_id,c.quantity as cart_quantity,p.quantity as total_quantity,p.name,p.type_id,t.name as type,t.color,p.price,p.image,CONCAT('".PRODUCT_IMG_URL."',p.`image`) AS `image_url`,s.latitude,s.longitude");
		$sub_total = 0;
		if($db->count > 0) {
			for($i=0;$i<count($cart);$i++) {            
				$db->join("attributes a", "pa.attribute_id=a.id", "LEFT");
				$db->where("pa.product_id",$cart[$i]['product_id']);
				$attributes = $db->get ('product_attributes pa',null,'a.name,pa.attribute_text,pa.attribute_id');
				$cart[$i]['attributes'] = $attributes;
				$sub_total += $cart[$i]['cart_quantity']*$cart[$i]['price'];
				$cart[$i]['sub_total'] = $sub_total;
			}
		}
		return $cart;
	}
	function checkDuplicateStoreCartItem($user_id,$store_id) {
		global $db;
		$db->where("store_id",$store_id,"!=");
		$db->where("user_id",$user_id);
		$cart = $db->getOne("cart");
		if($db->count > 0) {
			return 1;
		} 
		return 0;
	}
	function checkItemQuantityAvailable($product_id,$quantity) {
		global $db;
		$db->where("id",$product_id);
		$product = $db->get("products",array(0,1),"quantity");
		if($product[0]['quantity']<=0) {
			return 1;
		} else if($product[0]['quantity']<$quantity) {
			return 2;
		}
		return 0;    
	}
	function getUserItemDetail($product_id) {
		global $db;
		$db->join("type t","p.type_id=t.id","LEFT");
		$db->join("store s","p.store_id=s.id","LEFT");        
		$db->where("p.id",$product_id);
		$cart = $db->get("products p",array(0,1),"p.store_id,s.name as store_name,p.id as product_id,p.quantity as total_quantity,p.name,p.type_id,t.name as type,t.color,p.price,p.image,CONCAT('".PRODUCT_IMG_URL."',p.`image`) AS `image_url`,s.latitude,s.longitude");
		if($db->count > 0) {       
			$db->join("attributes a", "pa.attribute_id=a.id", "LEFT");
			$db->where("pa.product_id",$cart[0]['product_id']);
			$attributes = $db->get ('product_attributes pa',null,'a.name,pa.attribute_text,pa.attribute_id');
			$cart[0]['attributes'] = $attributes;        
		}
		return $cart;
	}
	function getDriverOrderRequest($order_id) {
		global $db;
		$dist = ',111.111 * DEGREES(ACOS(COS(RADIANS(dl.latitude))
    * COS(RADIANS(s.latitude))
    * COS(RADIANS(dl.longitude - s.longitude))
		+ SIN(RADIANS(dl.latitude))
    * SIN(RADIANS(s.latitude)))) AS store_distance';
		$dist1 = ',111.111 * DEGREES(ACOS(COS(RADIANS(o.delivery_latitude))
    * COS(RADIANS(s.latitude))
    * COS(RADIANS(o.delivery_longitude - s.longitude))
		+ SIN(RADIANS(o.delivery_latitude))
    * SIN(RADIANS(s.latitude)))) AS delivery_distance';

		$db->join("store s","o.store_id=s.id","LEFT");
		$db->join("driver d","o.driver_id=d.id","LEFT");
		$db->join("user u","o.user_id=u.id","LEFT");
		$db->join("driver_location dl","d.id=dl.driver_id","LEFT");        
		$db->where("o.id", $order_id); 
   //$db->where("o.status", 'Pending');
		$db->where("o.status", 'Inprocess');
		$orders = $db->get ("orders o",array(0,1),'o.id,o.order_code,o.user_id,o.driver_id,o.store_id,o.order_date,o.final_total,o.status,o.delivery_name,o.delivery_phone,o.delivery_address,o.delivery_latitude,o.delivery_longitude,d.name as driver_name,d.car_number,d.car_brand,d.mobile as driver_phone,dl.latitude as driver_latitude, dl.longitude as driver_longitude,dl.address as driver_address,s.latitude as store_latitude,s.longitude as store_longitude,s.address as store_address,s.owner as store_owner,s.name as store_name,s.image as store_image,u.image as user_image, CONCAT("'.USER_UPLOAD_URL.'",u.`image`) AS `user_image_url`,CONCAT("'.STORE_PROFILE_IMG_URL.'",s.`image`) AS `store_image_url`'.$dist.$dist1);
		if($db->count > 0) {
			$time =  ($orders[0]['store_distance']/50);
			$time = gmdate("H:i", $time*3600);
			$orders[0]['store_time'] = $time;

			$time =  ($orders[0]['delivery_distance']/50);
			$time = gmdate("H:i", $time*3600);
			$orders[0]['delivery_time'] = $time;

			return $orders;
		} else {
			return array();
		}
	}

	function usernotification($arr) {
		global $db,$sendcl;
		$user_id = $arr['user_id'];
		$text = $arr['text'];

		/* send notification */
		$db->where("user_id",$user_id);
		$db->where("device_token","","!=");
		$db->where("device_type","","!=");
		$user_device = $db->get ("user_device");
    //echo "<pre>"; print_r($user_device); exit;
		if($db->count > 0) {        
			for($i=0;$i<count($user_device);$i++) {
				$token = $user_device[$i]['device_token'];
				if($user_device[$i]['device_type']=="ios") {
               // $token = "30856d99cca28f793921f5c1602d092ae8fb4758c13904d15e56edecd30cee9b";
					$s = $sendcl->ios($token, $text,"100");
				} else if($user_device[$i]['device_type']=="Android") {
               // $token = "fbUz0ZVEJAY:APA91bFp231WS4vWGaMbMhQSYzGkkS8myfBqIbcFA-jApD6REsK0667Honq608dGO4By_5UA0nipWi1Tw6T2Ex3sF-PnKKbWlho5yGtVjecCDrtrOlnqDlUEnljX9RMetOFXd5malk06";
					$msg =  array("fulltext"=>$text,"type"=>"100");
					$sendcl->android($token,$msg);            
				}    

			}
		}
		/* end send noti */
	}

	function drivernotification($arr) {
		global $db,$sendcl;
		$driver_id = $arr['driver_id'];
		$text = $arr['text'];
		/* send notification */
		$db->where("driver_id",$driver_id);
		$db->where("device_token","","!=");
		$db->where("device_type","","!=");
		$user_device = $db->get ("driver_device");
    //echo "<pre>"; print_r($user_device); exit;
		if($db->count > 0) {        
			for($i=0;$i<count($user_device);$i++) {
				$token = $user_device[$i]['device_token'];
				if($user_device[$i]['device_type']=="ios") {
               // $token = "30856d99cca28f793921f5c1602d092ae8fb4758c13904d15e56edecd30cee9b";
					$s = $sendcl->iosdriver($token, $text,"100");
				} else if($user_device[$i]['device_type']=="Android") {
               // $token = "fbUz0ZVEJAY:APA91bFp231WS4vWGaMbMhQSYzGkkS8myfBqIbcFA-jApD6REsK0667Honq608dGO4By_5UA0nipWi1Tw6T2Ex3sF-PnKKbWlho5yGtVjecCDrtrOlnqDlUEnljX9RMetOFXd5malk06";
					$msg =  array("fulltext"=>$text,"type"=>"100");
					$sendcl->androiddriver($token,$msg);            
				}
			}
		}
		/* end send noti */
	}

	class Send {
		public function android($token, $msg) {
			$url = 'https://fcm.googleapis.com/fcm/send';
			$serverApiKey = "AIzaSyDtNd4Tfh0OozmdAb7kWWVyEyIa3GymxvE";
			$device = array($token);
        //$device = $token;

			if (!$device) {
				echo "Android send notification failed with error:";
				echo "\tNo devices set";
				return FALSE;
			}
			$fields = array(
				'registration_ids' => $device,
				'data' => $msg,
			);
			$headers = array(
				'Authorization: key=' . $serverApiKey,
				'Content-Type: application/json'
			);
        //print_r($fields);
        //die();
        // Open connection
			$ch = curl_init();
        //        // Set the url, number of POST vars, POST data
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        // Execute post
			$result = curl_exec($ch);
        //        // Close connection
			curl_close($ch);
			return $result;
		}

		public function androiddriver($token, $msg) {
			$url = 'https://fcm.googleapis.com/fcm/send';
			$serverApiKey = "AIzaSyDuGth7vYzxKeBQwUfx3Zq6F8COz1Q_6Hs";
			$device = array($token);
        //$device = $token;

			if (!$device) {
				echo "Android send notification failed with error:";
				echo "\tNo devices set";
				return FALSE;
			}
			$fields = array(
				'registration_ids' => $device,
				'data' => $msg,
			);
			$headers = array(
				'Authorization: key=' . $serverApiKey,
				'Content-Type: application/json'
			);
        //print_r($fields);
        //die();
        // Open connection
			$ch = curl_init();
        //        // Set the url, number of POST vars, POST data
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        // Execute post
			$result = curl_exec($ch);
        //        // Close connection
			curl_close($ch);
			return $result;
		}

		public function ios($token, $alert = "Test", $custom_value, $badge = "1", $sound = "default", $custom_key = "info") {
			$environment = APPMODE;
			if ($environment == 'development') {
				$config["cert"] = __DIR__ . "/iospush/pushcert_dev.pem";
            //$config["pass"] = "test1234";
				$config["pass"] = "";
				$config["env"] = "development";
			} else {
				$config["cert"] = __DIR__ . "/iospush/pushcert.pem";
            //$config["pass"] = "test1234";
				$config["pass"] = "test1234";
				$config["env"] = "live";
			}
			$token = str_replace(" ", "", $token);

			$token = pack('H*', $token);
			$certFile = $config['cert'];
			$certPass = $config['pass'];
			$push_method = $config['env'];
			$tmp = array();
			if ($alert) {
				$tmp['alert'] = $alert;
			}
			if ($badge) {
				$tmp['badge'] = $badge;
			}
			if ($sound) {
				$tmp['sound'] = $sound;
			}
			$body['aps'] = $tmp;
			$body[$custom_key] = $custom_value;
			$ctx = stream_context_create();
			stream_context_set_option($ctx, 'ssl', 'local_cert', $certFile);
			stream_context_set_option($ctx, 'ssl', 'passphrase', $certPass);

			if ($push_method == 'development')
				$ssl_gateway_url = 'ssl://gateway.sandbox.push.apple.com:2195';
			else if ($push_method == 'live')
				$ssl_gateway_url = 'ssl://gateway.push.apple.com:2195';

			if (isset($certFile) && isset($ssl_gateway_url)) {
				$fp = stream_socket_client($ssl_gateway_url, $err, $errstr, 60, STREAM_CLIENT_CONNECT, $ctx);
			}
			if (!$fp) {
				print "Connection failed $err $errstr\n";
				return FALSE;
			}
			$payload = json_encode($body);
			$msg = chr(0) . chr(0) . chr(32) . $token . chr(0) . chr(strlen($payload)) . $payload;
			fwrite($fp, $msg);
			fclose($fp);
			return true;
		}
		public function iosdriver($token, $alert = "Test", $custom_value, $badge = "1", $sound = "default", $custom_key = "info") {
			$environment = APPMODE;
			if ($environment == 'development') {
				$config["cert"] = __DIR__ . "/iospush/pushcertDriver_dev.pem";
            //$config["pass"] = "test1234";
				$config["pass"] = "";
				$config["env"] = "development";
			} else {
				$config["cert"] = __DIR__ . "/iospush/pushcertDriver.pem";
            //$config["pass"] = "test1234";
				$config["pass"] = "test1234";
				$config["env"] = "live";
			}
			$token = str_replace(" ", "", $token);

			$token = pack('H*', $token);
			$certFile = $config['cert'];
			$certPass = $config['pass'];
			$push_method = $config['env'];
			$tmp = array();
			if ($alert) {
				$tmp['alert'] = $alert;
			}
			if ($badge) {
				$tmp['badge'] = $badge;
			}
			if ($sound) {
				$tmp['sound'] = $sound;
			}
			$body['aps'] = $tmp;
			$body[$custom_key] = $custom_value;
			$ctx = stream_context_create();
			stream_context_set_option($ctx, 'ssl', 'local_cert', $certFile);
			stream_context_set_option($ctx, 'ssl', 'passphrase', $certPass);

			if ($push_method == 'development')
				$ssl_gateway_url = 'ssl://gateway.sandbox.push.apple.com:2195';
			else if ($push_method == 'live')
				$ssl_gateway_url = 'ssl://gateway.push.apple.com:2195';

			if (isset($certFile) && isset($ssl_gateway_url)) {
				$fp = stream_socket_client($ssl_gateway_url, $err, $errstr, 60, STREAM_CLIENT_CONNECT, $ctx);
			}
			if (!$fp) {
				print "Connection failed $err $errstr\n";
				return FALSE;
			}
			$payload = json_encode($body);
			$msg = chr(0) . chr(0) . chr(32) . $token . chr(0) . chr(strlen($payload)) . $payload;
			fwrite($fp, $msg);
			fclose($fp);
			return true;
		}
	}
	?>