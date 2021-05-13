<article>
	<?php
	//Profile Pic
	if($_POST['submit']=='Profile'){
			  
	  $err = array();
	
		
	  if(!count($err))
	{
		//No Errors
		
$user = $_SESSION['usr'];
$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
  move_uploaded_file($file_loc,$folder.$file);

  $_SESSION['file'] = rand(1000,100000)."-".$_FILES['file']['name'];
  $_SESSION['filetype'] = $_FILES['file']['type'];
  $_SESSION['filesize']= $file_size = $_FILES['file']['size'];

$sqlprofile = "INSERT INTO profile (file,type,size,usr,dt)
VALUES ('{$file}', '{$file_type}','{$file_size}','{$user}',NOW())";
/*
UPDATE shopping_cart SET price = 
    (SELECT price FROM products WHERE id = shopping_cart.product_id)*/

	
	
//Comments Picture	Query
$sqlprofileCom= "UPDATE comments SET file='{$file}',type='{$file_type}',size='{$file_size}' WHERE usr='{$user}'";
	
	if ($mysqli->query($sqlprofile) === TRUE) {
    echo 'Profile Picture Updated';



	
}else{
	
	 echo 'Error: ' . $sqlprofile . '<br>' . $mysqli->error;
	
}

//Comment Picture Error Testing
if ($mysqli->query($sqlprofileCom) === TRUE ) {
    echo 'Comment Picture Updated';
}else{
	
	 echo 'Error: ' . $sqlprofileCom . '<br>' . $mysqli->error;
	
}


	
	
	}//End Error testing
	
	
}//End Profile Pic	
	
	
	
	
	//Member comments
	
			//Leave a Comment
	if($_POST['submit']=='Comment')
     {
	  //Comment form is submitted
	  
	
	 
	  $err = array();
	//Error Testing Started
	/*
	if(){
	
	$err[]='Your username contains invalid characters!';	
	}
	*/
	
	//Error testing finished
		
	  if(!count($err))
	{
		// If there are no errors
		
		// require 'imageupload.php';
		


	$precomment = mysqli_real_escape_string($mysqli,$_POST['comment']);
   
    mysqli_real_escape_string($mysqli,$_POST['comment']);
    $likes = mysqli_real_escape_string($mysqli,$_POST['likes']);
	$dislikes =  mysqli_real_escape_string($mysqli,$_POST['dislikes']);
		
	$comment = strip_tags($precomment);
   
   $userCom = $_SESSION['usr'];
	$timestamp = mysqli_real_escape_string($mysqli,$_POST['timestamp']);           // March 10, 5:16 pm

	 $regIp =  $_SERVER['REMOTE_ADDR'];

	// $sqlprofileCom= "UPDATE comments SET file='{$files}',type='{$filetype}',size='{$filesize}' WHERE usr='{$user}'";
    $sqlcom = "	INSERT INTO comments(usr,comment,time,likes,dislikes,regIp)
						VALUES(
							'{$userCom}',
							'{$comment}',
							'{$timestamp}',
							'{$likes}',
							'{$dislikes}',
							'{$regIp}'
						
							
							
						)";
 
 

if ($mysqli->query($sqlcom) === TRUE) {
    echo "Comment Updated";
	//require 'imageupload';
	
} else {
 
    echo "Error: " . $sqlcom . "<br>" . $mysqli->error;


}

/*
 *Do you remember like forever ago,
 *when you fell over at the tree trunk at winter camp and i caught you?
 */
  
	

}


	
}//Comment Form finished	
	?>
	
	
	
</article>

<?php

	
		if(method_exists($func, 'commentsProfile')){

	
//This Echos out the commentsin Profile OOP
 echo $func->commentsProfile();


		}	
	


		

?>




    <!-- This is for Profile Picture-->
<?php
if(method_exists($func, 'profilePic')){

	
//This Echos out the commentsin Profile OOP
 echo $func->profilePic();


		}	
	
?>


<form action="" method="post" name="Profile" enctype="multipart/form-data">
<input type="file" name="file" />
<button type="submit" Value="Profile" name="submit" >upload</button>
</form >

	<form name="commentForm" action="" method="post" onsubmit="return checkForm(this);">
			
			<label class="grey" for="comment">Comment:</label>
	        <textarea name="comment" class="comment" cols='20' rows='5'  value="Leave a Line" ></textarea>
        	<div class="clear"></div>
			<input name="timestamp" id="timestamp" type="text" value="<?php echo  date("F j,g:i a"); ?>" style='display:none'/>
			
			<input type="submit" name="submit" value="Comment" class="bt_login" />
		</form>
	
	
	

	 