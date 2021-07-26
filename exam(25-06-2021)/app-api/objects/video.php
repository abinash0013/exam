<?php

    class Video{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_videos";
       
      
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        
        // ::::::::::::::::::::::: 
        function get_live_video(){
            $query = "SELECT * FROM " . $this->table_name . " where courseId=? AND status='1' AND videoType='live' order by videoId  DESC"; 

            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->courseId);
             
           
            $stmt->execute(); 
            return $stmt;
        }
        
         // ::::::::::::::::::::::: 
        function get_latest_video(){
            $query = "SELECT * FROM " . $this->table_name . " where courseId=? AND status='1'  order by videoId  DESC"; 

            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->courseId);
             
           
            $stmt->execute(); 
            return $stmt;
        }
        
      // ::::::::::::::::::::::: 
        function get_video(){
            $query = "SELECT * FROM " . $this->table_name . " where subjectId=? And chapterId=? order by videoId  DESC"; 
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->subjectId);
            $stmt->bindParam(2, $this->chapterId);
            $stmt->execute(); 
            return $stmt;
        }
        
        
       function get_promotional_video(){
            $query = "SELECT * FROM " . $this->table_name . " where     status='1' AND videoType='promotion' order by videoId  DESC"; 

            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->courseId);
             
           
            $stmt->execute(); 
            return $stmt;
        }
        
    }
    
?>