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
    $Exam->lg=$_POST['lg'];
    $Exam->examId=$_POST['examId'];
    $Exam->studentId=$_POST['studentId']; 
     
      $stmt = $Exam->get_question1();
      $num = $stmt->rowCount(); 
      $QestionArr=array();
    // check if more than 0 record found
    if ($num > 0) {
         $i = 0;
           $stattm=null;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           // $QestionArr=$row;
            $quesId="";
            $answer="";
             $quesId=$row['questionId'];
             $answer=$row['answer'];
             $Exam->examId=$_POST['examId'];
             $Exam->studentId=$_POST['studentId'];
             $Exam->quesId=$quesId;
             $Exam->answerKey=$answer;
             $Exam->studentAnsware="";
             $checkExamQues="";
            $checkExamQues= $Exam->get_question_check();
            $num1 = $checkExamQues->rowCount(); 
             if($num1 > 0){
                  $Exam->studentAns="";
                  $stattm= $Exam->tbl_attemt_exam_update_fun();
             }else{
                    $stattm= $Exam->tbl_attemt_exam_fun();
             }
               
               if($i == 0){
                    $questionlabel=$row['questionlabel'];
                    $questionId=$row['questionId'];
                    $answer=$row['answer'];
                    $option1=$row['option1'];
                    $option2=$row['option2'];
                    $option3=$row['option3'];
                    $option4=$row['option4'];
                    $studentAnswer=$row['studentAnswer'];
               }
               if($i == 1){
                   $questionIdNext=$row['questionId'];
               }
               $i++;
             
        }
        
        if($stattm == true){
                 echo json_encode(array("status" => "200", "message" => "Exam joined",
                 "questionlabel"=>$questionlabel,
                 "answer"=>$answer,
                 "option1"=>$option1,
                 "option2"=>$option2,
                 "option3"=>$option3,
                 "option4"=>$option4,
                 "studentAnswer"=>$studentAnswer,
                 "questionId"=>$questionId,
                 "questionIdNext"=>$questionIdNext
                 ));
            }else{
                 echo json_encode(array("status" => "200", "message" => "Please re-join exam"));
            }
        
       
    } else {
        echo json_encode(array("status" => "201", "message" => "No Data Found"));
    }
?>