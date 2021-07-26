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
    $Exam->courseId=$data->courseId;
    $Exam->subjectId=$data->subjectId;
    $Exam->type=$data->type;
    
    if($Exam->type == 'mock'){
         $stmt = $Exam->exam_list_mock();
    }else{
         $stmt = $Exam->exam_list_quiz();
    }
   
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if ($num > 0) {
        $data_arr = array(); 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($Exam->lg == 'en'){
                array_push(
                    $data_arr, 
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
                        "createdAt"=>$row["createdAt"]
                    )
                );
            }else{
                array_push(
                    $data_arr,
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
                        "createdAt"=>$row["createdAt"]
                    )
                ); 
            }
        }
        echo json_encode(array("status" => "200", "message" => "Data Found", "data" => $data_arr));
    } else {
        echo json_encode(array("status" => "201", "message" => "No Data Found", "data" => []));
    }
?>