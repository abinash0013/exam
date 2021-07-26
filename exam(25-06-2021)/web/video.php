<?php include 'header.php';?>
<?php 
    $courseId=$_GET['courseId'];
    $subjectId=$_GET['subjectId'];
    $chapterId=$_GET['chapterId'];

if($subjectId !=null){
        //$videoResultData=$con->query("select * from `tbl_videos` where subjectId=$subjectId");

    $videoResultData=$con->query("select * from `tbl_videos` where chapterId=$chapterId");    
}
else{
    $videoResultData=$con->query("select * from `tbl_videos` "); 
}


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
        <!--<div class="ssc-ma">-->
        <!--     <p><a href="./"><i class="fas fa-chevron-left"></i> SSC Exam</a></p>-->
        <!--     <h3>Chapters for SSC Exams </h3>-->
        <!--</div>-->

    </div>
</section>
<!-- =====================Courises=========================== -->


<!--====================Exams Covered================================== -->

<section id="in-home">
   <div class="container">
     <div class="video-home">
             <h2>Videos</h2>
                                <!-- Grid row -->
<div class="row">

  <!-- Grid column -->
  

  <!-- Grid column -->
   <?php foreach($videoResultDataArr as $data){  ?>
  <div class="col-lg-4 col-md-6 mb-4 col-sm-12">

   <iframe height="200" width="100%"  
src="https://www.youtube.com/embed/<?php echo $data['videoUrl']; ?>">
</iframe>
  </div>
  <?php } ?>
  

  <!--<div class="mor-but">
    <a href="#">More Videos</a>
  </div>-->

</div>

        </div>


   </div>

   
</section>








<!--
<section id="quiz">
  <div class="container">
     <div class="row quizes">
         

         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="quz-main">
                <div class="quz-img">
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>


         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="quz-main">
                <div class="quz-img">
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>


         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="quz-main">
                <div class="quz-img">
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>


         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="quz-main">
                <div class="quz-img">
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>


         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="quz-main">
                <div class="quz-img">
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="assets/img/quzimg.png">
                </div>
                 <div class="quz-con">
                    <h3>SSC GD Constable </h3>
                  <p>Complete Course on Quantitative Aptitude for SSC CGL - Part 1</p>
                  <p>Lesson 16</p>
                 </div>
            </div>
         </div>


     </div>
  </div>
</section> -->
<!--=============our other ================================= -->



<!-- ======================================= -->

<!-- ======= Footer ======= -->
<?php include 'footer.php';?>