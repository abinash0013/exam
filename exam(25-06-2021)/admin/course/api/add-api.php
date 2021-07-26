<?php
    include './../../config.php';
    
    $courseName = $_POST['courseName'];
    $courseNameHi = $_POST['courseNameHi'];
    $coursePrice = $_POST['coursePrice'];
    $courseDescription = $_POST['courseDescription'];
    $courseDescriptionHi = $_POST['courseDescriptionHi'];
    $image = $_POST['image'];
    
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
    
    $path = 'image/'; // upload directory
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    
    // check's valid format
    if(in_array($ext, $valid_extensions)){ 
        $path = $path.strtolower($final_image); 
        move_uploaded_file($tmp,'./../../'.$path);
    }
    
    $path=$baseimage.$path;    
    
    $insert = $con->query("INSERT INTO `tbl_course`(`courseName`, `courseNameHi`, `coursePrice`, `courseDes`, `courseDesHi`, `image`, `createdAt`) VALUES ('$courseName','$courseNameHi', '$coursePrice', 'courseDescription', 'courseDescriptionHi', '$path', now())");

    $res->success = false;
    if($insert > 0){ 
        $rsp->status = "200";
        $rsp->message = 'Successfully Added';
    }
    else{
        $rsp->status = '204';
        $rsp->message = 'failed';
    }
    echo json_encode($rsp);
    
?>
    
    