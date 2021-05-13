<?php

//only will work on a online server
 $to = "andrei.nicolas@hotmail.com"; 
 $subject = "Contact Us"; 
 $email = $_REQUEST['email']; 
 $message = $_REQUEST['message']; 
 $headers = "From: $email"; 
 $sent = mail($to, $subject, $message, $headers); 
 
 if($sent){
  echo "Your mail was sent successfully";
  }else{
   echo"We encountered an error sending your mail";
   }
 
 ?> 