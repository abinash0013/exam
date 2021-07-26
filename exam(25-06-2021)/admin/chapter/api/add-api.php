<?php

    include './../../config.php';

    $courseId = $_POST['courseId'];
    $subjectId = $_POST['subjectId'];
    $chapterNo = $_POST['chapterNo'];
    $chapterName = $_POST['chapterName'];
    $chapterNameHi = $_POST['chapterNameHi'];
    $chapterDescription = $_POST['chapterDescription'];
    $chapterDescriptionHi = $_POST['chapterDescriptionHi'];
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
    
    $insert = $con->query("INSERT INTO `tbl_chapter`(`chapterNo`, `chapterName`, `chapterNameHi`, `chapterDescription`, `chapterDescriptionHi`, `courseId`, `subjectId`, `image`, `createdAt`) VALUES ('$chapterNo','$chapterName','$chapterNameHi','$chapterDescription','$chapterDescriptionHi','$courseId','$subjectId','$path',now())");
    
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