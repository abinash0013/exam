<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $bId = $_GET['id'];
    $resultdata = $con->query("SELECT * from `tbl_blog` where blogId = '$bId'");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    }
?>
<!-- ::::::::::::::::::::::::::::::::::::> Fetch Data End <:::::::::::::::::::::::::::::::::::: -->

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
<!-- ::::::::::::::::::::::::::::::::::::::> Edit Details Ajax End <::::::::::::::::::::::::::::::::::::::  -->
<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Blog</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Blog Edit</li>
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
                    Successfully Edited a New Blog
                </div>
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Edit Blog Form</h4>
					</div>
				</div>
				<form id="dataform" method="post">
				    <?php $i = 1; ?>
				    <?php foreach($result as $value) { ?>
                        <input type='hidden' value='<?php echo $value['blogId']?>' name='blogId'>     
    					<div class="form-group">
    						<label>Blog Tittle</label>
    						<input class="form-control" type="text" name="blogTitle" id="blogTitle" value='<?php echo $value['title']; ?>' required>
    					</div>
    					<div class="form-group">
    						<label>Blog Tittle In Hindi</label>
    						<input class="form-control" type="text" name="blogTitleHi" id="blogTitleHi" value='<?php echo $value['titleHi']; ?>' required>
    					</div>
    					<div class="form-group">
    						<label>Blog Description</label>
	                        <textarea type="text" class="form-control" id="blogDescription" name="blogDescription" required><?php echo $value['description']; ?></textarea>
    					</div>
    					<div class="form-group">
    						<label>Blog Description Hi</label>
	                        <textarea type="text" class="form-control" id="blogDescriptionHi" name="blogDescriptionHi" required><?php echo $value['descriptionHi']; ?></textarea>
    					</div>
    					<div class="form-group">
    						<label>Blog Image</label>
    						<div style="height: 60px; width: 100px"><img src="<?php echo $value['image']; ?>"></div>
    						<input type="file" class="form-control-file form-control height-auto" name="image" id="image" accept="image/*">
    					</div>
    					<div class="form-group">
    						<label>Created By</label>
    						<input class="form-control" type="text" name="createdBy" id="createdBy" value='<?php echo $value['createdBy']; ?>' required>
    					</div>
    					<button type="submit" id="btnsubmit" class="btn btn-primary">Update Blog</button>
    				<?php } ?>
				</form>
			</div>
			<!-- horizontal Basic Forms End -->
		</div>
	</div>
</div>

<script>
    ClassicEditor
    .create( document.querySelector( '#blogDescription' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#blogDescriptionHi' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
<?php include './../pages/footer.php'; ?>