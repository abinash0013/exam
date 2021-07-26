<!--?php

    include './../config/config.php';
    
    $courseId=$_POST['courseId']; 
    $studentId=$_POST['studentId'];
    $purchaseDate="";//$_POST['purchaseDate'];
    $purchaseExpaireDate="";//$_POST['purchaseExpaireDate'];
    $purchaseAmount=$_POST['purchaseAmount'];
    $status="purchasedd";//$_POST['status'];
    $courseName=$_POST['courseName'];
    $courseDescription=$_POST['courseDescription'];
    $courseNameHi=$_POST['courseNameHi'];
    $courseDescriptionHi=$_POST['courseDescriptionHi'];
    $statusHi="खरीदा";//$_POST['statusHi'];
    $paymentMode="online";
    
    $insert = $con->query("INSERT INTO `tbl_purchase_course` (`paymentMode`, `studentId`, `courseId`, `purchaseDate`, `purchaseExpaireDate`, `purchaseAmount`, `status`, `courseName`, `courseDescription`, `courseNameHi`, `courseDescriptionHi`, `statusHi`) VALUES ('$paymentMode','$studentId','$courseId','$purchaseDate','$purchaseExpaireDate','$purchaseAmount','$status','$courseName','$courseDescription','$courseNameHi','$courseDescriptionHi','$statusHi')");

    $res->success = false;
    if($insert > 0){ 
        if($Course->lg == 'en'){
            $rsp->status = "200";
            $rsp->message = 'Payment successful';
        }else{
            $rsp->status = "200";
            $rsp->message = 'भुगतान सफल';
        }
    }
    else{
        $rsp->status = '204';
        $rsp->message = 'Payment Failed';
    }
    echo json_encode($rsp);
    
?-->
    
    