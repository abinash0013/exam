<?php

    class Purchase{
      
        // database connection and table name
        private $conn;
        private $table_name = "	tbl_purchase_course";
 
      
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // :::::::::::::::::::::::::::::::::::::::::::::: subject list start
        function purchage_list(){
             $query = "SELECT * FROM  " . $this->table_name . " where studentId=?";
          
            // prepare query statement
            $stmtpurchage= $this->conn->prepare($query); 
             
             $stmtpurchage->bindParam(1, $this->studentId);
            
            // execute query 
            $stmtpurchage->execute();
            return $stmtpurchage;
        }
    }
?>