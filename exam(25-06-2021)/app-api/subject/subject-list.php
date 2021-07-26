<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // get database connection
    include_once '../config/database.php';
    
    include_once '../objects/subject.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Subject = new Subject($db);
    $data = json_decode(file_get_contents("php://input"));
    
    // make sure data is not empty 
    $Subject->lg=$data->lg;
    
    $stmt = $Subject->subjectList();
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if ($num > 0) {
        $data_arr = array(); 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($Subject->lg == 'en'){
                array_push(
                    $data_arr, 
                    array("subjectId"=>$row["subjectId"],
                        "subjectName"=>$row["subjectName"],
                        "icon"=>$row["icon"],
                        "image"=>$row["image"],
                        "courseId"=>$row["courseId"],
                        "createdAt"=>$row["createdAt"]
                    )
                );
            }else{
                array_push(
                    $data_arr,
                    array("subjectId"=>$row["subjectId"],
                        "subjectName"=>$row["subjectNameHi"],
                        "icon"=>$row["icon"],
                        "image"=>$row["image"],
                        "courseId"=>$row["courseId"],
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