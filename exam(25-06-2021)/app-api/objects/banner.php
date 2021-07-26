<?php

    class Banner{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_banner";
       
      
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
         
        // ::::::::::::::::::::::: list
        function get_banner(){
            $query = "SELECT * FROM  " . $this->table_name ;
          
            // prepare query statement
            $stmtbanner= $this->conn->prepare($query);  
             
            // execute query
            $stmtbanner->execute();
            return $stmtbanner;
        }
        
         // ::::::::::::::::::::::: detail
        function get_banner_details(){
        
            $query = "SELECT * FROM  " . $this->table_name . " where bannerId=? ";
                
            // prepare query statement
            $stmtbanner = $this->conn->prepare($query);
            
            $stmtbanner->bindParam(1, $this->bannerId); 
        
            // execute query
            $stmtbanner->execute();
            return $stmtbanner;
        
        }
    }
    
?>