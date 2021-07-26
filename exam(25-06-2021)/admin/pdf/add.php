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
<!--<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>-->

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Pdf</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Pdf Add</li>
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
                    Successfully Added a New Pdf
                </div>
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Add Pdf Form</h4>
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
						<label>Pdf Title</label>
						<input class="form-control" type="text" name="pdfTitle" id="pdfTitle" placeholder="Pdf Title" required>
					</div>
					<div class="form-group">
						<label>Pdf Title In Hindi</label>
						<input class="form-control" type="text" name="pdfTitleHi" id="pdfTitleHi" placeholder="Pdf Title in Hindi" required>
					</div>
					<div class="form-group">
						<label>Pdf Description</label>
                        <textarea type="text" class="form-control" id="pdfDescription" name="pdfDescription"></textarea>
    				</div>
					<div class="form-group">
						<label>Pdf Description in Hindi</label>
                        <textarea type="text" class="form-control" id="pdfDescriptionHi" name="pdfDescriptionHi"></textarea>
    				</div>
					<div class="form-group">
						<label>Pdf Url</label>
						<input type="file" id="pdfUrl" class="form-control-file form-control height-auto" name="pdfUrl" accept=".pdf,.doc" required/>
						<!--<input class="form-control" type="text" name="pdfUrl" id="pdfUrl" placeholder="Pdf Url">-->
					</div>
					<div class="form-group">
						<label>Pdf Image</label>
						<input type="file" class="form-control-file form-control height-auto" name="image" id="image" accept="image/*">
					</div>
					<button type="submit" id="btnsubmit" class="btn btn-primary">Add Pdf</button>
				</form>
			</div>
			<!-- horizontal Basic Forms End -->
		</div>
	</div>
</div>

<script>
    ClassicEditor
    .create( document.querySelector( '#pdfDescription' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#pdfDescriptionHi' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
<?php include './../pages/footer.php'; ?>