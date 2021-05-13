<?php
/*Restart Password Page*/
define('INCLUDE_CHECK',true);

require 'connect.php';
require 'functions.php';
session_name('tzLogin');
session_set_cookie_params(2*7*24*60*60);
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ALL);


?>

<!DOCTYPE html >
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Socialmedia Project - Rebornweb.co.nz - Password Restart Page</title>
    
	
<?php include 'includes/globalhead.php'; ?>

    
</head>

<body>
<!-- Panel -->


<?php include 'includes/navigation.php'; ?>

<section class='content'>

  

      <article class="content">
    <div class="container">
      <h1>Registered Users Only!</h1>
    <h2> Password Restart Page</h2>
	<p>Enter in email to restart password</p>
    <?php
	
	
		//Leave a Comment
	if($_POST['submit']=='Restart')
     {
	  //Restart form is submitted
	  
	
	  
	  
	  $err = array();
	
		
	  if(!count($err))
	{
		//Error testing Started
		
		
		if(method_exists($func,'restartPassword')){
			
		echo $func->restartPassword();	
			
	  }

      

  
  
	  //Error testing Finished
	 }else{ $err[]='There is comment form error';}
	
	
	 
	 
	 
	 
	 
	 //End Comment Form Submitted
	 }
	
	
	
	
	
	
	


	

	
	
	?>
	

    <form action="" method="post">
			
			<label class="grey" for="Email"> Email:</label>
	       
			
			<input type="text" name="email" value="email" />
			<input type="submit" name="submit" value="Restart" />
		</form>
	
	
	  </article>
    

</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>
