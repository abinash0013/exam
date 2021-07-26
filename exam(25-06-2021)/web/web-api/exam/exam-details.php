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
  $question_data_arr = array(); 
  $stmtt1 = $Exam->get_question();
  $numt = $stmtt1->rowCount();

$rightAns=0;
$wrongAns=0;
$unattAns=0;
$totalQuestion=0;
    // check if more than 0 record found
    if ($numt > 0) {
        
        while ($roww = $stmtt1->fetch(PDO::FETCH_ASSOC)) {
            $studentAnswer=null;
            $quesId=$roww['questionId'];
            $Exam->examId=$data->examId;
            $Exam->studentId=$data->studentId; 
            $Exam->quesId=$quesId;
            // $checkExamQues= $Exam->get_question_check();
            // $num1 = $checkExamQues->rowCount();
            
            // if ($num1 > 0) {
            //     while ($roww1 = $checkExamQues->fetch(PDO::FETCH_ASSOC)) {
            //       $studentAnswer=$roww1['studentAnswer'];
            //     }
            //     }
            if($roww["answer"] == $roww['studentAnswer']){
                $rightAns=$rightAns+1;
            }
            $totalQuestion=$totalQuestion+1;
             if($roww["studentAnswer"] == null){
                $unattAns=$unattAns+1;
            }
            
            if($Exam->lg == 'en'){
                
                array_push(
                    $question_data_arr, 
                    array(
                        "questionId"=>$roww["questionId"],
                        "questionType"=>$roww["questionType"],
                        "questionlabel"=>$roww["questionlabel"],
                        "answer"=>$roww["answer"],
                        "stuans"=>$roww['studentAnswer'],
                        "option1"=>$roww["option1"],
                        "option2"=>$roww["option2"],
                        "option3"=>$roww["option3"],
                        "option4"=>$roww["option4"],
                        "subjectName"=>$roww["subjectName"],
                        "courseId"=>$roww["courseId"], 
                        "createdAt"=>$roww["createdAt"]
                    )
                );
            }else{
                array_push(
                     $question_data_arr, 
                    array(
                        "questionId"=>$roww["questionId"],
                        "questionType"=>$roww["questionType"],
                        "questionlabel"=>$roww["questionLabelHi"],
                        "answer"=>$roww["answer"],
                         "stuans"=>$roww['studentAnswer'],
                        "option1"=>$roww["option1Hi"],
                        "option2"=>$roww["option2Hi"],
                        "option3"=>$roww["option3Hi"],
                        "option4"=>$roww["option4Hi"],
                        "subjectName"=>$roww["subjectNameHi"],
                        "courseId"=>$roww["courseId"], 
                        "createdAt"=>$roww["createdAt"]
                    )
                ); 
            }
        }
    }
  $stmt = $Exam->get_exam_details();
  $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if ($num > 0) {
        $data_arr = array(); 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            if($Exam->lg == 'en'){
              echo json_encode(array("status" => "200", "message" => "Data Found", "data" =>
                    array("examId"=>$row["examId"],
                        "examName"=>$row["examName"],
                        "image"=>$row["image"],
                        "description"=>$row["description"],
                        "examDate"=>$row["examDate"],
                        "totalQuestion"=>$row["totalQuestion"],
                        "examMarks"=>$row["examMarks"],
                        "examTime"=>$row["examTime"],
                        "type"=>$row["type"],
                        "subjectId"=>$row["subjectId"],
                        "courseId"=>$row["courseId"],
                        "expaireDate"=>$row["expaireDate"],
                        "createdAt"=>$row["createdAt"],
                        "rightAns"=>$rightAns,
                        "totalQ"=>$totalQuestion,
                        "wrongAns"=>$totalQuestion-$rightAns,
                        "unattQues"=>$unattAns,
                        "question"=>$question_data_arr
                    )
                ));
            }else{
                echo json_encode(array("status" => "200", "message" => "Data Found", "data" =>
                    array("examId"=>$row["examId"],
                        "examName"=>$row["examNameHi"],
                        "image"=>$row["image"],
                        "description"=>$row["descriptionHi"],
                        "examDate"=>$row["examDate"],
                        "totalQuestion"=>$row["totalQuestion"],
                        "examMarks"=>$row["examMarks"],
                        "examTime"=>$row["examTime"],
                        "type"=>$row["typeHi"],
                        "subjectId"=>$row["subjectId"],
                        "courseId"=>$row["courseId"],
                         "expaireDate"=>$row["expaireDate"],
                        "createdAt"=>$row["createdAt"],
                        "rightAns"=>$rightAns,
                        "totalQ"=>$totalQuestion,
                        "wrongAns"=>$totalQuestion-$rightAns,
                        "unattQues"=>$unattAns,
                        "question"=>$question_data_arr
                    )
                )); 
            }
        }
        
    } else {
        echo json_encode(array("status" => "201", "message" => "No Data Found", "data" => []));
    }
?>