<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // get database connection
    include_once '../config/database.php';
    
    include_once '../objects/exam.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Exam = new Exam($db);
    $data = json_decode(file_get_contents("php://input"));
    
    // make sure data is not empty 
    $Exam->lg="en";//$_POST['lg'];
    $Exam->examId=$_POST['examId'];
    $Exam->studentId=$_POST['studentId'] ;
    $Exam->questionId=$_POST['questionId']; 
   // $Exam->studentAns=$_POST['studentAnsware']; 
   // $Exam->questionId=$_POST['questionIdNext'];
    $Exam->questionNo=$_POST['questionNo']; 
   // $stattm= $Exam->tbl_attemt_exam_update_fun();
            
    $stmtt = $Exam->get_question_details();
    $numt = $stmtt->rowCount();
    $questionIdNext=null;
    
     if ($numt > 0) {
        while ($roww = $stmtt->fetch(PDO::FETCH_ASSOC)) {
            
              
               $Exam->examId=$_POST['examId'];
               $Exam->studentId=$_POST['studentId'];
               $Exam->quesId=$_POST['questionId'];
              $stmt = $Exam->get_question_check();
              $num = $stmt->rowCount(); 
              
              if ($num > 0) { 
             while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                 $studentAnswer=$row['studentAnswer']; 
              }
              
              
             $Exam->examId=$_POST['examId'];
               $Exam->studentId=$_POST['studentId'];  
              $stmt = $Exam->get_question1();
              $num = $stmt->rowCount(); 
              
              if ($num > 0) {
              $i = 1;
              $n=$_POST['questionNo'];
              $noo=$n + 1;
         
             while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                 if($noo == $i){
                    $questionIdNext=$row['questionId']; 
                 }else{
                   //  $questionIdNext="30";
                 }
               $i=$i+1;  
              }
              }
              }
             
             
                    $questionlabel=$roww['questionlabel'];
                    $questionId=$roww['questionId'];
                    $answer=$roww['answer'];
                    $option1=$roww['option1'];
                    $option2=$roww['option2'];
                    $option3=$roww['option3'];
                    $option4=$roww['option4'];
                   
                    
        }
    
          
            echo json_encode(array("status" => "200", "message" => "submit",
                 "questionlabel"=>$questionlabel,
                 "answer"=>$answer,
                 "option1"=>$option1,
                 "option2"=>$option2,
                 "option3"=>$option3,
                 "option4"=>$option4,
                 "studentAnswer"=>$studentAnswer,
                 "questionId"=>$questionId,
                 "questionIdNext"=>$questionIdNext,
                 "questionNo"=>strval($noo)
            ));
             
       
    } else {
        echo json_encode(array("status" => "201", "message" => "No Data Found"));
    }
?>