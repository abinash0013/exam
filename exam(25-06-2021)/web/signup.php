<?php include 'header.php'; ?>
<!--========================================== internal css for signup start -->
<style>
    /*for eye*/
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: 10px;
        margin-right: 5px;
        position: relative;
        z-index: 2;
    }
    /*for phone number input type arrow*/
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    
    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
    .term {
    width: 100%;
    display: flex;
    align-items: center;
    padding-top: 15px;
}
.term input {
    width: 24px;
    margin-right: 15px;
}
</style>
<!--========================================== internal css for signup start -->
<!--========================================== Signup Script Start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#dataform").on("submit", function (e) {
            if ($('#userPassword').val() == $('#pswRepeat').val()){ 
                e.preventDefault();
                $.ajax({
                    url: "web-api/user/signup-api.php",
                    type: "POST",
                    dataType: "JSON",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                       // alert(data.val)
                        $("#btnsubmit").show(); 
                        if (data.status == 200) {
                            Swal.fire(
                                'Signup Successfull',
                                'Account Created Successfully...!',
                                'success'
                            )
                            setTimeout(function(){ window.location.href="index.php"; },2000);
                        }
                        else {
                            // $("#err").show(); 
                            // alert("siggnup failed")
                        }
                        if (data.status == 202) {
                            Swal.fire(
                                'Signup Failed',
                                'Email Already Exist..!',
                                'warning'
                            )
                        }
                    },
                    error: function (e) {
                        $("#err").show();
                        // $("#successmessage").html("Some thing went wrong").fadeIn().style.color.red;
                    },
                });
            }
            else {
                
            }
        });
    });
</script>

<!--========================================== End Header -->
<section id="log-in">
    <div class="container">
        <div class="log-main">
            <form action="#" method="POST" id="dataform">
                <div class="login-con">
                    <h1>Signup Here</h1>
                    <p class="text-center">Please Enter Your Detail Below.</p>
                   
                    <hr>
                    <label for="userName"><b>Full Name </b></label>
                    <input type="text" placeholder="Enter Full Name" name="userName" id="userName" required>
                    <div id="messageName" style="color:red"></div>
    
                    <label for="userEmail"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="userEmail" id="userEmail">
                    <div id="messageEmail" style="color:red"></div>
                    
                    <label for="userPhone"><b>Phone</b></label>
                    <input type="text" name="userPhone" id="userPhone" minlength="10" maxlength="10" placeholder="Enter Phone Number" onkeypress="return isNumberKey(event)"required>
                    <div id="messagePhone" style="color:red"></div>

                    <label for="userDob"><b>Date of Birth</b></label>
                    <input type="text" placeholder="Enter Your Date of Birth" name="userDob" id="userDob" max="2999-12-31" onfocus="(this.type='date')" required>
                    <div id="messageDob" style="color:red"></div>
                    
                    <label for="userPassword"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="userPassword" id="userPassword" required>
                    <span id="togglePassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <div id="messagePassword" style="color:red"></div>
                    
                    <label for="pswRepeatt"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="pswRepeat" id="pswRepeat" required>
                    <div id="messageRepeatPassword" style="color:red"></div>
                    <div class="term">
                      <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" required>
                      <label for="vehicle1">I Agree Terms and Conditions</label><br>
                    </div>
                    <div class="text-right">
                        Already have an account? <a href="login.php"> Login Here  </a>
                    </div>  
                    <!--<div class="text-left">-->
                    <!--    <p class="checkbox"><input type="checkbox" name="checkbox" value="check" id="agree" />I have read and agree to the Terms and Conditions and Privacy Policy</p>-->
                    <!--</div>  -->
                    <div class="clearfix">                 
                        <button type="submit" id="btnsubmit" class="login" onclick="RepeatPasswordValidate()">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

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
<script>
    function isNumberKey(evt)
    {
    	var charCode = (evt.which) ? evt.which : event.keyCode
    	if (charCode > 31 && (charCode < 48 || charCode > 57))
    	return false;
    
    	return true;
    }
