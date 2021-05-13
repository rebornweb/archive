<?php

if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

// Database config 

$db_host		= 'localhost';
$db_user		= 'rootoruser';
$db_pass		= 'password';
$db_database	= 'DatabaseName'; 


		//Encrypt two way password 
$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
$key = "ThisisSecret007";		
	

$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_database);



/* End config */

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL; " . mysqli_connect_error();
  
  }



 

mysqli_select_db($connection,$db_database);

//mysqli_close($connection);

?>