<?php

    include './../../config.php';

    $courseId = $_POST['courseId'];
    $subjectId = $_POST['subjectId'];
    $chapterNo = $_POST['chapterNo'];
    $chapterName = $_POST['chapterName'];
    $chapterNameHi = $_POST['chapterNameHi'];
    $chapterDescription = $_POST['chapterDescription'];
    $chapterDescriptionHi = $_POST['chapterDescriptionHi'];
    
    $insert = $con->query("INSERT INTO `tbl_chapter`(`chapterNo`, `chapterName`, `chapterNameHi`, `chapterDescription`, `chapterDescriptionHi`, `courseId`, `subjectId`, `createdAt`) VALUES ('$chapterNo','$chapterName','$chapterNameHi','$chapterDescription','$chapterDescriptionHi','$courseId','$subjectId',now())");
    
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