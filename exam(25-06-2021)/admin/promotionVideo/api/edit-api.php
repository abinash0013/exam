<?php

    include './../../config.php';

    $videoId = $_POST['videoId'];
    $videoTitle = $_POST['videoTitle'];
    $videoTitleHi = $_POST['videoTitleHi'];
    $videoDescription = $_POST['videoDescription'];
    $videoDescriptionHi = $_POST['videoDescriptionHi'];
    $videoUrl = $_POST['videoUrl'];
    
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
        $sql ="select * from `tbl_videos` where videoId='$videoId' ";
        $result = mysqli_query($con,$sql);
       
        while($row = mysqli_fetch_array($result)){
            $path=$row['videoImage'];
		}
    }
    
    // $lessonNumber = $_POST['lessonNumber'];
    
    $insert = $con->query("UPDATE `tbl_videos` SET `videoTitle`='$videoTitle',`videoDescription`='$videoDescription',`videoTitleHi`='$videoTitleHi',`videoDescriptionHi`='$videoDescriptionHi',`videoUrl`='$videoUrl',`videoImage`='$path',`videoType`='promotion',`updatedAt`= now() WHERE videoId=$videoId");
    
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