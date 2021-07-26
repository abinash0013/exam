<?php include 'header.php';?> 
<?php 

 $courseId=$_GET['courseId'];
    
 
     $videoResultData=$con->query("select * from `tbl_videos` where  courseId=$courseId and videoType='live'");
    
    $videoResultDataArr=array();
    while($videoRow=mysqli_fetch_array($videoResultData))
    {
        $videoResultDataArr[]=$videoRow;
    }
    ?>
<!--===================== End Header ===================-->
<section id="course-sg" style="background-image: url(assets/img/bank-po.jpg);" class="back-bg">
   
</section>

<!-- ==================== COURS content======================= -->

<!-- ========================our key ================================= -->
<section id="cour-mid " class="livclass">
    <div class="container">
        <div class="ssc-ma">
             <!--<p><i class="fas fa-chevron-left"></i> SSC Exam</p>-->
             <h3>Live Classes</h3>
        </div>

    </div>
</section>
<!-- =====================Courises=========================== -->


<!--====================Exams Covered================================== -->
<section id="quiz">
  <div class="container">
     <div class="row quizes">
         
  <?php $ii=1; foreach($videoResultDataArr as $data){ ?> 
         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <iframe height="230px" width="100%"  src="https://www.youtube.com/embed/<?php echo $data['videoUrl']; ?>?showinfo=0&controls=0&rel=0&modestbranding=1">
                            </iframe>
                </div>
                
                 <div class="quz-con row liov">
                     <div class="col-md-6 col-sm-6 quz-cona"> <h3><?php echo $data['videoTitle'] ?></h3></div>
                     <div class="col-md-6 col-sm-6 quz-conb"><p>lesson :- <?php echo $data['lessonNumber'] ?></p></div>
                     <div class="col-md-12 col-sm-12 quz-conc"><p><?php echo $data['start_time'] ?> , <?php echo $data['start_date'] ?></p></div>
                 </div>
            </div>
         </div>
         
<?php }  ?>

     </div>
  </div>
</section>
<!--=============our other ================================= -->



<!-- ======================================= -->

<!-- ======= Footer ======= -->
<?php include 'footer.php';?>