<?php
    include './../../config.php';
    
    $faqId = $_POST['faqId'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    
    $insert = $con->query("UPDATE `tbl_faq` SET `question`='$question',`answer`='$answer',`updatedAt`=now() where faqId='$faqId'");
    
    $res->success = false;
    if($insert > 0){ 
        $rsp->status = "200";
        $rsp->message = 'Successfully Updated';
    }
    else{
        $rsp->status = '204';
        $rsp->message = 'Something Went Wrong';
    }
    echo json_encode($rsp);

?>
    