<?php
include(__DIR__ . "/../system/config.inc.php");
//error_reporting(0);
$token = "";
$text = "Hi, This is test notification";
//$sendcl->ios($token, $text);

$token = "ccFfMvy8dog:APA91bEG6ggQXiAV0kBMQeOksuWCkz1KJea_AkX8nuJIFA-NNQ1uXfFnhOK-BTRO0hn-UTbBrkrZdGHGSBlHZpRUGEMTEFsKUQBFjARS_sdAOSWo7afD5Okn7t0_ITLbXE1iwrD6ltwt";
$msg =  array("fulltext"=>$text);
$res = $sendcl->android($token,$msg);
print_r($res);
$token = "dXli27tJVbI:APA91bFewG_abBCnvgFo3iyinSRa0IrgS7VpK7NLdL-lyE7DuOlXayPV6CigttlLCFBsponUBJCPnI7tD-P8_7YwskRVFAaOrFZwjvdjp3_AvfoZU30Bg5HNAJcSY7vML2o6oseYwXQ0";
$msg1 =  array("fulltext"=>"Hi, This is test notification driver");
$res1 = $sendcl->androiddriver($token,$msg1);
print_r($res1); exit;