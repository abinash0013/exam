<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $eId = $_GET['id'];
    $resultdata = $con->query("SELECT exam.*, tbl_subject.subjectName as sname, tbl_subject.subjectNameHi as snamehi, tbl_course.courseName as cname, tbl_course.courseNameHi as cnamehi FROM exam LEFT JOIN tbl_subject on tbl_subject.subjectId = exam.subjectId LEFT JOIN tbl_course on tbl_course.courseid = exam.courseId where examId = $eId");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    }
?>
<!-- ::::::::::::::::::::::::::::::::::::> Fetch Data End <:::::::::::::::::::::::::::::::::::: -->

<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table Start <::::::::::::::::::::::::::::::::::::::  -->
<?php
    $resultdataCourse =$con->query("select * from `tbl_course` order by courseName ASC" );
    $resultCourse=array();
    while($rowCourse=mysqli_fetch_array($resultdataCourse))
    {
       $resultCourse[]= $rowCourse;
    }
?> 
<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table End <::::::::::::::::::::::::::::::::::::::  -->

<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table Start <::::::::::::::::::::::::::::::::::::::  -->
<?php
    $resultdataSubject = $con->query("select * from `tbl_subject` order by subjectName ASC" );
    $resultSubject = array();
    while($rowSubject = mysqli_fetch_array($resultdataSubject))
    {
       $resultSubject[]= $rowSubject;
    }
?> 
<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table End <::::::::::::::::::::::::::::::::::::::  -->

<!-- ::::::::::::::::::::::::::::::::::::::> Edit Details Ajax Start <::::::::::::::::::::::::::::::::::::::  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>=
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
<!-- ::::::::::::::::::::::::::::::::::::::> Edit Details Ajax End <::::::::::::::::::::::::::::::::::::::  -->
<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Exam</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Exam Edit</li>
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
                    Successfully Edited a New Exam
                </div>
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Edit Exam Form</h4>
					</div>
				</div>
				<form id="dataform" method="post">
				    <?php $i = 1; ?>
                    <?php foreach($result as $value) { ?>    
                        <input type='hidden' value='<?php echo $value['examId']?>' name='examId'> 
    					<div class="form-group">
    						<label>Course Name</label>
    						<select class="form-control" name="courseId" id="courseId" required>
                                <option value="<?php echo $value['courseId']; ?>" hidden><?php echo $value['cname'];?>,<?php echo $value['snamehi'];?></option>
                                <?php foreach($resultCourse as $valueCourse) { ?>
                                    <option value="<?php echo $valueCourse['courseid']; ?>"><?php echo $valueCourse['courseName'];?>,<?php echo $valueCourse['courseNameHi'];?></option>
                                <?php } ?>
    						</select>
    					</div>
    					<div class="form-group">
    						<label>Subject Name</label>
    						<select class="form-control" name="subjectId" id="subjectId" required>
                                <option value="<?php echo $value['subjectId']; ?>" hidden><?php echo $value['sname'];?>,<?php echo $value['snamehi'];?></option>
                                <?php foreach($resultSubject as $valueSubject) { ?>
                                    <option value="<?php echo $valueSubject['subjectId']; ?>"><?php echo $valueSubject['subjectName'];?>,<?php echo $valueSubject['subjectNameHi'];?></option>
                                <?php } ?>
    						</select>
    					</div>
    					<div class="form-group">
    						<label>Exam Name</label>
    						<input class="form-control" type="text" name="examName" id="examName" value="<?php echo $value['examName'];?>" >
    					</div>
    					<div class="form-group">
    						<label>Exam Name in Hindi</label>
    						<input class="form-control" type="text" name="examNameHi" id="examNameHi" value="<?php echo $value['examNameHi'];?>" >
    					</div>
    					<div class="form-group">
    						<label>Exam Description</label>
                            <textarea type="text" class="form-control" id="examDescription" name="examDescription"><?php echo $value['description'];?></textarea>
        				</div>
    					<div class="form-group">
    						<label>Exam Description in Hindi</label>
                            <textarea type="text" class="form-control" id="examDescriptionHi" name="examDescriptionHi"><?php echo $value['descriptionHi'];?></textarea>
        				</div>
    					<div class="form-group">
    						<label>Exam Date</label>
    						<input class="form-control" type="text" name="examDate" id="examDate" value="<?php echo $value['examDate'];?>" >
    					</div>
    					<div class="form-group">
    						<label>Exam Type</label>
    						<select class="form-control" name="type" id="type" required>
        					    <option value="<?php echo $value['type'];?>" hidden><?php echo $value['type'];?></option>
                                <option value="Mock">Mock</option>
                                <option value="Quiz">Quiz</option>
                                <option value="Today Quiz">Today Quiz</option>
                            </select>
    					</div>
    					<div class="form-group">
    						<label>Exam Type in Hindi</label>
    						<select class="form-control" name="typeHi" id="typeHi">
        					    <option value="<?php echo $value['typeHi'];?>" hidden><?php echo $value['typeHi'];?></option>
                                <option value="दिखावटी">दिखावटी</option>
                                <option value="प्रश्नोत्तरी">प्रश्नोत्तरी</option>
                                <option value="आज प्रश्नोत्तरी">Today Quiz</option>
                            </select>
    					</div>
    					<div class="form-group">
    						<label>Exam Time</label>
    						<input class="form-control" type="text" name="examTime" id="examTime" value="<?php echo $value['examTime'];?>" onkeypress="return isNumberKey(event)">
    					</div>
    					<div class="form-group">
    						<label>Exam Marks</label>
    						<input class="form-control" type="text" name="examMarks" id="examMarks" value="<?php echo $value['examMarks'];?>" >
    					</div>
    					<div class="form-group">
    						<label>Total Question</label>
    						<input class="form-control" type="text" name="totalQuestion" id="totalQuestion" value="<?php echo $value['totalQuestion'];?>" >
    					</div>
    					<div class="form-group">
    						<label>Expire Date</label>
    						<input class="form-control date-picker" type="date" name="expireDate" id="expireDate" value="<?php echo $value['expaireDate'];?>" >
    					</div>
    					<div class="form-group">
    						<label>Exam Image</label>
    						<div style="height:50px; width: 50px"><img src="<?php echo $value['image'];?>"></div>
    						<input type="file" class="form-control-file form-control height-auto"name="image" id="image" accept="image/*">
    					</div>
    					<div class="form-group">
    						<label>Exam Status</label>
    						<select class="form-control" name="examStatus" id="examStatus" required>
        					    <option value="<?php echo $value['examStatus'];?>" hidden><?php echo $value['examStatus'];?></option>
                                <option value="Active">Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>
    					</div>
    					<button type="submit" id="btnsubmit" class="btn btn-primary">Update Exam</button>
    				<?php } ?>
				</form>
			</div>
			<!-- horizontal Basic Forms End -->
		</div>
	</div>
</div>
<script>
    function isNumberKey(evt)
    {
    	var charCode = (evt.which) ? evt.which : event.keyCode
    	if (charCode > 31 && (charCode < 48 || charCode > 57))
    	return false;
    
    	return true;
    }
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#examDescription' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#examDescriptionHi' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
<?php include './../pages/footer.php'; ?>