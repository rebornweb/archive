<?php
$username = $_POST['email'];
$password = $_POST['password'];

$connection = connection();

$username = mysql_real_escape_string($username);
$password = encryptIt(mysql_real_escape_string($_POST['password']));

$query = "SELECT  EmailID,Password
          FROM User
          WHERE EmailID = '".$username."' AND Password = '".$password."' ";

          
?>