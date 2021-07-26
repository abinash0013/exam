<?php session_start(); ?>

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
    
    // make sure data is not empty
    if (!empty($_POST['userName']) && !empty($_POST['userEmail']) && !empty($_POST['userPassword'])) {
        
        // set product property values
        $User->userName =$_POST['userName'];
        $User->userEmail =$_POST['userEmail'];
        $User->userPhone =$_POST['userPhone'];
        $User->userDob =$_POST['userDob'];
        $User->userPassword =md5($_POST['userPassword']);
        $User->createdAt = date('Y-m-d');
        
        // query products
        $stmtL = $User->loginCheck();
        $num1 = $stmtL->rowCount();
    
        // check if more than 0 record found
        if ($num1 > 0) {
            echo json_encode([
                "message" => "Email Already Used...!",
                "status" => "202",
            ]);
        } else {
            // create the product
    
            $stmt = $User->register();
            if ($stmt == true) {
                $User->userEmail =$_POST['userEmail']; 
                $User->userPassword =md5($_POST['userPassword']);
                $stmt5 = $User->login();
                while ($row = $stmt5->fetch(PDO::FETCH_ASSOC)) { 
                              $_SESSION['userId'] = $row['userId']; 
                              $_SESSION['userName'] = $row['userName']; 
                              $_SESSION['userEmail'] = $row['userEmail']; 
				              $_SESSION['userPassword'] = $row['userPassword'];   
			                  $_SESSION['updateAt'] = $row['updateAt'];
                        
                   
                }
                 echo json_encode([
                    "message" => "Account Created.",
                    "status" => "200",
                     
                ]);
            } else {
                // set response code - 400 bad request
                //   http_response_code(301);
                echo json_encode(["message" => "Something went wrong"]);
            }
        }
    }
    
?>
