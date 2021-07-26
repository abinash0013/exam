<?php

    include './../../config.php';

    $pdfTitle = $_POST['pdfTitle'];
    $pdfTitleHi = $_POST['pdfTitleHi'];
    $pdfDescription = $_POST['pdfDescription'];
    $pdfDescriptionHi = $_POST['pdfDescriptionHi'];
    $valid_extensions = array('pdf'); // valid extensions
    
    $pathFile = 'pdfUpload/'; // upload directory
    $pdff = $_FILES['pdfUrl']['name'];
    $tmp = $_FILES['pdfUrl']['tmp_name'];
    
    // get uploaded file's extension
    $ext = strtolower(pathinfo($pdff, PATHINFO_EXTENSION));
    
    // can upload same image using rand function
    $final_pdf = rand(1000,1000000).$pdff;
    
    // check's valid format
    if(in_array($ext, $valid_extensions)){ 
        $pathFile = $pathFile.strtolower($final_pdf); 
        move_uploaded_file($tmp,'./../../'.$pathFile);
    }
    
    $pathFile=$baseimage.$pathFile;    
    
    $image = $_POST['pdfImage'];
    
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
    
    $path = 'image/'; // upload directory
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    
    // check's valid format
    if(in_array($ext, $valid_extensions)){ 
        $path = $path.strtolower($final_image); 
        move_uploaded_file($tmp,'./../../'.$path);
    }
    
    $path=$baseimage.$path;    
    
    
    $insert = $con->query("INSERT INTO `tbl_pdf`(`pdfTitle`, `pdfDescription`, `pdfTitleHi`, `pdfDescriptionHi`, `pdfUrl`, `chapterId`, `subjectId`, `courseId`, `pdfImage`, `pdfType`, `createdAt`) VALUES ('$pdfTitle','$pdfDescription','$pdfTitleHi','$pdfDescriptionHi','$pathFile','$chapterId','$subjectId','$courseId','$path','promotion',now())");
    
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