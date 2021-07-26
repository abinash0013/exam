<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // get database connection
    include_once '../config/database.php';
    
    include_once '../objects/course-purchage.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Purchase = new Purchase($db);
    $data = json_decode(file_get_contents("php://input"));
    
    // make sure data is not empty 
    $Purchase->lg=$data->lg;
    $Purchase->studentId=$data->studentId;
     
    $stmt = $Purchase->purchage_list();
   
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if ($num > 0) {
        $data_arr = array(); 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($Exam->lg == 'en'){
                array_push(
                    $data_arr, 
                    array(
                        "purchaseCourseId"=>$row["purchaseCourseId"],
                        "courseName"=>$row["courseName"],
                        "status"=>$row["status"],
                        "purchaseAmount"=>$row["purchaseAmount"],
                        "courseDescriptionHi"=>$row["courseDescriptionHi"],
                        "purchaseExpaireDate"=>$row["purchaseExpaireDate"],
                        "purchaseDate"=>$row["purchaseDate"],
                        "purchaseCourseId"=>$row["purchaseCourseId"],
                    )
                );
            }else{
                array_push(
                    $data_arr,
                      array("purchaseCourseId"=>$row["purchaseCourseId"],
                        "courseName"=>$row["courseNameHi"],
                        "status"=>$row["statusHi"],
                        "purchaseAmount"=>$row["purchaseAmount"],
                        "courseDescriptionHi"=>$row["courseDescriptionHi"],
                        "purchaseExpaireDate"=>$row["purchaseExpaireDate"],
                        "purchaseDate"=>$row["purchaseDate"],
                        "purchaseCourseId"=>$row["purchaseCourseId"],
                        
                    )
                ); 
            }
        }
        echo json_encode(array("status" => "200", "message" => "Data Found", "data" => $data_arr));
    } else {
        echo json_encode(array("status" => "201", "message" => "No Data Found", "data" => []));
    }
?>