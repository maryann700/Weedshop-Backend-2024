<?php

################################################################
#		Common Function
##################################################################

function check_input_db($value)
{
		
	$value=htmlspecialchars($value, ENT_QUOTES);
	$value = addslashes($value);
	
	// Quote if not a number
	if (!is_numeric($value))
	{
		 $value = "'" . mysql_real_escape_string($value) . "'";
	}
	
	return trim($value);
}
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

// FUNCTION FOR CHECKING ACTIONS OF FORM
function actionfrmcheck($var="",$val="")
{
	//echo $_REQUEST[$var]."$var-->$val";
	if( isset($_REQUEST[$var])  && ($_REQUEST[$var]!="") &&  ($_REQUEST[$var]==$val) )
	{
		return true;
	}
	else
	{
		return false;
	}
}

//FUNCTION FOR THE PER PAGE ROW DISPLAY DROP DOWN CREATE
function drpdown_display($maxval)
{
	echo " <select name='sltpage' onChange='this.form.submit();'>";
	//echo "<option value=0>Select</option>";
	if(actionfrmcheckrm('sltpage') )
	{
			$tmppage=$_REQUEST['sltpage'];								
	}
	for($i=0;$i<$maxval;$i=$i+ DRPPG )
	{
		$slted="";
		if($tmppage==$i)
		{
			$slted=" Selected";
		}
		
		if($i==0)
		{
			echo "<option value=".$i." $slted >".All."</option>";
		}
		else
		{
			echo "<option value=".$i." $slted >".$i."</option>";
		}
	}
	echo "</select>";
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

//to check put ? or &
function checkurlconnecter(){;
	$level1=explode ("/",$_SERVER['REQUEST_URI']);
    $level2=end($level1);
	$level3=explode ("?",$level2);
	if(count($level3)>1) {
		return "&";
	} else {
		return "?";
	}
}
//check connecter of msg
function checkurlconnectergiven($url){;
	$level1=explode ("/",$url);
    $level2=end($level1);
	$level3=explode ("?",$level2);
	if(count($level3)>1) {
		return "&";
	} else {
		return "?";
	}
}

//get all data after ?
function Getalldataafter(){;
	$level1=explode ("/",$_SERVER['REQUEST_URI']);
    $level2=end($level1);
	$level3=explode ("?",$level2);
	return $level3[1];
}


function Removemsg($msg){
	//wrightdown which you want to remove 
	$string =$msg;
	$pattern = '([m][s][g][=]\w*[&]*)';
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

function Removepage($msg){
	//wrightdown which you want to remove 
	$string =$msg;
	$pattern = '([p][a][g][e][=]\w*[&]*)';
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


function Removeid($msg){
	//wrightdown which you want to remove 
	$string =$msg;
	$pattern = '([i][d][=]\w*[&]*)';
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


function Removecateid($msg){
	//wrightdown which you want to remove 
	$string =$msg;
	$pattern = '([c][a][t][e][=]\w*[&]*)';
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
    if(isset($_SESSION['store'])) {
	header("location:index.php");
	die();
    }
}
function checkStoreLogin() {
    if(!isset($_SESSION['store'])){
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
        $img_name = "pr_".time().rand(1,1000).".".$ext;                    
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
?>