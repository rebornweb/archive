<?php 
 /*Cookies needs to be set in the Header
 
 Cookies need to be set in the header. This means they must be sent
before
any HTML is set to the page, or they will not work.
 */
 $Month = 2592000 + time(); 
 //this adds 30 days to the current time 
 setcookie('AboutVisit', date("F jS - g:i a"), $Month);
 
 
 
 //Welcome back 
 
 if(isset($_COOKIE['AboutVisit'])){
$Last = $_COOKIE['AboutVisit'];

echo "Welcome back Chewbacka <br> You Last Visited on".$Last;
 
 }else{
 echo "Welcome to our site ";
 
 }
 

 
 
 ?> 