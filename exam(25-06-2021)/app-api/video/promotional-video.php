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
    include_once '../objects/video.php';
    $database = new Database();
    $db = $database->getConnection();
     
    $Video = new Video($db);
    $data = json_decode(file_get_contents("php://input"));  
    $Video->lg=$data->lg;
    $Video->courseId=$data->courseId;
    // query products
    $stmt = $Video->get_promotional_video();
    $num = $stmt->rowCount();
    // check if more than 0 record found
    if ($num > 0) {
        // products array
        $data_arr = array(); 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($Video->lg == 'en'){
                array_push(
                    $data_arr, 
                    array(
                        "videoId"=>$row["videoId"],
                        "courseId"=>$row["courseId"],
                        "videoTitle"=>$row["videoTitle"],
                        "videoDescription"=>$row["videoDescription"],
                        "videoUrl"=>$row["videoUrl"],
                        "videoImage"=>$row["videoImage"],
                    )
                );
            }else{
                array_push(
                    $data_arr, 
                    array( 
                        "videoId"=>$row["videoId"],
                        "courseId"=>$row["courseId"],
                        "videoTitle"=>$row["videoTitleHi"],
                        "videoDescription"=>$row["videoDescriptionHi"],
                        "videoUrl"=>$row["videoUrl"],
                        "videoImage"=>$row["videoImage"], 
                    )
                ); 
            }
        }
        echo json_encode(array("status" => "200", "message" => "Data Found", "data" => $data_arr));
    } else {
        echo json_encode(array("status" => "201", "message" => "Data is not avilable", "data" => []));
    }
?>