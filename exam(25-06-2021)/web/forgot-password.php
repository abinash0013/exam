<?php include 'header.php';?>
<!--===================== End Header ===================-->

<!--?php $userId = $_SESSION['userId']; ?-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#dataform").on("submit", function (e) {  
            e.preventDefault();
            $.ajax({
                url: "web-api/user/forgot-password.php",
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
                            'Your Password is successfully sent on your Mail...!',
                            'success',
                            '3000'
                        ) 
                        setTimeout(function(){ window.location.href="login.php"; },3000);		
                    } else {
                        Swal.fire(
                            'Failed!',
                            'Something Went Wrong..!',
                            'warning'
                        )
                    }
                },
                error: function (e) {
                    $("#err").show();
                },
            });
        });
    });
</script>

<section id="profile">
    <div class="container">
        <div class="pro-main row">
            <div class="ed-profile" style="display:block !important">
                <div class="ed-form">
                    <form action="#" method="POST" id="dataform" >
                        <!--<input type="hidden" name="userId" value="<?php echo $userId; ?>">-->
                        <div class="form-group">
                            <label for="pwd">Forgot Password:</label>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Enter Your Email" id="userEmail" name="userEmail">
                        </div>
                        <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=============our other ================================= -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ======= Footer ======= -->
<?php include 'footer.php';?>