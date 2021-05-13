<?php
 
    
$file = file_get_contents('data.json');
$data = json_decode($file);
unset($file);//prevent memory leaks for large json.
//insert data here


 $amount      = $_POST["amount"];
    $firstName   = $_POST["firstName"];
    $lastName    = $_POST["lastName"];
    $email       = $_POST["email"];
    if(isset($amount)){
        $data = array(
            "amount"     => $amount,
            "firstName"  => $firstName,
            "lastName"   => $lastName,
            "email"      => $email
        );
     

      
//save the file
 $result = file_put_contents('data.json',json_encode($data),FILE_APPEND);
unset($data);//release memory
if($result == true) {
    echo "Data is saved";
} else {
    echo "false";
}
/*    
      $file = fopen('data.json', 'w+');
    fwrite($file, $data);
    fclose($file);

    */
    }

    
    ?>