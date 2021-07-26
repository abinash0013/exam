<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $pId = $_GET['id'];
    $resultdata = $con->query("SELECT tbl_pdf.*, 
        tbl_chapter.chapterName as chname, tbl_chapter.chapterNameHi as chnamehi, 
        tbl_subject.subjectName as sname, tbl_subject.subjectNameHi as snamehi, 
        tbl_course.courseName as cname, tbl_course.courseNameHi as cnamehi 
        FROM tbl_pdf LEFT JOIN tbl_chapter on tbl_pdf.chapterId = tbl_chapter.chapterId 
        LEFT JOIN tbl_subject on tbl_subject.subjectId = tbl_pdf.subjectId
        LEFT JOIN tbl_course on tbl_course.courseid = tbl_pdf.courseId where pdfId = $pId
    ");
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
								<li class="breadcrumb-item active" aria-current="page">Pdf Edit</li>
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
                    Successfully Edited a New Pdf
                </div>
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Edit Pdf Form</h4>
					</div>
				</div>
				<form id="dataform" method="post">
				    <?php $i = 1; ?>
                    <?php foreach($result as $value) { ?>    
                        <input type='hidden' value='<?php echo $value['pdfId']?>' name='pdfId'> 
    					<div class="form-group">
    						<label>Course Name</label>
    						<select class="form-control" name="courseId" id="courseId" required>
                                <option value="<?php echo $value['courseId']; ?>" hidden><?php echo $value['cname'];?>,<?php echo $value['cnamehi'];?></option>
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
    						<label>Chapter Name</label>
    						<select class="form-control" name="chapterId" id="chapterId" required>
                                <option value="<?php echo $value['chapterId']; ?>" hidden><?php echo $value['chname'];?>,<?php echo $value['chnamehi'];?></option>
                                <?php foreach($resultChapter as $valueChapter) { ?>
                                    <option value="<?php echo $valueChapter['chapterId']; ?>"><?php echo $valueChapter['chapterName'];?>,<?php echo $valueChapter['chapterNameHi'];?></option>
                                <?php } ?>
    						</select>
    					</div>
    					<div class="form-group">
    						<label>Pdf Title</label>
    						<input class="form-control" type="text" name="pdfTitle" id="pdfTitle" value="<?php echo $value['pdfTitle'];?>">
    					</div>
    					<div class="form-group">
    						<label>Pdf Title In Hindi</label>
    						<input class="form-control" type="text" name="pdfTitleHi" id="pdfTitleHi" value="<?php echo $value['pdfTitleHi'];?>">
    					</div>
    					<div class="form-group">
    						<label>Pdf Description</label>
                            <textarea type="text" class="form-control" id="pdfDescription" name="pdfDescription"><?php echo $value['pdfDescription'];?></textarea>
        				</div>
    					<div class="form-group">
    						<label>Pdf Description in Hindi</label>
                            <textarea type="text" class="form-control" id="pdfDescriptionHi" name="pdfDescriptionHi"><?php echo $value['pdfDescriptionHi'];?></textarea>
        				</div>
    					<div class="form-group">
    						<label>Pdf Url</label>
    						<div><img src="./../pdfUpload/default.png" style="height:50px;"></div>
    						<input type="file" class="form-control-file form-control height-auto"name="pdfUrl" id="pdfUrl" accept=".pdf,.doc"/>
    					</div>
    					<div class="form-group">
    						<label>Pdf Image</label>
    						<div><img src="<?php echo $value['pdfImage'];?>" style="height:60px; width:50px"></div>
    						<input type="file" class="form-control-file form-control height-auto"name="image" id="image" accept="image/*">
    					</div>
    					<button type="submit" id="btnsubmit" class="btn btn-primary">Update Pdf</button>
    				<?php } ?>
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