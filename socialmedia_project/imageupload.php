<?php
/*
$user = $_SESSION['usr'];
$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";

*/
 // move_uploaded_file($file_loc,$folder.$file);



/*
UPDATE shopping_cart SET price = 
    (SELECT price FROM products WHERE id = shopping_cart.product_id)*/

	
	
//Comments Picture	Query
//$sqlprofileCom= "UPDATE comments SET file='{$file}',type='{$file_type}',size='{$file_size}' WHERE usr='{$user}'";
	$sqlprofileCom= "UPDATE comments SET file='hellothere'";

//Comment Picture Error Testing
if ($mysqli->query($sqlprofileCom) === TRUE ) {
    echo 'Comment Picture Updated';
}else{
	
	 echo 'Error: ' . $sqlprofileCom . '<br>' . $mysqli->error;
	
}

?>