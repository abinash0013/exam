<?php

    class User{

        // database connection and table name
        private $conn;
        private $table_name = "tbl_users";
        
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        function register(){

            // query to insert record
            $query = "INSERT INTO
                " . $this->table_name . "
                SET
                    userName=:userName, 
                    userEmail=:userEmail,
                    userPhone=:userPhone, 
                    userDob=:userDob, 
                    userPassword=:userPassword,
                    createdAt=:createdAt";
                
            // prepare query
            $stmt = $this->conn->prepare($query);
                
            // sanitize
            $this->name=htmlspecialchars(strip_tags($this->userName));
            $this->email=htmlspecialchars(strip_tags($this->userEmail));
            $this->phone=htmlspecialchars(strip_tags($this->userPhone));
            $this->dob=htmlspecialchars(strip_tags($this->userDob));
            $this->password=htmlspecialchars(strip_tags($this->userPassword));
            $this->createdAt=htmlspecialchars(strip_tags($this->createdAt));
        
            // bind values
            $stmt->bindParam(":userName", $this->name);
            $stmt->bindParam(":userEmail", $this->email);
            $stmt->bindParam(":userPhone", $this->phone);
            $stmt->bindParam(":userDob", $this->dob);
            $stmt->bindParam(":userPassword", $this->password);
            $stmt->bindParam(":createdAt", $this->createdAt);
            
            // execute query
            if($stmt->execute()){
                return true;
            }

            return false;
        
        }
        
        function loginCheck(){
        
            $query = "SELECT * FROM  " . $this->table_name . " where userEmail=?";
                
            // prepare query statement
            $stmtloginCh = $this->conn->prepare($query);
            
            $stmtloginCh->bindParam(1, $this->userEmail);
        
            // execute query
            $stmtloginCh->execute();
            return $stmtloginCh;
        
        }
        
        function login(){
        
            $query = "SELECT * FROM  " . $this->table_name . " where userPhone=? OR userEmail=? AND userPassword=?";
                
            // prepare query statement
            $stmtlogin = $this->conn->prepare($query);
            
            $stmtlogin->bindParam(1, $this->userEmail);
            $stmtlogin->bindParam(2, $this->userEmail);
            $stmtlogin->bindParam(3, $this->userPassword); 
        
            // execute query
            $stmtlogin->execute();
            return $stmtlogin;
        
        }
        
		// Update user
        function update(){

            // query to insert record
            $query = "UPDATE
                " . $this->table_name . " SET userName = ?, userGender = ? WHERE userId = ?";          
                
            // prepare query
            $stmt2 = $this->conn->prepare($query);         
        
            // bind values
            $stmt2->bindParam(1, $this->userName);
            $stmt2->bindParam(2, $this->userGender);
          	$stmt2->bindParam(3, $this->userId);

            if($stmt2->execute()){
                return true;
            }

            return false;
        
        }   
     function updateAtUpdate(){

            // query to insert record
            $query = "UPDATE
                " . $this->table_name . " SET updatedAt = ? where userPhone=? OR userEmail=? AND userPassword=?";
                
            // prepare query statement
            $stmtlogin = $this->conn->prepare($query);
            $stmtlogin->bindParam(1, $this->updateAt);
            $stmtlogin->bindParam(2, $this->userEmail);
            $stmtlogin->bindParam(3, $this->userEmail);
            $stmtlogin->bindParam(4, $this->userPassword); 
        
            // execute query
           
             if($stmtlogin->execute()){
                return true;
            }

            return false;
        
        
        }
        
        function details()
        { 
            $query = "SELECT * FROM " . $this->table_name . " where userId=?"; 
            $stmtdetails = $this->conn->prepare($query);
            $stmtdetails->bindParam(1, $this->userId);
            $stmtdetails->execute(); 
            return $stmtdetails;
        } 
        
      	function password_update(){

            // update query
            $query = "UPDATE " . $this->table_name . " SET userPassword = ? ,updatedAt=? where userId=?";
                
            // prepare query statement
            $stmtpassword_update= $this->conn->prepare($query);
 
            // bind new values
            $stmtpassword_update->bindParam(1, $this->newPassword); 
            $stmtpassword_update->bindParam(2, $this->updatedAt);
            $stmtpassword_update->bindParam(3, $this->userId);
            if($stmtpassword_update->execute()){
                return true;
            }

        }  
        
        function send_mail()
		{       
             $query = "UPDATE " . $this->table_name . " SET userPassword =:userPassword where userEmail=:userEmail";
                
            // prepare query statement
            $updatepassword = $this->conn->prepare($query);

            // sanitize
            $this->userPassword=htmlspecialchars(strip_tags($this->userPassword));
            $this->userEmail=htmlspecialchars(strip_tags($this->userEmail));

            // bind new values
            $updatepassword->bindParam(':userPassword', $this->userPassword);
            $updatepassword->bindParam(':userEmail', $this->userEmail);
            
            if($updatepassword->execute()){
               
                $to =$this->userEmail ;
                $subject ="EXCELLENT COACHING Forgot Password"; 
                $message ="EXCELLENT COACHING Forgot Password is ". $this->passwordBase64; 
                $headers="abinash261997@gmail.com"; 
                mail($to,$subject,$message,$headers);
                 return true;
            }else{
              return false;
            }  
		}
        
    }
?>
    