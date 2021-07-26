<?php

    include './../../config.php';

    $pdfId = $_POST['pdfId'];
    $courseId = $_POST['courseId'];
    $subjectId = $_POST['subjectId'];
    $chapterId = $_POST['chapterId'];
    $pdfTitle = $_POST['pdfTitle'];
    $pdfTitleHi = $_POST['pdfTitleHi'];
    $pdfDescription = $_POST['pdfDescription'];
    $pdfDescriptionHi = $_POST['pdfDescriptionHi'];
    $pathFile=null;
    
    if($_FILES['pdfUrl']['name'] != null){
    
    $valid_extensions = array('pdf'); // valid extensions
    $pathFile = 'pdfUpload/'; // upload directory
    
    $pdff = $_FILES['pdfUrl']['name'];
    $tmp = $_FILES['pdfUrl']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($pdff, PATHINFO_EXTENSION));
    // can upload same pdfUrl using rand function
    $final_pdf = rand(1000,1000000).$pdff;
    // check's valid format
	if(in_array($ext, $valid_extensions)) 
	{ 
    	$pathFile = $pathFile.strtolower($final_pdf); 
    	move_uploaded_file($tmp,'./../../'.$pathFile);
	}
        $pathFile=$baseimage.$pathFile;
    }
    else{
        $sql ="select * from `tbl_pdf` where pdfId='$pdfId' ";
        $result1 = mysqli_query($con,$sql);
       
        while($row1 = mysqli_fetch_array($result1)){
            $pathFile=$row1['pdfUrl'];
		}
    }
    
    $path=null;
    
    if($_FILES['image']['name'] != null){
    
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
    $path = 'image/'; // upload directory
    
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    // check's valid format
	if(in_array($ext, $valid_extensions)) 
	{ 
    	$path = $path.strtolower($final_image); 
    	move_uploaded_file($tmp,'./../../'.$path);
	}
        $path=$baseimage.$path;
    }
    else{
        $sql ="select * from `tbl_pdf` where pdfId='$pdfId' ";
        $result = mysqli_query($con,$sql);
       
        while($row = mysqli_fetch_array($result)){
            $path=$row['pdfImage'];
		}
    }
    
    // $lessonNumber = $_POST['lessonNumber'];
    
    $insert = $con->query("UPDATE `tbl_pdf` SET `pdfTitle`='$pdfTitle',`pdfTitleHi`='$pdfTitleHi',`pdfDescription`='$pdfDescription',`pdfDescriptionHi`='$pdfDescriptionHi',`chapterId`='$chapterId',`subjectId`='$subjectId',`courseId`='$courseId',`pdfImage`='$path',`pdfUrl`='$pathFile',`updatedAt` = now() WHERE pdfId = $pdfId");
    
    $res->success = false;
    if($insert > 0){ 
        $rsp->status = "200";
        $rsp->message = 'Successfully Updated';
    }
    else{
        $rsp->status = '204';
        $rsp->message = 'Failed..!';
    }
    echo json_encode($rsp);
    
?>