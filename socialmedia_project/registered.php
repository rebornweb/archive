<?php

define('INCLUDE_CHECK',true);

require 'connect.php';
require 'functions.php';
session_name('tzLogin');
session_set_cookie_params(2*7*24*60*60);
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ALL);


if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location: index.php");
	exit;
}



?>

<!DOCTYPE html >
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Socialmedia Project - Rebornweb.co.nz</title>
    
	
<?php include 'includes/globalhead.php'; ?>

    
</head>

<body>
<!-- Panel -->


<?php include 'includes/navigation.php'; ?>

<section class='content'>

  

      <article class="content">
    <div class="container">
      <h1>Registered Users Only!</h1>
    <h2>Login to view this resource!</h2>
    <?php
	if($_SESSION['id']){
	//If Logged In 
	
	echo '<h1>Hello, '.'<span id="user">'.$_SESSION['usr'].'</span>'.'! You are registered and logged in!</h1>';
	
		//Leave a Comment
	if($_POST['submit']=='Comment')
     {
	  //Comment form is submitted
	  
	
	  
	  
	  
	  
	  
	  $err = array();
	
		
	  if(!count($err))
	{
		//Error testing Started
		

	$precomment = mysqli_real_escape_string($mysqli,$_POST['comment']);
   
    mysqli_real_escape_string($mysqli,$_POST['comment']);
    $likes = mysqli_real_escape_string($mysqli,$_POST['likes']);
	$dislikes =  mysqli_real_escape_string($mysqli,$_POST['dislikes']);
		
	$comment = strip_tags($precomment);
   
   $user = $_SESSION['usr'];
	$timestamp = mysqli_real_escape_string($mysqli,$_POST['timestamp']);           // March 10, 5:16 pm

    $sql = "	INSERT INTO comments(usr,comment,time,likes,dislikes)
						VALUES(
							'".$user."',
							'".$comment."',
							'".$timestamp."',
							'".$likes."',
							'".$dislikes."'
						
							
							
						)";
 

if ($mysqli->query($sql) === TRUE) {
    echo "Comment Updated";
} else {
 
    echo "Error: " . $sql . "<br>" . $mysqli->error;


}
 
  
  
	  //Error testing Finished
	 }else{ $err[]='There is comment form error';}
	
	
	 
	 
	 
	 
	 
	 //End Comment Form Submitted
	 }else {echo "Logged in";} 
	
	
	
	
	
	
	
	//End Login Form Submitted otherwise Register and Login
	}else{ echo '<h1>Please, <a href="index.php">login</a> and come back later!</h1>';}
    


	

	
	
	?>
	
	<?php
// Show all Comments Order By Time

	if(method_exists($func, 'commentsHome')){


//This Echos out the commentsin Profile OOP
 echo $func->commentsHome();


		}	


?>
	
    <form name="commentForm"  action="" method="post" onsubmit="return checkForm(this);">
			
			<label class="grey" for="comment">Comment:</label>
	        <textarea name="comment" class="comment" cols='20' rows='5'  value="Leave a Line" ></textarea>
        	<div class="clear"></div>
			<input name="timestamp" id="timestamp" type="text" value="<?php echo  date("F j,g:i a"); ?>" style='display:none'/>
			
			<input type="submit" name="submit" value="Comment" class="bt_login" />
		</form>
	
	
	  </article>
    

</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>
