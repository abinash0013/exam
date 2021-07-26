<?php
    
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset= UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header(
        "Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With"
    );
    
    // get database connection
    include_once '../config/database.php';
    
    // instantiate product object
    include_once '../objects/user.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $User = new User($db);
    
    // get posted data
    $data = json_decode(file_get_contents("php://input"));
    
    // make sure data is not empty
    if (
        !empty($data->userName)
    ) {
        // set product property values
        $User->userId = $data->userId; 
        $User->userName = $data->userName; 
        $User->userGender = $data->userGender; 
        $User->userDob = $data->userDob; 
        $User->image = $data->image; 
        $User->updatedAt = date('Y-m-d H:i:s');
     
        $stmt = $User->profileEdit();
        if ($stmt == true) { 
            // extract row
            // set response code - 200 OK
            http_response_code(200);
            // show products data in json format
            echo json_encode([
               "message" => "Profile update successfull",
               "status" => "200"                            
            ]);            
        } else {
            // set response code - 400 bad request
            http_response_code(301);

            // tell the user
            echo json_encode(["message" => "Something Went Wrong"]);
        }   
    } else {
        // set response code - 400 bad request
        http_response_code(201);
    
        // tell the user
        echo json_encode(["message" => "Data is incomplete."]);
    }

?>
