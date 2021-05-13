<?php
$message = 'phpBB3 is the one that rules them all.';
$_POST['wang'] = 'wangwang';
// The Caesar shift, implemented in Rot13
// This isn't considered "true encryption" today due to its simplicity, but it shows how encryption works
// This implementation shifts by 13 characters
$rot13 = str_rot13($message);
$rot13_decrypt = str_rot13($rot13);

// Rijndael 256, a popular encryption method
// Below code taken from http://us3.php.net/manual/en/function.mcrypt-encrypt.php
$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
$key = "This is a very secret key";
$rijndael256 = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $_POST['wang'], MCRYPT_MODE_ECB, $iv);
$rijndael256_decrypt = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $rijndael256, MCRYPT_MODE_ECB, $iv);

// Output the message
echo('<strong>The message</strong>' . "<br />");
echo($message . "<br /><br />");

// Output the key
echo('<strong>The key</strong>' . "<br />");
echo($key . "<br /><br />");

// Output the encrypted text
echo('<strong>Encrypted text</strong>' . "<br />");
echo('<em>Rot13:</em> ' . $rot13 . "<br />");
echo('<em>Rijndael 256:</em> ' . $rijndael256 . "<br /><br />");

// Output the decrypted text
echo('<strong>Decrypted text</strong>' . "<br />");
echo('<em>Rot13:</em> ' . $rot13_decrypt . "<br />");
echo('<em>Rijndael 256:</em> ' . $rijndael256_decrypt . "<br /><br />");

?>