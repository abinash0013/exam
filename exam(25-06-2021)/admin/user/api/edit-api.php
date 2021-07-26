<?php

    include './../../config.php';

    $userId = $_POST['userId'];
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $userImage = $_POST['userImage'];
    
    $qry = $con->query("UPDATE `tbl_users` SET `userName`='$userName',`userEmail`='$userEmail',`userPhone`='$phone',`userGender`='$gender',`userImage`='$userImage',`updatedAt`=now() WHERE userId = $userId");
    echo $qry;
    
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