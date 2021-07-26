<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $sId = $_GET['id'];
    $resultdata = $con->query("SELECT tbl_subject.*, tbl_course.courseid, tbl_course.courseName, tbl_course.courseNameHi FROM tbl_subject LEFT JOIN tbl_course on tbl_course.courseid = tbl_subject.courseId where subjectId = '$sId'");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    }
?>
<!-- ::::::::::::::::::::::::::::::::::::> Fetch Data End <:::::::::::::::::::::::::::::::::::: -->

<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table Start <::::::::::::::::::::::::::::::::::::::  -->
<?php
     $resultdataCourse = $con->query("select * from `tbl_course` order by courseName ASC" );
     $resultCourse = array();
     while($rowCourse=mysqli_fetch_array($resultdataCourse))
    {
       $resultCourse[]= $rowCourse;
    }
?> 
<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table End <::::::::::::::::::::::::::::::::::::::  -->

<!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax Start <::::::::::::::::::::::::::::::::::::::  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#dataform").on('submit',(function(e) {
            $("#btnsubmit").hide();
            $("#loading").show();
            e.preventDefault();
            $.ajax({
                url: "api/edit-api.php",
                type: "POST",
                dataType:"JSON",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    console.log(data)
                    $("#btnsubmit").show(); 
                    $("#loading").hide();
                    if(data.status == '200')
                    {
                        $("#successmessage").show()
                        $("#dataform")[0].reset(); 
                        $("#successAlert").show().delay(3000).fadeOut();
                        window.location. reload();
                    }
                    else
                    { 
                        $("#err").show()
                    }
                },
                error: function(e) 
                {
                }          
            });
        }));
    });
</script>
<!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax End <::::::::::::::::::::::::::::::::::::::  -->

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Subject</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Subject Edit Form</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary" href="index.php" role="button">
								<i class="icon-copy ion-ios-arrow-back"></i> Back 
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- horizontal Basic Forms Start -->
			<div class="pd-20 card-box mb-30">
                <div class="alert alert-success" role="alert" id="successAlert" style="display:none">
                    Successfully Update..!
                </div>
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Edit Subject Form</h4>
					</div>
				</div>
				<form id="dataform" method="POST">
				    <?php $i = 1; ?>
                    <?php foreach($result as $value) { ?>  
                        <input type='hidden' value='<?php echo $value['subjectId']?>' name='subjectId'>     
    					<div class="form-group">
    						<label>Course Name</label>
    						<select class="form-control" name="courseId" id="courseId" required>
    						    <option value="<?php echo $value['courseId']; ?>" hidden><?php echo $value['courseName'];?>,<?php echo $value['courseNameHi'];?></option>
						        <?php foreach($resultCourse as $valueCourse) { ?>
                                    <!--if($valueCourse['courseid'] != $value['courseId']){ ?>-->
                                        <option value="<?php echo $valueCourse['courseid']; ?>"><?php echo $valueCourse['courseName'];?>,<?php echo $valueCourse['courseNameHi'];?></option>
                                <?php 
                                    // } 
                                } 
                                ?>
    						</select>
    					</div>
    					<div class="form-group">
    						<label>Subject Name</label>
    						<input class="form-control" type="text" name="subjectName" id="subjectName" value='<?php echo $value['subjectName']?>'>
    					</div>
    					<div class="form-group">
    						<label>Subject Name In Hindi</label>
    						<input class="form-control" type="text" name="subjectNameHi" id="subjectNameHi" value='<?php echo $value['subjectNameHi']?>'>
    					</div>
    					<div class="form-group">
    						<label>Subject Image</label>
    						<div>
    						    <img src="<?php echo $value['image']?>" style="widht: 60px; height: 80px;">
    						</div>
    						<input type="file" class="form-control-file form-control height-auto" name="image" accept="image/*">
    					</div>
    					<div class="form-group">
    					    <img src="./../image/lg.gif" id="loading" style="height: 40px; display:none">
    					</div>
    					<button type="submit" id="btnsubmit" class="btn btn-primary">Update Subject</button>
    				<?php } ?>
				</form>
			</div>
			<!-- horizontal Basic Forms End -->
		</div>
	</div>
</div>
	
<?php include './../pages/footer.php'; ?>