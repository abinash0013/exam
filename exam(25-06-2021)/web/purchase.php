<?php include 'header.php';?>
<!--===================== End Header ===================-->

<?php 

    $userId = $_SESSION['userId'];
    // $profileResultData = $con->query("SELECT * FROM tbl_purchase_course WHERE `studentId` = $userId");
    $profileResultData = $con->query("SELECT tbl_purchase_course.*, tbl_course.courseid, tbl_course.image FROM tbl_purchase_course LEFT JOIN tbl_course on tbl_course.courseid = tbl_purchase_course.courseId WHERE `studentId`= $userId");
    // $profileResultData = $con->query("SELECT tbl_purchase_course.*, tbl_users.userId, tbl_users.userName, tbl_users.userEmail, tbl_users.userPhone, tbl_users.userImage FROM tbl_purchase_course LEFT JOIN tbl_users on tbl_users.userId = tbl_purchase_course.studentId WHERE `studentId`=$userId");

    $profileResult=array();
    while($profileRow=mysqli_fetch_array($profileResultData)){
        $profileResult[]=$profileRow;
    }
    
?>

<!-- ========================our key ================================= -->
<section id="cour-mid" class="sol">
    <div class="container">        
        <div class="solu-titl">
            <h3>Your Purchase</h3>
        </div>
    </div>
</section>
<!-- =====================Courises=========================== -->

<!--====================Exams Covered================================== -->
<section id="solu">
    <div class="container">
        <div class="pur-corse row">
            <?php if($profileResult != null){?>
            <?php foreach($profileResult as $profileValue) { ?>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="pur-profile row">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <h3><?php echo $profileValue['courseName']; ?></h3>
                            <div class="pro-link">
                                <p><?php echo $profileValue['purchaseDate']; ?> to <?php echo $profileValue['purchaseExpaireDate']; ?></p>
                                <!--<a href="mailto:abc.excellent@gmail.com"><?php echo $profileValue['userEmail']; ?></a>-->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="pur-img">
                                <?php if($profileValue['image'] != null){?>
                                    <img src="<?php echo $profileValue['image']; ?>">
                                <?php } else {?>
                                    <img src="assets/img/courseDefault.jpg">
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="pur-corse-main ">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <h3>Payment Mode</h3>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <p><?php echo $profileValue['paymentMode']; ?></p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <h3>Package Price</h3>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <p>Rs. <?php echo $profileValue['purchaseAmount']; ?></p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <h3>Grand Total</h3>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <p>Rs. <?php echo $profileValue['purchaseAmount']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } 
            } else { ?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pur-profile row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="text-center">You haven't Purchased Any Course..</h3>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>    
    </div>
</section>
<!--=============our other ================================= -->

<section class="accord">
    <div class="container">
         
    </div>
</section>

<!-- ======================================= -->

<!-- ======= Footer ======= -->
<?php include 'footer.php';?>