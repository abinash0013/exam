<?php

    class Pdf{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_pdf";
       
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // :::::::::::::::::::::::::::::::::::::::::::::: pdf list start
        function pdfList(){
            $query = "SELECT * FROM  " . $this->table_name . " where subjectId=?";
          
            // prepare query statement
            $stmtpdf = $this->conn->prepare($query);  
            $stmtpdf->bindParam(1, $this->subjectId); 
            // execute query
            $stmtpdf->execute();
            return $stmtpdf;
        }
        // :::::::::::::::::::::::::::::::::::::::::::::: pdf list end
        
    }
    
?>