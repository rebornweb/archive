
<?php
class MyClass
{
    public $var1 = 'Andrei';
    public $var2 = 'Katrina';
    public $var3 = 'Simba';

   // protected $protected = 'protected var';
   // private   $private   = 'private var';

    function iterateVisible() {
       echo "MyClass: iterateVisible\n";
       foreach($this as $key => $value) {
           print "$key => $value\n";
       }
    }
}

$class = new MyClass();
/*
foreach($class as $key => $value) {
    print "$key => $value\n";
}
echo "\n";
*/

$class->iterateVisible();

?>
