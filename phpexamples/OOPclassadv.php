   <?php //classFile...
    class myClass { // Part 2 of three part series

        //Initiate class variables
        public $server = 'localhost';
        public $user = 'itunes';
        public $passwd = 'itunes';
        public $db = 'itunes_sync';

        public $dbCon; //Variable to hold the mysqli connection function

        function __construct(){

            //$this->dbCon means reference the variable within this class called mysqli
            $this->dbCon = mysqli($this->server, $this->user, $this->passwd, $this->db);
        }

        function getStaging(){
            //Peform an SQL SELECT Query
            $myQuery = "SELECT * FROM staging";

            /*
             *Define new function variable $resuls
             *$results = $mysqli class variable
             *$mysql class variable has been assigned the function mysqli which has an internal function called query.
             *The second query is not the function variable named above. The query function is passed the $query
             *varibale as its input, in this case the SQL SELECT...
            */
            $results = $this->mysqli->query($myQuery);
            $rows = array();
            while($row = $results->fetch_assoc()){
                 $row[] = $row;
            }
            return $results; //This function returns the results.
        }
    }


?>


<?php

//Include class file in index.php file
require_once('myClass.class.php');

//Initiate a new object of myClass() in variable $myClassObj
$myClassObj = new myClass();

$data = $myClassObj->getStaging();

print_r($data);

?>