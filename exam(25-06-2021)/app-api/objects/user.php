<?php

    class User{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_users";
      
        // object properties
        // public $userid; 
        // public $name;
        // public $email;
        // public $mobile;
        // public $gender;
        // public $password;
        // public $authtoken;
        // public $createdAt;
      
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // ::::::::::::::::: Check Email Login 
        function checkemaillogin(){ 
            $query = "SELECT * FROM " . $this->table_name . " where userEmail=?"; 
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->userEmail);
           
            $stmt->execute(); 
            return $stmt;
        } 
        
        // ::::::::::::::::: Register 
        function register(){
            // query to insert record
            $query = "INSERT INTO " . $this->table_name . " SET
                        userName=:userName, 
                        userEmail=:userEmail, 
                        userPassword=:userPassword, 
                        userPhone=:userPhone, 
                        userDob=:userDob, 
                        userGender=:userGender, 
                        updatedAt=:updatedAt,
                        createdAt=:createdAt";
          
            // prepare query
            $stmt = $this->conn->prepare($query);
          
            // sanitize
            $this->userName=htmlspecialchars(strip_tags($this->userName));
            $this->userEmail=htmlspecialchars(strip_tags($this->userEmail));
            $this->userPassword=htmlspecialchars(strip_tags($this->userPassword));
            $this->userPhone=htmlspecialchars(strip_tags($this->userPhone));
            $this->userDob=htmlspecialchars(strip_tags($this->userDob));
            $this->userGender=htmlspecialchars(strip_tags($this->userGender));
            $this->updatedAt=htmlspecialchars(strip_tags($this->updatedAt));
            $this->createdAt=htmlspecialchars(strip_tags($this->createdAt));
          
            // bind values
            $stmt->bindParam(":userName", $this->userName);
            $stmt->bindParam(":userEmail", $this->userEmail);
            $stmt->bindParam(":userPassword", $this->userPassword);
            $stmt->bindParam(":userPhone", $this->userPhone);
            $stmt->bindParam(":userDob", $this->userDob);
            $stmt->bindParam(":userGender", $this->userGender);
            $stmt->bindParam(":updatedAt", $this->updatedAt);
            $stmt->bindParam(":createdAt", $this->createdAt);
          
            // execute query
            if($stmt->execute()){
                return true;
            }
            return false;
        }
        
        // ::::::::::::::::::::::: login
        function login(){
            $query = "SELECT * FROM  " . $this->table_name . " where userPhone=? OR userEmail=? AND userPassword=?";
          
            // prepare query statement
            $stmtlogin = $this->conn->prepare($query); 
          
            // bind values
            $stmtlogin->bindParam(1, $this->userPhone);
            $stmtlogin->bindParam(2, $this->userPhone);
            $stmtlogin->bindParam(3, $this->userPassword);
            
            // execute query
            $stmtlogin->execute();
            return $stmtlogin;
        }
        
        // ::::::::::::::::::::::: login Update for security
        function loginUpdate(){

            // update query
            $query = "UPDATE " . $this->table_name . " SET updatedAt = ? where userPhone=? OR userEmail=? AND userPassword=?";
                
            // prepare query statement
            $stmtupdate = $this->conn->prepare($query);

            // sanitize
            $stmtupdate->bindParam(1, $this->updateAt);
            $stmtupdate->bindParam(2, $this->userPhone);
            $stmtupdate->bindParam(3, $this->userPhone);
            $stmtupdate->bindParam(4, $this->userPassword);
            
            if($stmtupdate->execute()){
                return true;
            }

        }
        
        
        function user_auth_token_update(){

            // update query
            $query = "UPDATE " . $this->table_name . " SET authToken = :authtoken";
                
            // prepare query statement
            $stmtauthtoken = $this->conn->prepare($query);

            // sanitize
            $this->authtoken=htmlspecialchars(strip_tags($this->authtoken));
            // $this->email=htmlspecialchars(strip_tags($this->email));

            // bind new values
            $stmtauthtoken->bindParam(':authtoken', $this->authtoken);
            // $stmtauthtoken->bindParam(':email', $this->email);
            
            if($stmtauthtoken->execute()){
                return true;
            }

        }
        
        
        // ::::::::::::::::::::::: Forgot Password
        function send_mail(){
       
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
                $subject ="Execellent Forgot Password"; 
                $message ="Execellent Forgot Password is ". $this->passwordBase64; 
                $headers="abinash261997@gmail.com"; 
                mail($to,$subject,$message,$headers);
                 return true;
            }else{
              return false;
            }
		}
		
	    // ::::::::::::::::::::::: User Profile
        function userProfile(){ 
            $query = "SELECT * FROM " . $this->table_name . " where userId=?"; 
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->userId);
           
            $stmt->execute(); 
            return $stmt;
        } 
        
	    // ::::::::::::::::::::::: User Profile Edit
        function profileEdit(){

            // update query
            $query = "UPDATE " . $this->table_name . " SET userName = ? ,   userGender=?  , userDob=? where  userId=?";
                
            // prepare query statement
            $stmtcart_update= $this->conn->prepare($query);
 
            // bind new values
            $stmtcart_update->bindParam(1, $this->userName);
            
            $stmtcart_update->bindParam(2, $this->userGender);
            $stmtcart_update->bindParam(3, $this->userDob);
            $stmtcart_update->bindParam(4, $this->userId);
            if($stmtcart_update->execute()){
                return true;
            }

        }
        
	    // ::::::::::::::::::::::: Password Update
        function password_update(){

            // update query
            $query = "UPDATE " . $this->table_name . " SET userPassword=?, updatedAt=? where userId=?";
                
            // prepare query statement
            $stmtcart_update= $this->conn->prepare($query);
 
            // bind new values
            $stmtcart_update->bindParam(1, $this->userPassword); 
            $stmtcart_update->bindParam(2, $this->updatedAt);
            $stmtcart_update->bindParam(3, $this->userId);
            if($stmtcart_update->execute()){
                return true;
            }

        }
    
    }
    
?>