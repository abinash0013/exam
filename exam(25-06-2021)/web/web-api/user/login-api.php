<?php session_start(); ?>

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

    if(!empty($_POST['userEmail']) && !empty($_POST['userPassword'])){
       
        $User->userEmail =$_POST['userEmail'];
        $User->userPassword =md5($_POST['userPassword']);
         $User->updateAt = date('Y-m-d H:i:s');
        // query products
           $stmt2 = $User->updateAtUpdate();
        // if(true == $User->user_auth_token_update()){

        $stmt = $User->login();
        $num = $stmt->rowCount();    
        
        // check if more than 0 record found
        if($num>0){   
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row > 0){  
                    $_SESSION['userId'] = $row['userId']; 
                    $_SESSION['userName'] = $row['userName']; 
				    $_SESSION['userEmail'] = $row['userEmail'];  
				    $_SESSION['userPassword'] = $row['userPassword'];  
				     $_SESSION['updateAt'] = $row['updateAt'];  
                     
                    echo json_encode(array("message" => "data found","status" => "200","data" => $row));

                    // extract row
                    // set response code - 200 OK
                    // http_response_code(200);        
                    // show products data in json format
                }
            }
        }
        else{
            // set response code - 400 bad request
            //http_response_code(201);

            //tell the user
            echo json_encode(array("message" => "Email and Password Wrong"));
        }
    }
    else{
        //     // set response code - 400 bad request
        //     http_response_code(400);
        echo json_encode(array("message"=>"Data is Incomplete"));
        // }
        
    }
?>