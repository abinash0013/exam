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
include_once '../objects/feedback.php';

$database = new Database();
$db = $database->getConnection();

$Contact = new Contact($db);

$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty

 
    // set product property values
    $Contact->ContactName =$data->ContactName; 
    $Contact->contactEmail =$data->contactEmail;
    $Contact->subject =$data->subject;
    $Contact->message =$data->message;    
    $Contact->userId =$data->userId; 

    $stmt = $Contact->addContact();
    
    if($stmt == true)
    {
        echo json_encode(array(
            "status" => "200",
            "message" => "Contact added Successfull")
        );
    }
    else{
        // set response code - 400 bad request 
        echo json_encode(array(
            "status" => "202",
            "message" => "Unable to Add")
        );
    }
 
 
 
?>