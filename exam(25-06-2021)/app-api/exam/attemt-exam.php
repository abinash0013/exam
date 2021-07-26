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
    $Exam->examId=$data->examId;
    $Exam->studentId=$data->studentId; 
    $Exam->quesId=$data->questionId; 
    $Exam->studentAns=$data->studentAnsware; 
 
     $stattm= $Exam->tbl_attemt_exam_update_fun();
            
        if($stattm == true){
                 echo json_encode(array("status" => "200", "message" => "success"));
             
       
    } else {
        echo json_encode(array("status" => "201", "message" => "No Data Found"));
    }
?>