<?php
  
    class Contact{
    
        // database connection and table name
        private $conn;
        private $table_name = "tbl_contact";
      
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // create product
        function addContact(){
          
              // query to insert record
              $query = "INSERT INTO
                          " . $this->table_name . "
                        SET
                          contactName=?, 
                          contactEmail=?, 
                          subject=?, 
                          message=?, 
                          userId=?";
      
              // prepare query
              $stmt = $this->conn->prepare($query);
      
              // bind values
              $stmt->bindParam(1, $this->contactName);
              $stmt->bindParam(2, $this->contactEmail);
              $stmt->bindParam(3, $this->subject);
              $stmt->bindParam(4, $this->message);
              $stmt->bindParam(5, $this->userId);
      
              // execute query
            if($stmt->execute()){
                $to =$this->contactEmail ;
                $subject =$this->subject; 
                $message =$this->message; 
                $headers="alphahygienicgroup@gmail.com"; 
                mail($to,$subject,$message,$headers);
                return true;
            }

          return false;
    
      }       

    }

?>