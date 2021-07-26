<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

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

<!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax Start <::::::::::::::::::::::::::::::::::::::  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>=
<script>
    $(document).ready(function (e) {
        $("#dataform").on('submit',(function(e) {
            $("#btnsubmit").hide();
            $("#loading").show();
            e.preventDefault();
            $.ajax({
                url: "api/add-api.php",
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
								<li class="breadcrumb-item active" aria-current="page">Exam Add</li>
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
                    Successfully Added a New Exam
                </div>
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Add Exam Form</h4>
					</div>
				</div>
				<form id="dataform" method="post">
					<div class="form-group">
						<label>Course Name</label>
						<select class="form-control" name="courseId" id="courseId" required>
                            <?php foreach($resultCourse as $valueCourse) { ?>
						        <option selected selected hidden disabled>Select Course</option>
                                <option value="<?php echo $valueCourse['courseid']; ?>"><?php echo $valueCourse['courseName'];?>,<?php echo $valueCourse['courseNameHi'];?></option>
                            <?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Subject Name</label>
						<select class="form-control" name="subjectId" id="subjectId" required>
                            <?php foreach($resultSubject as $valueSubject) { ?>
						        <option selected selected hidden disabled>Select Subject</option>
                                <option value="<?php echo $valueSubject['subjectId']; ?>"><?php echo $valueSubject['subjectName'];?>,<?php echo $valueSubject['subjectNameHi'];?></option>
                            <?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Exam Name</label>
						<input class="form-control" type="text" name="examName" id="examName" placeholder="Exam Name" required>
					</div>
					<div class="form-group">
						<label>Exam Name in Hindi</label>
						<input class="form-control" type="text" name="examNameHi" id="examNameHi" placeholder="Exam Name in Hindi" required>
					</div>
					<div class="form-group">
						<label>Exam Description</label>
                        <textarea type="text" class="form-control" id="examDescription" name="examDescription" placeholder="Exam Description..."></textarea>
    				</div>
					<div class="form-group">
						<label>Exam Description in Hindi</label>
                        <textarea type="text" class="form-control" id="examDescriptionHi" name="examDescriptionHi" placeholder="Exam Description in Hindi"></textarea>
    				</div>
					<div class="form-group">
						<label>Exam Date</label>
						<input class="form-control" type="text" name="examDate" id="examDate" placeholder="00-00-0000" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}">
					</div>
					<div class="form-group">
						<label>Exam Type</label>
						<select class="form-control" name="type" id="type" required>
    					    <option selected selected hidden disabled>Select Exam Type</option>
                            <option value="Mock">Mock</option>
                            <option value="Quiz">Quiz</option>
                            <option value="Today Quiz">Today Quiz</option>
                        </select>
					</div>
					<div class="form-group">
						<label>Exam Type in Hindi</label>
						<select class="form-control" name="typeHi" id="typeHi" required>
    					    <option selected selected hidden disabled>हिंदी में परीक्षा प्रकार का चयन करें</option>
                            <option value="दिखावटी">दिखावटी</option>
                            <option value="प्रश्नोत्तरी">प्रश्नोत्तरी</option>
                            <option value="आज प्रश्नोत्तरी">Today Quiz</option>
                        </select>
					</div>
					<div class="form-group">
						<label>Exam Time (Minutes)</label>
						<input class="form-control" type="text" name="examTime" id="examTime" placeholder="Exam Time like 60" onkeypress="return isNumberKey(event)" required>
					</div>
					<div class="form-group">
						<label>Exam Marks</label>
						<input class="form-control" type="text" name="examMarks" id="examMarks" placeholder="Exam Marks" required>
					</div>
					<div class="form-group">
						<label>Total Question</label>
						<input class="form-control" type="text" name="totalQuestion" id="totalQuestion" placeholder="Total Question" required>
					</div>
					<div class="form-group">
						<label>Expire Date</label>
                        <input placeholder="00-00-0000" class="form-control" type="text" name="expireDate" id="expireDate" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}">
					</div>
					<div class="form-group">
						<label>Exam Image</label>
						<input type="file" class="form-control-file form-control height-auto"name="image" id="image" accept="image/*">
					</div>
					<div class="form-group">
						<label>Exam Status</label>
						<select class="form-control" name="examStatus" id="examStatus" required>
    					    <option selected selected hidden disabled>Select Exam Status</option>
                            <option value="Active">Active</option>
                            <option value="Deactive">Deactive</option>
                        </select>
					</div>
					<button type="submit" id="btnsubmit" class="btn btn-primary">Add Exam</button>
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
<!--disbled past date in date picker-->
<script>
    $(function(){
        var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var minDate= year + '-' + month + '-' + day;
        
        $('#expireDate').attr('min', minDate);
    });
    
    $(function(){
        var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var minDate= year + '-' + month + '-' + day;
        
        $('#examDate').attr('min', minDate);
    });
</script>
<?php include './../pages/footer.php'; ?>