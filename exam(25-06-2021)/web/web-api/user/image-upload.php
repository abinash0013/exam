<?php
    
    include './../config/config.php';
    
    $userId=$_POST['userId']; 
    $path=null;
    if($_FILES['image']['name'] != null){
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
        $path = '/'; // upload directory
    
        // File upload path 
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
            move_uploaded_file($tmp,'./../../assets/img/'.$path);	
    	}
        $path=$baseimage.$path;
    }
    else{
        $sql ="select * from `tbl_users` where userId='$userId' ";
        $result = mysqli_query($con,$sql);
       
        while($row = mysqli_fetch_array($result)){
            $path=$row['userImage'];
		}
    }
    $insert = $con->query("update tbl_users set userImage='$path' where userId='$userId'"); 
    if($insert > 0)
    {
        $result->status=200;
        $result->message='Image Update Successfully';
    }
    else{
        $result->status=204;
        $result->message='Something Went Wrong !';
    }

    echo json_encode($result)
    
?>