<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// get database connection
include_once '../config/database.php';
// instantiate product object
// include_once '../objects/user.php';
include_once '../objects/course.php';
$database = new Database();
$db = $database->getConnection();
//$User = new User($db);
$Course = new Course($db);
$data = json_decode(file_get_contents("php://input"));
// make sure data is not empty 
$Course->lg=$data->lg;
$Course->courseId=$data->courseId;
// query products
$stmt = $Course->courseDetails();
$num = $stmt->rowCount();
// check if more than 0 record found
if ($num > 0) {
    // products array
    $data_arr = array(); 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($Course->lg == 'en'){
        
            echo json_encode(array("status" => "200", "message" => "Data Found", "data" =>  
            array("courseId"=>$row["courseid"],
            "courseName"=>$row["courseName"],
            "coursePrice"=>$row["coursePrice"],
            "courseIcon"=>$row["icon"],
            "courseImage"=>$row["image"],
            "createdAt"=>$row["createdAt"]
            )
            ));
             
        }else{
          echo json_encode(array("status" => "200", "message" => "Data Found", "data" =>  
          array("courseId"=>$row["courseid"],
            "courseName"=>$row["courseNameHi"],
            "coursePrice"=>$row["coursePrice"],
             "courseIcon"=>$row["icon"],
            "courseImage"=>$row["image"],
            "createdAt"=>$row["createdAt"]
            )
            )); 
        }
    }
    
} else {
    echo json_encode(array("status" => "201", "message" => "data not found", "data" => ""));
}
?>