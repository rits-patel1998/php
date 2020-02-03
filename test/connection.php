<?php

    class Connection{
        public $host = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "examtest";
        public $con; 
        // function __construct(){
        //     $this->con= $this->dbConnect();
        //     return $this->con;
        // }
        function dbConnect(){
            $this->con = mysqli_connect($this->host,$this->username,$this->password,$this->dbname);
            return $this->con;
        }
}
?>