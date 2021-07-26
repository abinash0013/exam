<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>
<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php     
    $vId = $_GET['id'];
    // $resultdata = $con->query("SELECT tbl_videos.*, 
    //     tbl_chapter.chapterName as chname, tbl_chapter.chapterNameHi as chnamehi, 
    //     tbl_subject.subjectName as sname, tbl_subject.subjectNameHi as snamehi, 
    //     tbl_course.courseName as cname, tbl_course.courseNameHi as cnamehi 
    //     FROM tbl_videos LEFT JOIN tbl_chapter on tbl_videos.chapterId = tbl_chapter.chapterId 
    //     LEFT JOIN tbl_subject on tbl_subject.subjectId = tbl_videos.subjectId
    //     LEFT JOIN tbl_course on tbl_course.courseid = tbl_videos.courseId where videoId = $vId");
    $resultdata = $con->query("SELECT * FROM `tbl_pdf` where pdfType='promotion' && pdfId = $vId order by pdfId DESC");
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

<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table Start <::::::::::::::::::::::::::::::::::::::  -->
<?php
     $resultdataSubject = $con->query("select * from `tbl_subject` order by subjectName ASC" );
     $resultSubject = array();
     while($rowSubject=mysqli_fetch_array($resultdataSubject))
    {
       $resultSubject[]= $rowSubject;
    }
?> 
<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table End <::::::::::::::::::::::::::::::::::::::  -->

<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table Start <::::::::::::::::::::::::::::::::::::::  -->
<?php
     $resultdataChapter = $con->query("select * from `tbl_chapter` order by chapterName ASC" );
     $resultChapter = array();
     while($rowChapter=mysqli_fetch_array($resultdataChapter))
    {
       $resultChapter[]= $rowChapter;
    }
?> 
<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table End <::::::::::::::::::::::::::::::::::::::  -->

<!-- ::::::::::::::::::::::::::::::::::::::> Edit Details Ajax Start <::::::::::::::::::::::::::::::::::::::  -->
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
<!-- ::::::::::::::::::::::::::::::::::::::> edit Details Ajax End <::::::::::::::::::::::::::::::::::::::  -->
<!--<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>-->
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Promotion Pdf</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Promotion Pdf Edit</li>
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
						<h4 class="text-blue h4">Edit Promotion Pdf Form</h4>
					</div>
				</div>
				<form id="dataform" method="POST">
				    <?php $i = 1; ?>
                    <?php foreach($result as $value) { ?>    
                        <input type='hidden' value='<?php echo $value['pdfId']?>' name='pdfId'> 
    					<div class="form-group">
    						<label>Promotion Pdf Title</label>
    						<input class="form-control" type="text" name="pdfTitle" id="pdfTitle" value="<?php echo $value['pdfTitle']; ?>" required>
    					</div>
    					<div class="form-group">
    						<label>Promotion Pdf Title In Hindi</label>
    						<input class="form-control" type="text" name="pdfTitleHi" id="pdfTitleHi" value="<?php echo $value['pdfTitleHi']; ?>" required>
    					</div>
    					<div class="form-group">
    						<label>Promotion Pdf Description</label>
                            <textarea type="text" class="form-control" id="pdfDescription" name="pdfDescription"><?php echo $value['pdfDescription']; ?></textarea>
        				</div>
    					<div class="form-group">
    						<label>Promotion Pdf Description in Hindi</label>
                            <textarea type="text" class="form-control" id="pdfDescriptionHi" name="pdfDescriptionHi"><?php echo $value['pdfDescriptionHi']; ?></textarea>
        				</div>
    					<div class="form-group">
    						<label>Promotion Pdf Url</label>
    						<div><img src="./../pdfUpload/default.png" style="height:50px;"></div>
    						<input type="file" class="form-control-file form-control height-auto" name="pdfUrl" id="pdfUrl" accept=".pdf,.doc"/>
    						<!--<input class="form-control" type="text" name="pdfUrl" id="pdfUrl" value="<?php echo $value['pdfUrl']; ?>" required>-->
    					</div>
    					<div class="form-group">
    						<label>Promotion Pdf Image</label>
    						<div>
    						    <img src="<?php echo $value['pdfImage']; ?>" style="width:100px">
    						</div>
    						<input type="file" class="form-control-file form-control height-auto"name="image" id="image" accept="image/*">
    					</div>
    					<button type="submit" id="btnsubmit" class="btn btn-primary">Update Promotion Pdf</button>
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