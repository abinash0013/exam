<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $chId = $_GET['id'];
    // $resultdata = $con->query("SELECT * from `tbl_chapter` order by chapterId desc");
    $resultdata = $con->query("SELECT tbl_chapter.*, tbl_subject.subjectName as sname, tbl_subject.subjectNameHi as snamehi, tbl_course.courseName as cname, tbl_course.courseNameHi as cnamehi FROM tbl_chapter LEFT JOIN tbl_subject on tbl_chapter.subjectId = tbl_subject.subjectId LEFT JOIN tbl_course on tbl_course.courseid = tbl_chapter.courseId where chapterId = '$chId'");

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
<!--<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>-->

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Chapter</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Chapter Edit</li>
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
						<h4 class="text-blue h4">Edit Chapter Form</h4>
					</div>
				</div>
				<form id="dataform" method="post">
				    <?php $i = 1; ?>
                    <?php foreach($result as $value) { ?>    
                        <input type='hidden' value='<?php echo $value['chapterId']?>' name='chapterId'>     
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
    						<label>Chapter No.</label>
    						<input class="form-control" type="text" name="chapterNo" id="chapterNo" value='<?php echo $value['chapterNo']?>' placeholder="chapterNo">
    					</div>
    					<div class="form-group">
    						<label>Chapter Name</label>
    						<input class="form-control" type="text" name="chapterName" id="chapterName" value='<?php echo $value['chapterName']?>' placeholder="chapterName">
    					</div>
    					<div class="form-group">
    						<label>Chapter Name In Hindi</label>
    						<input class="form-control" type="text" name="chapterNameHi" id="chapterNameHi" value='<?php echo $value['chapterNameHi']?>' placeholder="Course Name in Hindi">
    					</div>
    					<div class="form-group">
    						<label>Chapter Description</label>
    						<!--<input class="form-control" type="text" name="chapterDescription" id="chapterDescription" value='<?php echo $value['chapterDescription']?>' placeholder="Chapter Description">-->
	                        <textarea type="text" class="form-control" id="chapterDescription" name="chapterDescription"><?php echo $value['chapterDescription']?></textarea>
    					</div>
    					<div class="form-group">
    						<label>Chapter Description In Hindi</label>
	                        <textarea type="text" class="form-control" id="chapterDescriptionHi" name="chapterDescriptionHi"><?php echo $value['chapterDescriptionHi']?></textarea>
    					</div>
    					<div class="form-group">
    						<label>Chapter Image</label>
    						<div><img src="<?php echo $value['image']?>" style="height:100px; width:100px;"></div>
    						<input type="file" class="form-control-file form-control height-auto"name="image" id="image" accept="image/*">
    					</div>
    					<button type="submit" id="btnsubmit" class="btn btn-primary">Update Chapter</button>
				    <?php } ?>
				</form>
			</div>
			<!-- horizontal Basic Forms End -->
		</div>
	</div>
</div>

<script>
    ClassicEditor
    .create( document.querySelector( '#chapterDescription' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#chapterDescriptionHi' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
<?php include './../pages/footer.php'; ?>