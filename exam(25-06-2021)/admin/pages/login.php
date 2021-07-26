<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Exam Admin</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="./../vendors/images/apple-touch-icon.png">
	<!--<link rel="icon" type="image/png" sizes="32x32" href="./../vendors/images/favicon-32x32.png">-->
	<!--<link rel="icon" type="image/png" sizes="16x16" href="./../vendors/images/favicon-16x16.png">-->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="./../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="./../vendors/styles/style.css">

</head>

<!--::::::::::::::::::::::::::::::::::::: Login script start ::::::::::::::::::::::::::::::::::::: -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#dataform").on('submit',(function(e){
        e.preventDefault();
            $.ajax({
                url: "api/login-api.php",
                type: "POST",
                dataType:"JSON",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                // beforeSend : function({
                // //$("#preview").fadeOut();
                // // $("#err").fadeOut();
                // },
                success: function(data)
                {
               // alert(data.status)            
                    if(data.status == 200){
                        window.location.href = "index.php";
                    }
                    else{
                        alert(data.message)
                    }
                },
                error: function(e) 
                {
                // $("#successmessage").html("Some thing went wrong").fadeIn().style.color.red;
                }          
            });
        }));
    });
</script>
<!--::::::::::::::::::::::::::::::::::::: Login script finished ::::::::::::::::::::::::::::::::::::: -->

<body class="login-page">
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="./../vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Admin Login</h2>
						</div>
						<form id="dataform" method="post">
							<div class="input-group custom">
								<input type="email" class="form-control form-control-lg" name="adminEmail" id="adminEmail" placeholder="Admin Email">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" name="adminPassword" id="adminPassword" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<!--<div class="row pb-30">-->
							<!--	<div class="col-6">-->
							<!--		<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>-->
							<!--	</div>-->
							<!--</div>-->
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
									</div>
									<!--<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>-->
									<!--<div class="input-group mb-0">-->
									<!--	<a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>-->
									<!--</div>-->
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="./../vendors/scripts/core.js"></script>
	<script src="./../vendors/scripts/script.min.js"></script>
	<script src="./../vendors/scripts/process.js"></script>
	<script src="./../vendors/scripts/layout-settings.js"></script>
</body>
</html>