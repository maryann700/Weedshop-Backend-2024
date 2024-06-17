<?php
// Dashboard file created by Mehul Sonagara # 17/3/2017

ob_end_clean();
ignore_user_abort();
ob_start();
header("Connection: close");
header("Content-Length: " . ob_get_length());
ob_end_flush();
flush();

function do_stuff($i){

  // do something
  $body = date("H:i:s")."HI \n";
  //mail("mech@demo.com","Test Curl","$body");
  $fp = fopen("write.txt","a");
  fwrite($fp, $body);
  fclose($fp);
  
    $i++;        

 sleep(10); // wait 20 seconds
 if($i<=3)
    do_stuff($i); // call this function again
}
do_stuff(0);