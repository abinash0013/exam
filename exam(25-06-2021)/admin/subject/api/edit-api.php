<?php
    
    include './../../config.php';
    
    $courseId = $_POST['courseId'];
    $subjectId = $_POST['subjectId'];
    $subjectName = $_POST['subjectName'];
    $subjectNameHi = $_POST['subjectNameHi'];

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
        $sql ="select * from `tbl_subject` where subjectId='$subjectId' ";
        $result = mysqli_query($con,$sql);
       
        while($row = mysqli_fetch_array($result)){
            $path=$row['image'];
		}
    }
        
    $insert = $con->query("UPDATE `tbl_subject` SET `subjectName`='$subjectName',`subjectNameHi`='$subjectNameHi',`image`='$path',`courseId`='$courseId',`updatedAt`=now() WHERE subjectId=$subjectId");

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
    