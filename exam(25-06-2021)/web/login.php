<?php include 'header.php';?>
<style>
    .field-icon {
        position: absolute;
    z-index: 2;
    top: 55px;
    right: 10px;
    }
    .log-pass {
    width: 100%;
    position: relative;
}
</style>
<!--===================== End Header ===================-->
<!--?php
    if($_SESSION['userId'] != null) { 
    header("Location: index.php");
    exit();
    }
?-->

<!--===================== Login Script Start ===================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#dataform").on("submit", function (e) {
            e.preventDefault();
            $.ajax({
                url: "web-api/user/login-api.php",
                type: "POST",
                dataType: "JSON",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#btnsubmit").show(); 
                    if (data.status == 200) {
                        Swal.fire(
                            'Thanks.!',
                            'Login Successfully...!',
                            'success',
                            '3000'
                        )
                        setTimeout(function(){ window.location.href="index.php"; },2000);		
                    } else {
                        Swal.fire(
                            'Login Failed!',
                            'Please Enter Your Registered Email and Password..!',
                            'warning'
                    	)
                    }
                },
                error: function (e) {
                    $("#err").show();
                    // $("#successmessage").html("Some thing went wrong").fadeIn().style.color.red;
                },
            });
        });
    });
</script>
<!--===================== Login Script End ===================-->

<section id="log-in">
    <div class="container">
        <div class="log-main">
            <form action="#" method="POST" id="dataform">
                <div class="login-con">
                    <h1>Login</h1>
                    <hr>
                    <div class="log-name">
                        <label for="email"><b>Email/Phone</b></label>
                        <input type="text" placeholder="Enter Your Email or Phone Number" name="userEmail" required>
                    </div>
                    <div class="log-pass">
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="userPassword" id="userPassword" required>
                        <span id="togglePassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="text-right">
                        Don't have an account? <a href="signup.php"> Signup Here  </a>
                        <a href="forgot-password.php"><label for="psw">Forgot Password ?</label></a>
                    </div>  
                    <div class="clearfix">                 
                        <button type="submit" id="btnsubmit" class="login">Login</button>
                    </div>                  
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script>
    var $dataform = $("#dataform");
    if ($dataform.length) {
        $dataform.validate({
            rules: {
                userEmail: {
                    required: true,
                },
                userPassword: {
                    required: true,
                    minlength: 1

                },
            },
            messages: {
                userEmail: {
                    required: "**This Field is Required",
                },
                userPassword: {
                    required: "**Password Field is Required",
                    minlength: "**Password Should be atleast 1!",
                },
            },
        });
    }     
</script>

<!-- =================================== password Hide and Show Script Start -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#userPassword');
    
    togglePassword.addEventListener('click', function (e) {
    
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
    
});
</script>
<!-- =================================== password Hide and Show Script End -->

<!-- =================================== Footer Start -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include 'footer.php';?>