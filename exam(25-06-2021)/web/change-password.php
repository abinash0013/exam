<?php include 'header.php';?>
<!--===================== End Header ===================-->


<?php $userId = $_SESSION['userId']; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#dataform").on("submit", function (e) {
            // if ($('#newPassword').val() == $('#confirmPassword').val()) {
                e.preventDefault();
                $.ajax({
                    url: "web-api/user/change-password.php",
                    type: "POST",
                    dataType: "JSON",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data.status == 200) {
                            Swal.fire(
                                'Thanks!',
                                'You have Successfully Changed Your Password...!',
                                'success'
                            )
                            setTimeout(function(){ window.location.href="index.php"; },2000);		
                        } else {
                            Swal.fire(
                                'Failed!',
                                'Something Went..!',
                                'warning'
                        	)
                            // $("#err").show();
                            // alert(data.message);
                        }
                    },
                    error: function (e) {
                        $("#err").show();
                        // $("#successmessage").html("Some thing went wrong").fadeIn().style.color.red;
                    },
                });
            // } else {
            //     alert("not matched");
            // }
        });
    });
</script>

<section id="profile">
    <div class="container">
        <div class="pro-main row">
            <div class="ed-profile" style="display:block !important">
                <div class="ed-form">
                    <form action="#" method="POST" id="dataform" >
                        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                        <div class="form-group">
                            <label for="pwd">Change Password:</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Old Password" id="oldPassword" name="oldPassword">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="New Password" id="newPassword" name="newPassword">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword">
                        </div>
                        <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=============our other ================================= -->
<!-- ======================================= -->
<script>    

    // $('#cPassword').on('keyup', function () {
    //     if ($('#password').val() == $('#cPassword').val()) 
    //     {
    //         $('#btnsubmit').removeAttr('disabled');
    //         $('#message').html('Password Matched').css('color', 'green');
    //     } 
    //     else 
    //     {
    //         $('#message').html('**Password Not Matched').css('color', 'red');
    //     }
    // });
   
</script>        
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ======= Footer ======= -->
<?php include 'footer.php';?>