<?php

session_name('tzLogin');
session_set_cookie_params(2*7*24*60*60);
session_start();
?>

<!DOCTYPE html >
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Socialmedia Project - Rebornweb.co.nz</title>
    
	<?php 'includes/globalhead.php';?>

    
</head>

<body>

<?php 'includes/navigation.php'; ?>

<section class='content'>

  

      <article class="content">
    <div class="container">
      <h1>Registered Users Only!</h1>
    <h2>Login to view this resource!</h2>
    <?php
	if($_SESSION['id'])
	echo '<h1>Hello, '.'<span id="user">'.$_SESSION['usr'].'</span>'.'! You are registered and logged in!</h1>';
	else echo '<h1>Please, <a href="index.php">login</a> and come back later!</h1>';
    ?>
    
	
	
	
	  </article>
    

</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>
