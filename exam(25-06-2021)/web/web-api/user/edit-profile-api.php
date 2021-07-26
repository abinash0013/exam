<?php
		
    session_start();
    
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

    // make sure data is not empty
    // if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password'])) {

    // get id of product to be edited

    // $data = json_decode(file_get_contents("php://input"));
    
    // set ID property of product to be edited

    // $User->id = $data->id;

    // set product property values
    $User->userId=$_POST['userId'];
    $User->userName=$_POST['userName'];
    $User->userGender=$_POST['userGender'];

    // update the product
    if($User->update()){
        
        // set response code - 200 ok
        http_response_code(200);
            $_SESSION['userName']=$_POST['userName'];
    
        // tell the user
        echo json_encode([
            "message" => "Successfully Updated",
            "status" => "200"
        ]);
        
    }
    
    // if unable to update the product, tell the user
    else{
    
        // set response code - 503 service unavailable
        http_response_code(503);
    
        // tell the user
        echo json_encode([
            "message" => "Unable to Update",
            "status" => "202",
        ]);
        
    }

?>