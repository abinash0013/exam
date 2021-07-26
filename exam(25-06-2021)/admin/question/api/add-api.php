<?php

    include './../../config.php';
    
    $examId = $_POST['examId'];
     
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
    $explaination = $_POST['explaination'];
    
    $insert = $con->query("INSERT INTO `question`( `questionlabel`, `questionLabelHi`, `answer`, `option1`, `option2`, `option3`, `option4`, `option1Hi`, `option2Hi`, `option3Hi`, `option4Hi`, `subjectNameHi`, `subjectName`, `explaination`, `examId`, `createdAt`) VALUES ( '$questionLabel','$questionLabelHi','$answer','$optionOne','$optionTwo','$optionThree','$optionFour','$optionOneHi','$optionTwoHi','$optionThreeHi','$optionFourHi','$subjectName','$subjectNameHi', '$explaination', '$examId',now())");

    $res->success = false;
    if($insert > 0){ 
        $rsp->status = "200";
        $rsp->message = 'Successfully Added';
        $rsp->examid =$examId;
     // header("Location: ../index.php?id=".$examId);
     //   alert('Successfully Added');
    }
    else{
        $rsp->status = '204';
        $rsp->message = 'failed';
         $rsp->examid =$examId;
       // header("Location: ../index.php?id=".$examId);
    }
    echo json_encode($rsp);
    
?>
    
    