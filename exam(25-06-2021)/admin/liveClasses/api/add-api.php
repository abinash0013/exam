<?php

    include './../../config.php';

    $courseId = $_POST['courseId'];
    $subjectId = $_POST['subjectId'];
    $chapterId = $_POST['chapterId'];
    $videoTitle = $_POST['videoTitle'];
    $videoTitleHi = $_POST['videoTitleHi'];
    $videoDescription = $_POST['videoDescription'];
    $videoDescriptionHi = $_POST['videoDescriptionHi'];
    $videoUrl = $_POST['videoUrl'];
    $image = $_POST['image'];
    $startedDate = $_POST['startedDate'];
    $endDate = $_POST['endDate'];
    $startedTime = $_POST['startedTime'];
    $endTime = $_POST['endTime'];
    
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
    $lessonNumber = $_POST['lessonNumber'];
    
    
    $insert = $con->query("INSERT INTO `tbl_videos`(`videoTitle`, `videoDescription`, `videoTitleHi`, `videoDescriptionHi`, `videoUrl`, `chapterId`, `subjectId`, `courseId`, `videoImage`, `lessonNumber`, `start_date`,`end_date`,`start_time`,`end_time`,`videoType`,`createdAt`) VALUES ('$videoTitle','$videoDescription','$videoTitleHi','$videoDescriptionHi','$videoUrl','$chapterId','$subjectId','$courseId','$path','$lessonNumber','$startedDate','$endDate','$startedTime','$endTime','live',now())");
    
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