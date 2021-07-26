<?php
    
    include './../../config.php';
    
    $questionId = $_POST['questionId'];
    $questionType = $_POST['questionType'];
    $questionLabel = $_POST['questionLabel'];
    $questionLabelHi = $_POST['questionLabelHi'];
    $answer = $_POST['answer'];
    $optionOne = $_POST['optionOne'];
    $optionTwo = $_POST['optionTwo'];
    $optionThree = $_POST['optionThree'];
    $optionFour = $_POST['optionFour'];
    $optionOneHi = $_POST['optionOneHi'];
    $optionTwoHi = $_POST['optionTwoHi'];
    $optionThreeHi = $_POST['optionThreeHi'];
    $optionFourHi = $_POST['optionFourHi'];
    $subjectName = $_POST['subjectName'];
    $subjectNameHi = $_POST['subjectNameHi'];
    $examId = $_POST['examId'];
    $explaination = $_POST['explaination'];
        
    $insert = $con->query("UPDATE `question` SET `questionType`='$questionType',`questionlabel`='$questionLabel',`questionLabelHi`='$questionLabelHi',`answer`='$answer',`option1`='$optionOne',`option2`='$optionTwo',`option3`='$optionThree',`option4`='$optionFour',`option1Hi`='$optionOneHi',`option2Hi`='$optionTwoHi', `option3Hi`='$optionThreeHi', `option4Hi`='$optionFourHi', `subjectNameHi`='$subjectName', `subjectName`='$subjectNameHi', `explaination`='$explaination', `examId`='$examId', `updatedAt`=now() WHERE questionId=$questionId");

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
    