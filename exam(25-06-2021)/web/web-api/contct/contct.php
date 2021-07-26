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
    include_once '../objects/contact.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Contact = new Contact($db);
    
    // make sure data is not empty
    
    // if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message']))
    // {
        // set product property values
        $Contact->contactName =$_POST['contactName']; 
        $Contact->contactEmail =$_POST['contactEmail'];
        $Contact->subject =$_POST['subject'];
        $Contact->message =$_POST['message'];    
        $Contact->userId = $_POST['userId']; 
    
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
    // }
    // else{
    //     // set response code - 400 bad request 
    //       echo json_encode(array(
    //           "status" => "404",
    //           "message" => "Data Incomplete")
    //       );
    // }
 
?>