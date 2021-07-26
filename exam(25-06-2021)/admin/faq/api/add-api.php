<?php
    include './../../config.php';
    
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    
    $insert = $con->query("INSERT INTO `tbl_faq`(`question`, `answer`, `createdAt`) VALUES ('$question','$answer', now())");

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
    
    