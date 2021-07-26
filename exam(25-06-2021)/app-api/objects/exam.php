<?php

    class Exam{
      
        // database connection and table name
        private $conn;
        private $table_name = "exam";
        private $table_name2 = "question";
        private $table_name3 = "tbl_attemt_exam";
      
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // :::::::::::::::::::::::::::::::::::::::::::::: subject list start
        function exam_list_mock(){
             $query = "SELECT * FROM  " . $this->table_name . " where courseId=? and type=?";
          
            // prepare query statement
            $stmtexam= $this->conn->prepare($query); 
             
             $stmtexam->bindParam(1, $this->courseId);
             $stmtexam->bindParam(2, $this->type);
            // execute query
            $stmtexam->execute();
            return $stmtexam;
        }
        function exam_list_quiz(){
             $query = "SELECT * FROM  " . $this->table_name . " where subjectId=?  and type=?";
          
            // prepare query statement
            $stmtexam= $this->conn->prepare($query); 
             $stmtexam->bindParam(1, $this->subjectId); 
             $stmtexam->bindParam(2, $this->type);
            // execute query
            $stmtexam->execute();
            return $stmtexam;
        }
        // :::::::::::::::::::::::::::::::::::::::::::::: subject list start
        
        // ::::::::::::::::::::::: 
        function get_exam_details(){
            $query = "SELECT * FROM  " . $this->table_name . " where examId=?";
          
            // prepare query statement
            $stmtsubject= $this->conn->prepare($query);  
            $stmtsubject->bindParam(1, $this->examId);
            // execute query
            $stmtsubject->execute();
            return $stmtsubject;
        }
     function get_question(){
          //  $query = "SELECT * FROM  " . $this->table_name2 . " where examId=?";
          $query="SELECT question.*, tbl_attemt_exam.* FROM `question` LEFT JOIN tbl_attemt_exam on tbl_attemt_exam.questionId=question.questionId  WHERE   tbl_attemt_exam.examId=? and tbl_attemt_exam.studentId=?";
            // prepare query statement
            $stmtsubject= $this->conn->prepare($query);  
            // $stmtsubject->bindParam(1, $this->examId);
            $stmtsubject->bindParam(1, $this->examId);
            $stmtsubject->bindParam(2, $this->studentId);
            // $stmtsubject->bindParam(3, $this->quesId);
            // execute query
            $stmtsubject->execute();
            return $stmtsubject;
        }
        
        function get_question1(){
            $query = "SELECT * FROM  " . $this->table_name2 . " where examId=?";
          
            // prepare query statement
            $stmtsubject= $this->conn->prepare($query);  
             $stmtsubject->bindParam(1, $this->examId); 
            // execute query
            $stmtsubject->execute();
            return $stmtsubject;
        }
         

    function tbl_attemt_exam_fun(){
            // query to insert record
            $query = "INSERT INTO " . $this->table_name3 . " SET 
                        studentId=?, 
                        questionId=?, 
                        answerKey=?,  
                        studentAnswer=?,
                        examId=?
                        ";
                         
          
            // prepare query
            $stmt = $this->conn->prepare($query); 
          
            // bind values
            $stmt->bindParam(1, $this->studentId);
            $stmt->bindParam(2, $this->quesId);
            $stmt->bindParam(3, $this->answerKey); 
            $stmt->bindParam(4, $this->studentAnswer); 
            $stmt->bindParam(5, $this->examId); 
          
            // execute query
            if($stmt->execute()){
                return true;
            }
            return false;
        }
        
   function get_question_check(){
            $query = "SELECT * FROM  " . $this->table_name3 . " where examId=? and studentId=? and questionId=? ";
          
            // prepare query statement
            $stmtsubject= $this->conn->prepare($query);  
            $stmtsubject->bindParam(1, $this->examId);
            $stmtsubject->bindParam(2, $this->studentId);
            $stmtsubject->bindParam(3, $this->quesId);
            // execute query
              $stmtsubject->execute();
            return $stmtsubject;
        }
        
  function tbl_attemt_exam_update_fun(){
       // update query
            $query = "UPDATE " . $this->table_name3 . " SET studentAnswer=? where  studentId = ? and examId=? and questionId=? ";
                
            // prepare query statement
            $stmtauthtoken = $this->conn->prepare($query);

              
            // bind new values
            $stmtauthtoken->bindParam(1, $this->studentAns);
            $stmtauthtoken->bindParam(2, $this->studentId);
            $stmtauthtoken->bindParam(3, $this->examId);
            $stmtauthtoken->bindParam(4, $this->quesId);
            
            if($stmtauthtoken->execute()){
                return true;
            }

  }
  
  
     function get_question_details(){
            $query = "SELECT * FROM  " . $this->table_name2 . " where questionId=?";
          
            // prepare query statement
            $stmtsubject= $this->conn->prepare($query);  
            $stmtsubject->bindParam(1, $this->questionId);
            // execute query
            $stmtsubject->execute();
            return $stmtsubject;
        }
        
        
  }  
?>