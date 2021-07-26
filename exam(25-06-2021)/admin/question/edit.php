<?php include './../pages/header.php'; ?>
 

<?php include './../pages/sidebar.php'; ?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $eId = $_GET['id'];
    $resultdata = $con->query("SELECT question.*, exam.examId, exam.examName FROM question LEFT JOIN exam on exam.examId = question.examId where questionId = '$eId'");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    }
?>
<!-- ::::::::::::::::::::::::::::::::::::> Fetch Data End <:::::::::::::::::::::::::::::::::::: -->

<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table Start <::::::::::::::::::::::::::::::::::::::  -->
<?php
     $resultdataExam = $con->query("select * from `exam` order by examName ASC" );
     $resultExam = array();
     while($rowExam=mysqli_fetch_array($resultdataExam))
    {
       $resultExam[]= $rowExam;
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
 
  <style>
     @import url('cs.css');
 </style>
 
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Question</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="../exam/index.php">Exam</a></li>
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Question Edit Form</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary" href="#" role="button">
								<i class="icon-copy ion-ios-arrow-back"></i> Back 
							</a>
						</div>
					</div>
				</div>
			</div>

			 horizontal Basic Forms Start 
			<div class="pd-20 card-box mb-30">
                <div class="alert alert-success" role="alert" id="successAlert" style="display:none">
                    Successfully Update..!
                </div>
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Edit Question Form</h4>
					</div>
				</div>
				<form id="dataform" method="POST">
				    <?php $i = 1; ?>
                    <?php foreach($result as $value) { ?>  
                        <input type='hidden' value='<?php echo $value['questionId']?>' name='questionId'>     
    					<div class="form-group">
    						<h6>Exam Name</h6>
    						<select class="form-control" name="examId" id="examId" required>
    						    <option value="<?php echo $value['examId']; ?>" hidden><?php echo $value['examName'];?></option>
						        <?php foreach($resultExam as $valueExam) { ?>
                                    <option value="<?php echo $valueExam['examId']; ?>"><?php echo $valueExam['examName'];?></option>
                                <?php } ?>
    						</select>
    					</div>
    					<!--<div class="form-group">-->
    					<!--	<h6>Question Type</h6>-->
    					<!--	<input class="editor1" type="text" name="questionType" id="questionType" value="<?php echo $value['questionType'];?>">-->
    					<!--</div>-->
    			 
    					<div class="form-group">
    						<h6>Question Label</h6>
    						<textarea class="editor1"  name="questionLabel" id="questionLabel"><?php echo $value['questionlabel'];?></textarea>
    					</div>
    					<div class="form-group">
    						<h6>Question Label in Hindi</h6>
    						<textarea class="editor2"  name="questionLabelHi" id="questionLabelHi"><?php echo $value['questionLabelHi'];?></textarea>
    					</div>
    					<div class="form-group">
					        <h6>Answer</h6>
    						<select class="form-control" name="answer" id="answer" required>
    						    <option value="<?php echo $value['answer']; ?>" hidden><?php echo $value['answer'];?></option>
						        <option value="a">A</option>
    						    <option value="b">B</option>
    						    <option value="c">C</option>
    						    <option value="d">D</option>
    						</select>
    					</div>
    					<div class="form-group">
    						<h6>Option One</h6>
    						<textarea class="editor3" name="optionOne" id="optionOne"><?php echo $value['option1'];?></textarea>
    					</div>
    					<div class="form-group">
    						<h6>Option Two</h6>
    						<textarea class="editor4" name="optionTwo" id="optionTwo"><?php echo $value['option2'];?></textarea>
    					</div>
    					<div class="form-group">
    						<h6>Option Three</h6>
    						<textarea class="editor5"  name="optionThree" id="optionThree"><?php echo $value['option3'];?></textarea>
    					</div>
    					<div class="form-group">
    						<h6>Option Four</h6>
    						<textarea class="editor6"  name="optionFour" id="optionFour"><?php echo $value['option4'];?></textarea>
    					</div>
    					<div class="form-group">
    						<h6>Option One in Hindi</h6>
    						<textarea class="editor7"  name="optionOneHi" id="optionOneHi"><?php echo $value['option1Hi'];?></textarea>
    					</div>
    					<div class="form-group">
    						<h6>Option Two in Hindi</h6>
    						<textarea class="editor8" name="optionTwoHi" id="optionTwoHi"><?php echo $value['option2Hi'];?></textarea>
    					</div>
    					<div class="form-group">
    						<h6>Option Three in Hindi</h6>
    						<textarea class="editor9"  name="optionThreeHi" id="optionThreeHi"><?php echo $value['option3Hi'];?></textarea>
    					</div>
    					<div class="form-group">
    						<h6>Option Four in Hindi</h6>
    						<textarea class="editor10"  name="optionFourHi" id="optionFourHi"><?php echo $value['option4Hi'];?></textarea>
    					</div>
    					<div class="form-group">
    						<h6>Subject Name</h6>
    						<input class="form-control" type="text" name="subjectName" id="subjectName" value="<?php echo $value['subjectName'];?>">
    					</div>
    					<div class="form-group">
    						<h6>Subject Name in Hindi</h6>
    						<input class="form-control" type="text" name="subjectNameHi" id="subjectNameHi" value="<?php echo $value['subjectNameHi'];?>">
    					</div>
    					<div class="form-group">
    						<h6>Explaination</h6>
    						<textarea class="editor11"  name="explaination" id="explaination"><?php echo $value['explaination'];?></textarea>
    					</div>
    					<button type="submit" id="btnsubmit" class="btn btn-primary">Update question</button>
    				<?php } ?>
				</form>
			</div>
			 horizontal Basic Forms End 
		</div>
	</div>
</div>
  <script>
    
    tinymce.init({
      selector: 'textarea',
    //   plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    //   toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
       font_formats: "Andale Mono=andale mono ,times;Kruti_Dev_010=kruti_Dev_010; AAText = AAText ;Symbol = symbol ;Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Oswald=oswald;  Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
      content_style: "@import url('cs.css'); body { font-family: Kruti_Dev_010; }",
      height: 500,
       plugins: 'image code',
  toolbar: 'undo redo | link image | code',
  /* enable title field in the Image dialog*/
  image_title: true,
  /* enable automatic uploads of images represented by blob or data URIs*/
  automatic_uploads: true,
  /*
    URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
    images_upload_url: 'postAcceptor.php',
    here we add custom filepicker only to Image dialog
  */
  file_picker_types: 'image',
  /* and here's our custom image picker*/
  file_picker_callback: function (cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    /*
      Note: In modern browsers input[type="file"] is functional without
      even adding it to the DOM, but that might not be the case in some older
      or quirky browsers like IE, so you might want to add it to the DOM
      just in case, and visually hide it. And do not forget do remove it
      once you do not need it anymore.
    */

    input.onchange = function () {
      var file = this.files[0];

      var reader = new FileReader();
      reader.onload = function () {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };

    input.click();
  },
    });
  </script>
 
<?php include './../pages/footer.php'; ?>