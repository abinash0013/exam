<?php include 'header.php';?>
<!--===================== End Header ===================-->

<?php 

    $userId = $_SESSION['userId'];
    $profileResultData = $con->query("SELECT * FROM `tbl_users` WHERE `userId`=$userId");
    $profileResult=array();
    while($profileRow=mysqli_fetch_array($profileResultData)){
        $profileResult[]=$profileRow;
    }
    
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#dataform").on("submit", function (e) {
            e.preventDefault();
            $.ajax({
                url: "web-api/user/edit-profile-api.php",
                type: "POST",
                dataType: "JSON",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    // $("#successmessage").show(); 
                    //  $("#loading").hide();
                    //  alert(data.status);
                    if (data.status == 200) {
                        Swal.fire(
                        'Thanks.!',
                        'Profile Update Successfully...!',
                        'success',
                        '3000'
                    )
                    setTimeout(function(){ window.location.href="profile.php"; },2000);		
                    } else {
                        Swal.fire(
                        'Login Failed!',
                        'Failed to Update Profile...!',
                        'warning'
                    )
                        // $("#err").show();
                        // alert(data.message);
                    }
                },
                error: function (e) {
                    $("#err").show();
                    // $("#successmessage").html("Something went wrong").fadeIn().style.color.red;
                },
            });
        });
    });
</script>

<script>
    $(document).ready(function (e) {
        $("#dataform").on("submit", function (e) {
            e.preventDefault();
            $.ajax({
                url: "web-api/user/image-upload.php",
                type: "POST",
                dataType: "JSON",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    // $("#successmessage").show(); 
                    //  $("#loading").hide();
                    //  alert(data.status);
                    if (data.status == 200) {
                        Swal.fire(
                        'Thanks.!',
                        'Profile Update Successfully...!',
                        'success',
                        '3000'
                    )
                    setTimeout(function(){ window.location.href="profile.php"; },2000);		
                    } else {
                        Swal.fire(
                        'Login Failed!',
                        'Failed to Update Profile...!',
                        'warning'
                    )
                        // $("#err").show();
                        // alert(data.message);
                    }
                },
                error: function (e) {
                    $("#err").show();
                    // $("#successmessage").html("Something went wrong").fadeIn().style.color.red;
                },
            });
        });
    });
</script>

<section id="profile">
    <div class="container">
        <div class="pro-main row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <!--<div class="setting-img">-->
                <!--    <img src="assets/img/user.png">-->
                <!--</div>-->
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="setting-con">
                    <button>Edit profile details</button>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $(".setting-con button").click(function(){
                        $(".ed-profile").toggleClass("form-display");
                    });
                });
            </script>

            <div class="ed-profile" >
                <div class="ed-form">
                    <!--<form action="edit-profile.php">--> 
                    <?php foreach($profileResult as $profileValue) { ?>
                        <form action="#" method="POST" id="dataform" >
                            <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                            <div class="form-group">
                                <label for="userName">Name:</label>
                                <input type="text" class="form-control" id="userName" name="userName" value="<?php echo $profileValue['userName']; ?>">
                            </div>
        
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" class="form-control" id="userEmail" name="userEmail" value="<?php echo $profileValue['userEmail']; ?>" readonly>
                            </div>
        
                            <div class="form-group">
                                <label for="mobno">Mobile No:</label>                        
                                <input type="tel" class="form-control" id="userPhone" name="userPhone" value="<?php echo $profileValue['userPhone']; ?>" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label for="image">Profile Image</label> 
                                <?php if($profileValue['userImage'] != null){?>
                                    <div><img src="<?php echo $profileValue['userImage']; ?>" style="height: 90px; width: 100px"></div>
                                <?php } else {?>
                                    <div><img src="assets/img/userImage.png" style="height: 90px; width: 100px"></div>
                                <?php }?>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
        
                            <div class="form-group">
                                <label for="userGender">Gender</label>
                                <select name="userGender" id="userGender" class="form-control">
                                <option value="<?php echo $profileValue['userGender']; ?>" hidden><?php echo $profileValue['userGender']; ?> </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                                </select>                   
                            </div>
        
                            <!--<div class="form-group">-->
                            <!--    <label for="pwd">Change Password:</label>-->
                            <!--    <input type="password" class="form-control" placeholder="Old Password" id="oldPassword" name="oldPassword">-->
                            <!--    <input type="password" class="form-control" placeholder="New Password" id="newPassword" name="newPassword">-->
                            <!--    <input type="password" class="form-control" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword">-->
                            <!--</div>-->
                            <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!--=============our other ================================= -->



<!-- ======================================= -->

<!-- ======= Footer ======= -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include 'footer.php';?>