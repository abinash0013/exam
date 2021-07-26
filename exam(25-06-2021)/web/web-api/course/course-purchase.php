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
$Course->studentId=$data->studentId;
$Course->purchaseDate=$data->purchaseDate;
$Course->purchaseExpaireDate=$data->purchaseExpaireDate;
$Course->purchaseAmount=$data->purchaseAmount;
$Course->status=$data->status;
$Course->courseName=$data->courseName;
$Course->courseDescription=$data->courseDescription;
$Course->courseNameHi=$data->courseNameHi;
$Course->courseDescriptionHi=$data->courseDescriptionHi;
$Course->statusHi=$data->statusHi;
$Course->paymentMode="online";
// query products
$stmt = $Course->coursePurchase();
 
// check if more than 0 record found
if ($stmt == true) {
    // products array
  
        if($Course->lg == 'en'){
        
            echo json_encode(array("status" => "200", "message" => "Payment successful"));
             
        }else{
          echo json_encode(array("status" => "200", "message" => "भुगतान सफल"));
        }
    
    
} else {
    echo json_encode(array("status" => "201", "message" => "Some thing went wrong"));
}
?>