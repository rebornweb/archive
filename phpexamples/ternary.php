<?php
//Ternary Smooth Operator
   
    $agestr = ($age == null) ? 'child' : 'adult';
echo $agestr;

echo'<br>';

//xor if either two operands/objects are True, but not both
$wang =true;
$falsy=false;
if($wang xor $falsy){
    echo'true';
}else{
 echo'false';   
    
}

/* Can set this
    if ($age < 16) {
        $agestr = 'child';
    } else {
        $agestr = 'adult';
    }


*/

?>