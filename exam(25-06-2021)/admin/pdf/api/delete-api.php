<?php
    
    include './../../config.php';
    
    if(isset($_POST['id'])){
    	$pid= $_POST['id'];
     
    	$sql = $con->query("DELETE FROM `tbl_pdf` WHERE pdfId=$pid");
        
        if($sql > 0)
        { 
            $rsp->status = "200";
            $rsp->message='Successfully Deleted';
        }
        else{
            $rsp->status='204';
            $rsp->message='Something Went Wrong';
        }
    
        echo json_encode($rsp);
    	 
    }
    
?>
  