<?php

    include './../../config.php';

    $courseId = $_POST['courseId'];
    $subjectId = $_POST['subjectId'];
    $examName = $_POST['examName'];
    $examNameHi = $_POST['examNameHi'];
    $examDescription = $_POST['examDescription'];
    $examDescriptionHi = $_POST['examDescriptionHi'];
    $examDate = $_POST['examDate'];
    $type = $_POST['type'];
    $typeHi = $_POST['typeHi'];
    $examTime = $_POST['examTime'];
    $examMarks = $_POST['examMarks'];
    $totalQuestion = $_POST['totalQuestion'];
    $expireDate = $_POST['expireDate'];
    $examStatus = $_POST['examStatus'];
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
    
    $insert = $con->query("INSERT INTO `exam`(`examName`, `image`, `description`, `descriptionHi`, `examDate`, `createdAt`, `examNameHi`, `courseId`, `subjectId`, `type`, `typeHi`, `examTime`, `examMarks`, `totalQuestion`, `expaireDate`, `examStatus`) VALUES ('$examName','$path','$examDescription','$examDescriptionHi','$examDate', now(), '$examNameHi','$courseId','$subjectId','$type','$typeHi','$examTime','$examMarks','$totalQuestion','$expireDate','$examStatus')");
    
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