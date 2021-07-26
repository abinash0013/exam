<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<!--================================ Total User Fetch Start ==============================-->
<?php 
    
    $userResult = $con->query("SELECT * FROM `tbl_users`");
    $userTotalResult = 0;
    while($userRow = mysqli_fetch_array($userResult)){
       $userTotalResult=$userTotalResult+1;
    }
    
?>
<!--================================ Total User Fetch End ================================-->

<!--================================ Total Course Fetch Start ==============================-->
<?php 
    
    $couseResult = $con->query("SELECT * FROM `tbl_course`");
    $courseTotalResult = 0;
    while($courseRow = mysqli_fetch_array($couseResult)){
       $courseTotalResult=$courseTotalResult+1;
    }
    
?>
<!--================================ Total Course Fetch End ================================-->

<!--================================ Total Subject Fetch Start ==============================-->
<?php 
    
    $subjectResult = $con->query("SELECT * FROM `tbl_subject`");
    $subjectTotalResult = 0;
    while($subjectRow = mysqli_fetch_array($subjectResult)){
       $subjectTotalResult=$subjectTotalResult+1;
    }
    
?>
<!--================================ Total Subject Fetch End ================================-->

<!--================================ Total Course Purchased Fetch Start ==============================-->
<?php 
    
    $purchasedCourseResult = $con->query("SELECT * FROM `tbl_purchase_course`");
    $purchasedTotalResult = 0;
    while($purchasedRow = mysqli_fetch_array($purchasedCourseResult)){
       $purchasedTotalResult=$purchasedTotalResult+1;
    }
    
?>
<!--================================ Total Subject Fetch End ================================-->

<!--================================ Topper List Fetch Start ==============================-->
<?php
    $topperData =$con->query("SELECT tbl_topper.*, exam.examId, exam.examName FROM tbl_topper LEFT JOIN exam on exam.examId = tbl_topper.examName LIMIT 10; ");

    $topperResult=array();
    while($topperRow=mysqli_fetch_array($topperData))
    {
       $topperResult[]= $topperRow;
    }
?> 
<!--================================ Topper List Fetch End ================================-->

<div class="main-container">
    <div class="pd-ltr-20">
        <div class="row pb-10">
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark"><?php echo $userTotalResult; ?></div>
							<div class="font-14 text-secondary weight-500">Total User</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);"><i class="icon-copy ion-android-person"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark"><?php echo $courseTotalResult; ?></div>
							<div class="font-14 text-secondary weight-500">Course</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#ff5b5b" style="color: rgb(255, 91, 91);"><span><i class="icon-copy dw dw-file-31"></i></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark"><?php echo $subjectTotalResult; ?></div>
							<div class="font-14 text-secondary weight-500">Total Subject</div>
						</div>
						<div class="widget-icon">
							<div class="icon"><i class="icon-copy dw dw-book"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark"><?php echo $purchasedTotalResult; ?></div>
							<div class="font-14 text-secondary weight-500">Course Purchased</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#09cc06" style="color: rgb(9, 204, 6);"><i class="icon-copy fa fa-money" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 mb-30">
				<div class="card-box pd-30 pt-10 height-100-p">
					<h2 class="mb-30 h4">Topper List</h2>
					<div class="browser-visits">
						<ul>
                            <?php foreach($topperResult as $topperValue){?>
    							<li class="d-flex flex-wrap align-items-center">
    								<div class="icon"><img src="<?php echo $topperValue['image'] ?>"></div>
    								<div class="browser-name pl-4"><?php echo $topperValue['topperName'] ?></div>
    								<div class="visit"><span class="badge badge-pill badge-primary"><?php echo $topperValue['examName'] ?></span></div>
    							</li>
    						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>

<?php include 'footer.php' ?>
