<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

<!-- ::::::::::::::::::::::::::::::::::::::> Add Details Ajax Start <::::::::::::::::::::::::::::::::::::::  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#dataform").on('submit',(function(e) {
            // alert("aaaaaaaaa");
            // $("#btnsubmit").hide();
            // $("#loading").show();
            e.preventDefault();
            $.ajax({
                url: "api/add-api.php",
                alert("asa");
                type: "POST",
                dataType:"JSON",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    // console.log(data)
                    // $("#btnsubmit").show(); 
                    // $("#loading").hide();
                    if(data.status == '200')
                    {
                        $("#successmessage").show()
                        $("#dataform")[0].reset(); 
                        alert("fasdfsdf");
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
							<h4>Form</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">User Add</li>
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
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Add User Form</h4>
					</div>
				</div>
				<form id="dataform" method="post">
					<div class="form-group">
						<label>User Name</label>
						<input class="form-control" type="text" name="userName" id="userName" placeholder="User Name">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="email" name="userEmail" id="userEmail" placeholder="Email">
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input class="form-control" type="tel" name="phone" id="phone" placeholder="Phone">
					</div>
					<div class="form-group">
						<label>Gender</label>
						<select class="form-control" name="gender" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input class="form-control" type="text" name="userImage" id="userImage" placeholder="User Image">
					</div>
					<!--<div class="form-group">-->
					<!--	<label>Course Image</label>-->
					<!--	<input type="file" class="form-control-file form-control height-auto" name="image" id="image">-->
					<!--</div>-->
                    <div class="form-group">                                              
    					<button type="submit" id="btnsubmit" class="btn btn-primary">Add Course</button>
    					<!--<button type="submit" id="btnsubmit">Add</button>-->
					</div>
				</form>
			</div>
			<!-- horizontal Basic Forms End -->
		</div>
	</div>
</div>
	
<?php include './../pages/footer.php'; ?>