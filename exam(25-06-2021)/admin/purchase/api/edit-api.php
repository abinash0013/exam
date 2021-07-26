<?php

    include './../../config.php';

    $chapterId = $_POST['chapterId'];
    $courseId = $_POST['courseId'];
    $subjectId = $_POST['subjectId'];
    $chapterNo = $_POST['chapterNo'];
    $chapterName = $_POST['chapterName'];
    $chapterNameHi = $_POST['chapterNameHi'];
    $chapterDescription = $_POST['chapterDescription'];
    $chapterDescriptionHi = $_POST['chapterDescriptionHi'];
    
    $insert = $con->query("UPDATE `tbl_chapter` SET `chapterNo`='$chapterNo',`chapterName`='$chapterName',`chapterNameHi`='$chapterNameHi',`chapterDescription`='$chapterDescription',`chapterDescriptionHi`='$chapterDescriptionHi',`courseId`='$courseId',`subjectId`='$subjectId',`updatedAt`= now() WHERE chapterId=$chapterId");
    
    $res->success = false;
    if($insert > 0){ 
        $rsp->status = "200";
        $rsp->message = 'Successfully Updated';
    }
    else{
        $rsp->status = '204';
        $rsp->message = 'failed';
    }
    echo json_encode($rsp);
    
?>