</script>
<!-- =============================================== Signup Validation Start -->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	
<script>
    var $dataform = $("#dataform");
    if ($dataform.length) { 
        $dataform.validate({
            rules: {
                userName: {
                    required: true,
                    minlength: 1,
                },
                userEmail: {
                    required: true,
                    email: true,
                },
                userPhone: {
                    required: true,
            		number: true,
            		minlength: 9,
            		maxlength: 10
                },
                userDOB: {
                    required: true,
                },
                userPassword: {
                    required: true,
                },
                pswRepeat: {
                    required: true,
                    equalTo: "#userPassword",
                },
            },
            messages: {
                userName: {
                    required: "Please Enter Your Name",
                },
                userEmail: {
                    required: "Please Enter Your Email Address",
                    email: "Please Enter Valid Email",
                },
                userDOB: {
                    required: "Please Enter Your Dob",
                },
                userPhone: {
                    required: "Please Enter a Your Mobile Number",
                },
                userPassword: {
                    required: "Please Enter a Password",
                },
                pswRepeat: {
                    required: "Please Confirm Your Password",
                    equalTo: "Password Not Matched !",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            },
        });
    }     
</script>
<script>
    // $('#userName').on('keyup', function () {
    //     if ($('#userName').val().length == 0) {
    //         $('#messageName').html("Name Field is Required");
    //     }else{
    //         $('#messageName').html("")
    //     }
    // });
    // $('#btnsubmit').click(function() {
    //     if ($('#userName').val().length == 0) {
    //         $('#messageName').html("Name Field is Required")
    //         return false;//add this
    //     }
    // });
    
    // $('#userEmail').on('keyup', function () {
    //     if ($('#userEmail').val().length == 0) {
    //         $('#messageEmail').html("Email Field is Required");
    //     }else{
    //         $('#messageEmail').html("")
    //     }
    // });
    // $('#btnsubmit').click(function() {
    //     if ($('#userEmail').val().length == 0) {
    //         $('#messageEmail').html("Email Field is Required")
    //         return false;//add this
    //     }
    // });
    
    // $('#userPhone').on('keyup', function () {
    //     if ($('#userPhone').val().length == 0) {
    //         $('#messagePhone').html("");
    //     }else{
    //         $('#messagePhone').html("")
    //     }
    // });
    // $('#btnsubmit').click(function() {
    //     if ($('#userPhone').val().length == 0) {
    //         $('#messagePhone').html("Phone Number Field is Required")
    //         return false;//add this
    //     }
    // });
    
    // $('#userDob').on('keyup', function () {
    //     if ($('#userDob').val().length == 0) {
    //         $('#messageDob').html("");
    //     }else{
    //         $('#messageDob').html("")
    //     }
    // });
    // $('#btnsubmit').click(function() {
    //     if ($('#userDob').val().length == 0) {
    //         $('#messageDob').html("DOB Field is Required")
    //         return false;//add this
    //     }
    // });
    
    // $('#userPassword').on('keyup', function () {
    //     if ($('#userPassword').val().length == 0) {
    //         $('#messagePassword').html("Password Field is Required");
    //     }else{
    //         $('#messagePassword').html("")
    //     }
    // });
    // $('#btnsubmit').click(function() {
    //     if ($('#userPassword').val().length == 0) {
    //         $('#messagePassword').html("Password Field is Required")
    //         return false;//add this
    //     }
    // });
    
    // function RepeatPasswordValidate() {
    //     var userPasswordVar = document.getElementById("userPassword").value;
    //     var pswRepeatVar = document.getElementById("pswRepeat").value;
    //     if (userPasswordVar != pswRepeatVar) {
    //         $('#messageRepeatPassword').html("Password do not match.");
    //         return false;
    //     }
    //     return true;
    // }
</script>
<!-- =============================================== Signup Validation End -->

<!-- =============================================================== Footer  -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include 'footer.php';?>