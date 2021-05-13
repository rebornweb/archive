<!DOCTYPE html>
<html>
  <head>
    <title>Class and Object Methods</title>
  </head>
  <body>
    <p>
      <?php
        class Person {
        public $isAlive = true;
      
           function __construct($name) {
              $this->name = $name;
          }
          
          public function dance() {
          while($x <= 5) {
    echo "The number is: $x <br>";
    $x++;
} 
          }
        }
        
        $me = new Person('Shane');
        //Public class
        if (is_a($me, 'Person')) {
          echo "I'm a person, ";
        }
        //Constructor
        if (property_exists($me, 'name')) {
          echo "I have a name, ";
        }
        //Public Function
        if (method_exists($me, 'dance')) {
          //echo "and I know how to dance!";
        echo $me->dance();
      
        }
      ?>
    </p>
  </body>
</html>