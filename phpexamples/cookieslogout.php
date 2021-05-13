 <?php
 //Logout will delete cookies
 echo "Cookies are deleted You are Logged Out";
 $past = time() - 10; 
 //this makes the time 10 seconds ago 
 setcookie(AboutVisit, date("F jS - g:i a"), $past);
 
 ?>