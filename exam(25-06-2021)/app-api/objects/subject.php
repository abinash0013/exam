<?php

    class Subject{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_subject";
       
      
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // :::::::::::::::::::::::::::::::::::::::::::::: subject list start
        function subjectList(){
            $query = "SELECT * FROM  " . $this->table_name ;
          
            // prepare query statement
            $stmtsubject = $this->conn->prepare($query);  
             
            // execute query
            $stmtsubject->execute();
            return $stmtsubject;
        }
        // :::::::::::::::::::::::::::::::::::::::::::::: subject list start
        
        // ::::::::::::::::::::::: 
        function get_subject(){
            $query = "SELECT * FROM  " . $this->table_name . " where courseId=?";
          
            // prepare query statement
            $stmtsubject= $this->conn->prepare($query);  
            $stmtsubject->bindParam(1, $this->courseId);
            // execute query
            $stmtsubject->execute();
            return $stmtsubject;
        }
        
        
    
    }
    
?>