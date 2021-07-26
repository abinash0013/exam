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
    $Exam->lg=$data->lg;
    $Exam->questionId=$data->questionId;
    
  $stmtt = $Exam->get_question_details();
  $numt = $stmtt->rowCount();
 $question_data_arr = array(); 
    // check if more than 0 record found
    if ($numt > 0) {
        
        while ($roww = $stmtt->fetch(PDO::FETCH_ASSOC)) {
            
            $Exam->examId=$data->examId;
            $Exam->studentId=$data->studentId; 
            $Exam->quesId=$data->questionId;
            $checkExamQues= $Exam->get_question_check();
            $num1 = $checkExamQues->rowCount();
            
            if ($num1 > 0) {
                while ($roww1 = $checkExamQues->fetch(PDO::FETCH_ASSOC)) {
                   $studentAnswer=$roww1['studentAnswer'];
                }
                }
            if($Exam->lg == 'en'){
                
                   echo json_encode(array("status" => "201", "message" => "No Data Found", "data" => array(
                        "questionId"=>$roww["questionId"],
                        "questionType"=>$roww["questionType"],
                        "questionlabel"=>$roww["questionlabel"],
                        "answer"=>$roww["answer"],
                        "studentAnswer"=>$studentAnswer,
                        "option1"=>$roww["option1"],
                        "option2"=>$roww["option2"],
                        "option3"=>$roww["option3"],
                        "option4"=>$roww["option4"],
                        "subjectName"=>$roww["subjectName"],
                        "courseId"=>$roww["courseId"], 
                        "createdAt"=>$roww["createdAt"]
                    ))
                );
            }else{
              echo json_encode(array("status" => "201", "message" => "No Data Found", "data" => array(
                        "questionId"=>$roww["questionId"],
                        "questionType"=>$roww["questionType"],
                        "questionlabel"=>$roww["questionLabelHi"],
                        "answer"=>$roww["answer"],
                        "studentAnswer"=>$studentAnswer,
                        "option1"=>$roww["option1Hi"],
                        "option2"=>$roww["option2Hi"],
                        "option3"=>$roww["option3Hi"],
                        "option4"=>$roww["option4Hi"],
                        "subjectName"=>$roww["subjectNameHi"],
                        "courseId"=>$roww["courseId"], 
                        "createdAt"=>$roww["createdAt"]
                    )
                )); 
            }
        }
 
   
    } else {
        echo json_encode(array("status" => "201", "message" => "No Data Found", "data" => []));
    }
?>