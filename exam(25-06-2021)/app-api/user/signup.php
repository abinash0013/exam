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
        !empty($data->userName) &&
        !empty($data->userEmail) &&
        !empty($data->userPassword)
    ) {
        // set product property values
        $User->userName = $data->userName;
        $User->userEmail = $data->userEmail;
        $User->userPhone = $data->userPhone;
        $User->userDob = $data->userDob;
        $User->userGender = $data->userGender;
        $User->userPassword = md5($data->userPassword);
        $User->createdAt = date('Y-m-d H:i:s');
        $User->updatedAt = date('Y-m-d H:i:s');
        // query products
        $stmt = $User->checkemaillogin();
        $num1 = $stmt->rowCount();

        // check if more than 0 record found
        if ($num1 > 0)
        {
            echo json_encode([
                "message" => "Email Already Used",
                "status" => "202",
            ]);
        } else {
            $stmt = $User->register();
            
            if ($stmt == true) {
                $User->userEmail = $data->userEmail;
                $User->userPasswordMd5 = md5($data->userPassword);
                $stmt5 = $User->login();
                while ($row = $stmt5->fetch(PDO::FETCH_ASSOC)) {
                    // show products data in json format
                    $data = json_encode(array($row));
                    $User->authtoken = base64_encode($data); 
                    $stmtt = $User->user_auth_token_update();
    
                    $stmt5 = $User->login();
                    $num5 = $stmt5->rowCount();
    
                    // check if more than 0 record found
                    if ($num5 > 0) {
                        while ($row = $stmt5->fetch(PDO::FETCH_ASSOC)) {
                            http_response_code(200);
                            echo json_encode([
                                "message" => "data found",
                                "status" => "200",
                                "data" => $row,
                            ]);
                        }
                        // echo json_encode(array("message" => "User Register Successful","status" => "200","data" => $row));
                    }
                }
            } else {
                http_response_code(301);
    
                echo json_encode(["message" => "Something went wrong"]);
            }
        }
    } else {
        http_response_code(201);
    
        echo json_encode(["message" => "Data is incomplete."]);
    }

?>