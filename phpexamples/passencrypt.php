<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * Note that the salt here is randomly generated.
 */

 //The higher the cost the more processing power and higher the hashing
$options = [
    'cost' => 10,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];

$pass = 'andrei';
//Generate Random password hash from password
$hash = password_hash($pass, PASSWORD_BCRYPT, $options);

echo $hash.'this is the hash<br>';

if (password_verify('andrei', $hash)) {
    echo 'Password is valid!';


} else {
    echo 'Invalid password.';
}


?>