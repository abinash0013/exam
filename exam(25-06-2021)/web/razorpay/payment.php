<?php 
    include "./../config.php";
    
    if(isset($_POST['paymentId']) && isset($_POST['amt']) && isset($_POST['name'])){
        
        $paymentId = $_POST['paymentId'];
        $amt = $_POST['amt'];
        $name = $_POST['name'];
        $paymentStatus = $_POST['paymentStatus'];
        $createdAt = date('y-m-d h:i:s');
        mysqli_query($con,"INSERT INTO `tbl_payment`(`orderId`, `paymentId`, `totalAmount`, `createdAt`) VALUES ('$name','$paymentId','$amt',now())");
        
    }
    
?>