<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
   
    // get database connection
    include_once '../config/database.php'; 
    include_once '../objects/user.php';
    
    $database = new Database();
    $db = $database->getConnection(); 
    $User = new User($db);
    
    $data = json_decode(file_get_contents("php://input")); 
    $User->userId  = $data->userId;
    
    $stmt = $User->userProfile();
    $num = $stmt->rowCount();
    // check if more than 0 record found
    if ($num > 0) {
        // products array
        $user_arr = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo json_encode(array("status" => "200", "message" => "Data Found Successfully", "data" => $row));
        }
    } else {
        echo json_encode(array("status" => "201", "message" => "Data is Not Available", "data" => []));
    }
    
?>