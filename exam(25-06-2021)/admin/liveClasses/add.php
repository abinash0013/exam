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

<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table Start <::::::::::::::::::::::::::::::::::::::  -->
<?php
    $resultdataChapter = $con->query("select * from `tbl_chapter` order by chapterName ASC" );
    $resultChapter = array();
    while($rowChapter = mysqli_fetch_array($resultdataChapter))
    {
       $resultChapter[]= $rowChapter;
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
                        location.reload(true);
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
							<h4>Live Classes</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Live Classes Add</li>
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
                    Successfully Added a New Live Classes
                </div>
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Add Live Classes Form</h4>
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
						<label>Chapter Name</label>
						<select class="form-control" name="chapterId" id="chapterId" required>
                            <?php foreach($resultChapter as $valueChapter) { ?>
						        <option selected selected hidden disabled>Select Chapter</option>
                                <option value="<?php echo $valueChapter['chapterId']; ?>"><?php echo $valueChapter['chapterName'];?>,<?php echo $valueChapter['chapterNameHi'];?></option>
                            <?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Video Title</label>
						<input class="form-control" type="text" name="videoTitle" id="videoTitle" placeholder="Video Title" required>
					</div>
					<div class="form-group">
						<label>Video Title In Hindi</label>
						<input class="form-control" type="text" name="videoTitleHi" id="videoTitleHi" placeholder="Video Title in Hindi" required>
					</div>
					<div class="form-group">
						<label>Video Description</label>
                        <textarea type="text" class="form-control" id="videoDescription" name="videoDescription"></textarea>
    				</div>
					<div class="form-group">
						<label>Video Description in Hindi</label>
                        <textarea type="text" class="form-control" id="videoDescriptionHi" name="videoDescriptionHi" ></textarea>
    				</div>
					<div class="form-group">
						<label>Video Url</label>
						<input class="form-control" type="text" name="videoUrl" id="videoUrl" placeholder="Video Url" required>
					</div>
					<div class="form-group">
						<label>Video Image</label>
						<input type="file" class="form-control-file form-control height-auto"name="image" id="image" accept="image/*">
					</div>
					<div class="row">
    					<div class="form-group col-6">
    						<label>Start Date</label>
    						<input class="form-control" type="text" name="startedDate" id="startedDate" placeholder="Started Date" onfocus="(this.type='date')" required>
    						
		                    <!--<input type="text" placeholder="Enter Your Date of Birth" name="userDob" id="userDob" max="2999-12-31" onfocus="(this.type='date')" required>-->
    					</div>
    					<div class="form-group col-6">
    						<label>End Date</label>
    						<input class="form-control" type="text" name="endDate" id="endDate" placeholder="End Date" onfocus="(this.type='date')" required>
    					</div>
					</div>
					<div class="row">
    					<div class="form-group col-6">
    						<label>Start Time</label>
    						<input class="form-control" type="text" name="startedTime" id="startedTime" placeholder="Started Time" onfocus="(this.type='time')" required>
    					</div>
    					<div class="form-group col-6">
    						<label>End Time</label>
    						<input class="form-control" type="text" name="endTime" id="endTime" placeholder="End Time" onfocus="(this.type='time')" required>
    					</div>
					</div>
					<button type="submit" id="btnsubmit" class="btn btn-primary">Add Live Classes</button>
				</form>
			</div>
			<!-- horizontal Basic Forms End -->
		</div>
	</div>
</div>
	
<script>
    ClassicEditor
    .create( document.querySelector( '#videoDescription' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#videoDescriptionHi' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
<?php include './../pages/footer.php'; ?>