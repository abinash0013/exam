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
 
    $User->oldPassword = md5($data->oldPassword); 
    $User->newPassword = md5($data->newPassword); 
    $User->userId = $data->userId; 
    $User->updatedAt = date('Y-m-d H:i:s');
    
    $stmt1 = $User->userProfile();
    $num = $stmt1->rowCount(); 
    // check if more than 0 record found
    if ($num > 0) { 
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $old_passsword = $User->newPassword;
            if ( $User->oldPassword == $old_passsword ) { 
                $stmt = $User->password_update();
                if ($stmt == true) {
                    http_response_code(200);
                    // show products data in json format
                    echo json_encode([
                        "message" => "Password Update Successfully",
                        "status" => "200" 
                    ]);    
                } else {
                    // set response code - 400 bad request
                    http_response_code(301);
                    // tell the user
                    echo json_encode([
                        "message" => "Password Update Failed", 
                        "status" => "301"
                    ]);
                }
            }  
            else{
                echo json_encode([
                    "message" => "Old password not match",
                    "status" => "201"
                ]);
            }
        }           
    }
    else{
        echo json_encode([
            "message" => "User Not Match",
            "status" => "201"
        ]);
        // create the product 
    }
    
?>