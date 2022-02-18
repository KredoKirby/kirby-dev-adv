<?php
    class Database{
        private $servername = "localhost";
        private $db_username = "root";
        private $db_password = "";
        private $db_name = "the_company";
        protected $conn;

        // CONSTRUCTOR
        public function __construct(){
            $this->conn = new mysqli($this->servername, $this->db_username, $this->db_password, $this->db_name);

            if($this->conn->error){
                die("Unable to connect to the database: ".$this->db_name." : ".$this->conn->connect_error);
            }
        }
    }
?>