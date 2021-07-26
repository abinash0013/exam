<?php

    class Course{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_course";
       private $table_name1 = "tbl_purchase_course";
      
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
         
        // ::::::::::::::::::::::: login
        function get_course(){
            $query = "SELECT * FROM  " . $this->table_name ;
          
            // prepare query statement
            $stmtcourse= $this->conn->prepare($query);  
             
            // execute query
            $stmtcourse->execute();
            return $stmtcourse;
        }
        
     function search_course($search_term)
        { 
             $query = "SELECT * FROM " . $this->table_name ." where courseName like ? " ; 
            
             $stmt = $this->conn->prepare($query);
            $this->query=htmlspecialchars(strip_tags($this->query));  
            $search_term = "%{$search_term}%";
            $stmt->bindParam(1, $search_term);
           
           
            $stmt->execute(); 
            return $stmt;
        }
    function courseDetails(){
            $query = "SELECT * FROM  " . $this->table_name . " where courseId=?";
          
            // prepare query statement
            $stmtchapterdetails = $this->conn->prepare($query);  
            $stmtchapterdetails->bindParam(1, $this->courseId);
            // execute query
            $stmtchapterdetails->execute();
            return $stmtchapterdetails;
        }
   function coursePurchase(){
             // query to insert record
             $query = "INSERT INTO " . $this->table_name1 . " 
                  SET
                    courseId=?, 
                    studentId=?, 
                    purchaseDate=?, 
                    purchaseExpaireDate=?,
                    purchaseAmount=?,
                    status=?,
                    courseName=?,
                    courseNameHi=?,
                    courseDescriptionHi=?,
                    statusHi=?,
                    paymentMode=?,
                    courseDescription=?";
                
            // prepare query
            $stmt = $this->conn->prepare($query);
                
            // bind values
            $stmt->bindParam(1, $this->courseId);
            $stmt->bindParam(2, $this->studentId);
            $stmt->bindParam(3, $this->purchaseDate);
            $stmt->bindParam(4, $this->purchaseExpaireDate);
            $stmt->bindParam(5, $this->purchaseAmount);
            $stmt->bindParam(6, $this->status);
            $stmt->bindParam(7, $this->courseName);
            $stmt->bindParam(8, $this->courseNameHi);
            $stmt->bindParam(9, $this->courseDescriptionHi); 
            $stmt->bindParam(10, $this->statusHi); 
            $stmt->bindParam(11, $this->paymentMode); 
            $stmt->bindParam(12, $this->courseDescription); 
            // execute query
            if($stmt->execute()){
                return true;
            }

            return false;
        }
    }
    
?>