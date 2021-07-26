<?php

    class Chapter{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_chapter";
      
        // ::::::::::::::::::::: constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // :::::::::::::::::::::::::::::::::::::::::::::: chapter list start
        function chapterList(){
            $query = "SELECT * FROM  " . $this->table_name . " where subjectId=?";
          
            // prepare query statement
            $stmtchapter = $this->conn->prepare($query);  
            $stmtchapter->bindParam(1, $this->subjectId); 
            // execute query
            $stmtchapter->execute();
            return $stmtchapter;
        }
        // :::::::::::::::::::::::::::::::::::::::::::::: chapter list start
        
        // :::::::::::::::::::::::::::::::::::::::::::::: single chapter start
        function chapterDetails(){
            $query = "SELECT * FROM  " . $this->table_name . " where chapterId=?";
          
            // prepare query statement
            $stmtchapterdetails = $this->conn->prepare($query);  
            $stmtchapterdetails->bindParam(1, $this->chapterId);
            // execute query
            $stmtchapterdetails->execute();
            return $stmtchapterdetails;
        }
        // :::::::::::::::::::::::::::::::::::::::::::::: single chapter end
        
     
    }
    
?>