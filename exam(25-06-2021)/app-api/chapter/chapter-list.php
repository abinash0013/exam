<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // get database connection
    include_once '../config/database.php';
    
    include_once '../objects/chapter.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Chapter = new Chapter($db);
    $data = json_decode(file_get_contents("php://input"));
    
    // make sure data is not empty 
    $Chapter->lg=$data->lg;
    $Chapter->subjectId=$data->subjectId;
    $stmt = $Chapter->chapterList();
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if ($num > 0) {
        $data_arr = array(); 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($Chapter->lg == "en"){
                array_push(
                    $data_arr, 
                    array("chapterId"=>$row["chapterId"],
                        "chapterNo"=>$row["chapterNo"],
                        "chapterName"=>$row["chapterName"],
                        "chapterDescription"=>$row["chapterDescription"],
                        "courseId"=>$row["courseId"],
                        "subjectId"=>$row["subjectId"],
                        "image"=>$row["image"],
                        "createdAt"=>$row["createdAt"]
                    )
                );
            }else{
                array_push(
                    $data_arr,
                    array("chapterId"=>$row["chapterId"],
                        "chapterNo"=>$row["chapterNo"],
                        "chapterName"=>$row["chapterNameHi"],
                        "chapterDescription"=>$row["chapterDescriptionHi"],
                        "courseId"=>$row["courseId"],
                        "subjectId"=>$row["subjectId"],
                        "image"=>$row["image"],
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