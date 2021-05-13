<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

class person {
    var $name;
    
    function __construct($persons_name) {		
			$this->name = $persons_name;		
		}
        /*Depreciated for now
function set_name($new_name) { 
			$this->name = $new_name;  
 		}*/

   		function get_name() {
			return $this->name;
		}
    
        
}//End class

//Child class of person inheritance
	class employee extends person 
	{
        
        
		protected function set_name($new_name) {
		if ($new_name ==  "Andrei") {
			$this->name = $new_name;
		}
	 	else if ($new_name ==  "Johnny Bravo") {
			//person::set_name($new_name);//Access base parent class
            //parent::set_name($new_name);	
		} 
	}
 
	function __construct($employee_name) 
	{
		$this->set_name($employee_name);
	}

    
}
    //private function get_pinn_number(){
	//		return
	//		$this->pinn_number;  
	//	}    
    
$Girl = new person('Katrina');
$Man = new person('Andrei');

$Twin = new employee('Andrei');
 //echo single object
  echo $Man->get_name().'<br>';
  echo $Girl->get_name().'<br>';
  echo $Twin->get_name();
  
?>