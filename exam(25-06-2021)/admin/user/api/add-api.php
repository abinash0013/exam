<?php

    include './../../config.php';

    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $userImage = $_POST['userImage'];
    
    $insert = $con->query("INSERT INTO `tbl_users`(`userName`, `userEmail`, `userPhone`, `userGender`, `userImage`, `createdAt`) VALUES ('$userName','$userEmail','$phone','$gender','$userImage', now())");
    echo $insert;
    
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


<!--$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions-->
    
<!--    $path = 'image/'; // upload directory-->
<!--    $img = $_FILES['image']['name'];-->
<!--    $tmp = $_FILES['image']['tmp_name'];-->
    
<!--    // get uploaded file's extension-->
<!--    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));-->
    
<!--    // can upload same image using rand function-->
<!--    $final_image = rand(1000,1000000).$img;-->
    
<!--    // check's valid format-->
<!--    if(in_array($ext, $valid_extensions)){ -->
<!--        $path = $path.strtolower($final_image); -->
<!--        move_uploaded_file($tmp,'./../../'.$path);-->
<!--    }-->
    
<!--    $path=$baseimage.$path;-->