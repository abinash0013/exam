<?php 
    include "./config.php";
       
    
    $lg="en";//$_POST['lg'];
    $courseId=$_POST['courseId'];
    $studentId=$_POST['studentId'];
    $purchaseDate="";//$_POST['purchaseDate'];
    $purchaseExpaireDate="";//$_POST['purchaseExpaireDate'];
    $purchaseAmount=$_POST['purchaseAmount'];
    $status="purchased";//$_POST['status'];
    $courseName=$_POST['courseName'];
    $courseDescription=$_POST['courseDescription'];
    $courseNameHi=$_POST['courseNameHi'];
    $courseDescriptionHi=$_POST['courseDescriptionHi'];
    $statusHi="खरीदा";//$_POST['statusHi'];
    $paymentMode="online";
    $createdAt = date('y-m-d h:i:s');
    
    
 echo $con->query("INSERT INTO `tbl_purchase_course`(`paymentMode`, `studentId`, `courseId`, `purchaseDate`, `purchaseExpaireDate`, `purchaseAmount`, `status`, `courseName`, `courseDescription`, `courseNameHi`, `courseDescriptionHi`, `statusHi`) 
                                     VALUES ('$paymentMode', '$studentId', '$courseId', '$purchaseDate', '$purchaseExpaireDate', '$purchaseAmount','$status', '$courseName', '$courseDescription', '$courseNameHi', '$courseDescriptionHi', '$statusHi')");
        
     
    
?>