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
    include_once '../objects/user.php';
    
    $database = new Database();
    $db = $database->getConnection();

    $User = new User($db);
    
  //  $data = json_decode(file_get_contents("php://input"));
    
    if(!empty($_POST['userEmail'])){
        $User->userEmail = $_POST['userEmail'];
        $User->passwordBase64 = mb_strimwidth(base64_encode($_POST['userEmail']), 0, 6, "");
        $User->userPassword = md5($User->passwordBase64);     
        $stmt = $User->send_mail();        
        // check if more than 0 record found
        if($stmt == true){   
            echo json_encode(array("message" => "mail sent successfully","status" => "200"));
        }
        else{
            // set response code - 400 bad request
            http_response_code(201);
            //tell the user
            echo json_encode(array("message" => "something went wrong","status" => "201"));
        }
    }    

?>