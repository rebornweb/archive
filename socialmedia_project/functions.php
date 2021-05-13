<?php


if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

class socialMedia{


	



public function checkEmail($str)
{
	
	return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
}


public function send_mail($from,$to,$subject,$body)
{
	$headers = '';
	$headers .= "From: $from\n";
	$headers .= "Reply-to: $from\n";
	$headers .= "Return-Path: $from\n";
	$headers .= "Message-ID: <" . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . ">\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Date: " . date('r', time()) . "\n";

	mail($to,$subject,$body,$headers);
}


public function profilePic(){
require 'connect.php';
 $userCom = $_SESSION['usr'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
	
$sqlProfile = "SELECT * FROM profile WHERE usr='{$userCom}' ORDER BY  ABS(DATEDIFF(NOW(), `dt`)) LIMIT 1 ";
	
$resultProfile = mysqli_query($mysqli, $sqlProfile);

while( $row = mysqli_fetch_assoc( $resultProfile ))
{
$imageBase = "uploads/";
$image = $row['file'];

 
echo   '<div class="profilePic"><img src="'.$imageBase.$image.'" width="200"/></div>';
      
 }
	
}

 
 public function commentsProfile(){
require 'connect.php';
$userCom = $_SESSION['usr'];
	$sqlquery= "SELECT usr,comment,time,likes,dislikes FROM comments
WHERE usr='{$userCom}' ORDER BY  ABS(DATEDIFF(NOW(), `time`))";




if ($result = mysqli_query($mysqli, $sqlquery)) {
	
while ($row = mysqli_fetch_assoc($result)) {
		$timestamp = $row["time"];
        echo ('User:'.$row['usr'].'<br><div class="comment">Said:'.$row["comment"].'</div><div class="timestamp">'.$timestamp.'</div><br>');
    
	}
	
	}else if ($mysqli->query($sqlquery) === TRUE) {
    echo "sql worked";
	} else {
 
    echo "Error: " . $sqlquery . "<br>" . $mysqli->error;


}
	


 }//End commentProfile        

 
 public function commentsHome(){
	require'connect.php';
	
	//$sql="SELECT usr FROM comments   ";
	//
//$sql="SELECT usr FROM comments LIMIT 1  ";
$sql = "SELECT usr,comment,time,likes,dislikes FROM comments ORDER BY  ABS(DATEDIFF(NOW(), `time`))";
// Execute multi query
if ($mysqli->multi_query($sql)) {
    do {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_assoc()) {
                $timestamp = $row["time"];
				$userComments =	$row['usr'];
				 $imageBase = "uploads/";
			
				
     // printf("%s\n",$row['usr']);
         $sqlProfile = "SELECT * FROM profile WHERE usr='{$userComments}' ORDER BY  ABS(DATEDIFF(NOW(), `dt`)) LIMIT 1 ";
		    $resultPic = $mysqli->query($sqlProfile);
			$rowP = $resultPic->fetch_assoc();
				$image = $rowP['file'];
		echo   '<div class="profilePic"><img src="'.$imageBase.$image.'" width="200"/></div><br>';
	    echo ('User:'.$userComments.'<br><div class="comment">Said:'.$row["comment"].'</div><div class="timestamp">'.$timestamp.'</div><br>');
         

			
			}
            $result->free();
        
		}
        /* print divider */
        if ($mysqli->more_results()) {
            echo '<br>';
        }
    
	}
	while ($mysqli->next_result());

	}else if ($mysqli->query($sql) === TRUE) {
    echo "sql worked";

	
	} else {
 
    echo "Error: " . $sql . "<br>" . $mysqli->error;


	}


}//End commentsHome
 
 
 
 
   public function commentsPic(){
require 'connect.php';
		
	$userCom = $_SESSION['usr'];

	  $query ="SELECT * FROM comments ORDER BY  ABS(DATEDIFF(NOW(), `time`))";


if ($result = mysqli_query($mysqli, $query)) {
	
while ($row = mysqli_fetch_assoc($result)) {
		$timestamp = $row["time"];

      
        echo ('User:'.$row['usr'].'<br><div class="comment">Said:'.$row["comment"].'</div><div class="timestamp">'.$timestamp.'</div><br>');


    
	}
	
	}else if ($mysqli->query($query) === TRUE) {
    echo "sql worked";
} else {
 
    echo "Error: " . $query . "<br>" . $mysqli->error;


}
	


 }//End commentsHome
 
 
 public function restartPassword(){
	require 'connect.php';
	
	$email = mysqli_real_escape_string($mysqli,$_POST['email']);
	
	
	
$query = "SELECT * FROM tz_members WHERE email='{$email}'";
   
   

 

	if ($result = mysqli_query($mysqli, $query)) {

    /* Decrypt Password*/
    while ($row = mysqli_fetch_assoc($result)) {
	  $pass_decrypt = mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$key,$row["pass"], MCRYPT_MODE_ECB, $iv);
       echo ('Email:'.$row['email'].'<br><div>Password:'.$pass_decrypt.'</div><div>Password Encrypted:'.$row["pass"].'</div><br>');
    
	}
	
	}
 
	
	} //End restartPassword
 
 
}//End Class

$func = new socialMedia();

    /*Public class
        if (is_a($me, 'Person')) {
          echo "I'm a person, ";
        }
        //Constructor
        if (property_exists($me, 'name')) {
          echo "I have a name, ";
        }
        //Public Function
        if (method_exists($me, 'dance')) {
          echo "and I know how to dance!";
                echo $me->dance();
        }*/
?>