
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
// include_once '../objects/user.php';
include_once '../objects/banner.php';
$database = new Database();
$db = $database->getConnection();
//$User = new User($db);
$Banner = new Banner($db);
$data = json_decode(file_get_contents("php://input"));
// make sure data is not empty 
$Banner->lg=$data->lg; 
// query products
$stmt = $Banner->get_banner();
$num = $stmt->rowCount();
// check if more than 0 record found
if ($num > 0) {
    // products array
    $data_arr = array(); 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($Banner->lg == 'en'){
        array_push(
            $data_arr, 
            array(
            "bannerId"=>$row["bannerId"],
            "title"=>$row["title"], 
            "description"=>$row["description"],
            "bannerImage"=>$row["image"],
             
            )
            );
        }else{
            array_push(
            $data_arr,  
            array(
            "bannerId"=>$row["bannerId"],
            "title"=>$row["titleHi"], 
            "description"=>$row["descriptionHi"],
            "bannerImage"=>$row["image"],
            )
            ); 
        }
    }
    echo json_encode(array("status" => "200", "message" => "Data Found", "data" => $data_arr));
} else {
    echo json_encode(array("status" => "201", "message" => "Wrong Request", "data" => []));
}
?>