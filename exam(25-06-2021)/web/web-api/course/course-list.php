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
include_once '../objects/course-purchage.php';
$database = new Database();
$db = $database->getConnection();
//$User = new User($db);
$Course = new Course($db);
$data = json_decode(file_get_contents("php://input"));
// make sure data is not empty 
   
$Course->lg=$data->lg;
// query products
$stmt = $Course->get_course();
$num = $stmt->rowCount();
// check if more than 0 record found
if ($num > 0) {
    // products array
    $data_arr = array(); 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $purcourse=null;
    $purchaseCourseId=null;
     $Purchase = new Purchase($db);
    $Purchase->studentId=$data->studentId; 
    $stmt2 = $Purchase->purchage_list(); 
    $num2 = $stmt2->rowCount(); 
     while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $purchaseCourseId=$row2["courseId"];
     }
     $courseId=null;
     $courseId=$row['courseid'];
    // check if more than 0 record found
    if ($num2 > 0 && $purchaseCourseId == $courseId) {
        $purcourse='1';
        
    }else{
          $purcourse='0';
    }
        if($Course->lg == 'en'){
        array_push(
            $data_arr, 
            array("courseId"=>$row["courseid"],
            "courseName"=>$row["courseName"],
            "coursePrice"=>$row["coursePrice"],
            "courseIcon"=>$row["icon"],
            "courseImage"=>$row["image"],
            "coursePurchase"=>$purcourse,
            "createdAt"=>$row["createdAt"]
            )
            );
        }else{
            array_push(
            $data_arr, 
            array("courseId"=>$row["courseid"],
            "courseName"=>$row["courseNameHi"],
            "coursePrice"=>$row["coursePrice"],
             "courseIcon"=>$row["icon"],
            "courseImage"=>$row["image"],
             "coursePurchase"=>$purcourse,
            "createdAt"=>$row["createdAt"]
            )
            ); 
        }
    }
    echo json_encode(array("status" => "200", "message" => "Data Found", "data" => $data_arr));
} else {
    echo json_encode(array("status" => "201", "message" => "Wrong Request", "data" => []));
}
?>