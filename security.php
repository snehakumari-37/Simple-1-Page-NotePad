<?php
//whether ip is from share internet
function ip(){
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
return $ip_address;
}
$ip = ip();
$allow = false;
$good = array("103.164.46.160","::1"); // ::1 in LOCALHOST
foreach($good as $i){ 
    if($i == $ip){
        $allow = true;
    }
}
if(!$allow){
die("<h1>SORRY!!<br>THIS WEBSITE IS NOT AVAILABLE!!</h1>");
}
?>