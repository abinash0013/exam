<?php include 'header.php';?>
<!--===================== End Header ===================-->

<?php 
   $courseId=$_GET['courseId'];
    $subjectId=$_GET['subjectId'];
     $chapterId=$_GET['chapterId'];
if($subjectId !=null){
        //$videoResultData=$con->query("select * from `tbl_videos` where subjectId=$subjectId");
        //$pdfResultData=$con->query("select * from `tbl_pdf` where subjectId=$subjectId ");
        $pdfResultData=$con->query("select * from `tbl_pdf` where chapterId=$chapterId  ");  
 
}
else{
  $pdfResultData=$con->query("select * from `tbl_pdf` ");  
}



    
    $pdfResultDataArr=array();
    while($pdgRow=mysqli_fetch_array($pdfResultData))
    {
        $pdfResultDataArr[]=$pdgRow;
    }
?>
<!-- ==================== COURS content======================= -->

<!-- ========================our key ================================= -->
<section id="cour-mid" class="sol">
    <div class="container">        
         <div class="solu-titl">
            <a href="./"> <i class="fas fa-chevron-left"></i></a> <h3> Notes & PDFs</h3>
         </div>
    </div>
</section>
<!-- =====================Courises=========================== -->
<section id="ebook">
  <div class="container">
        <div class="video-home">
             <h2>Ebooks</h2>
        </div>
        <div class="ebok-main row">
           <?php foreach($pdfResultDataArr as $data){  ?> 
            <div class="col-lg-3 col-md-3 col-sm-6">
                 <div class="ebok-four">
                  <img src="<?php echo $data['pdfImage']; ?>" alt="Avatar" class="image">
                  <div class="overlay">
                    <div class="text">
                       <a href="<?php echo $data['pdfUrl']; ?>" download>
                           Download
                       </a>
                    </div>
                  </div>
                </div>
            </div> 
            <?php } ?>
            
          
            
        </div>
        <!--<div class="mor-but">
          <a href="#">More Videos</a>
        </div>-->
  </div>
</section>









<!--
<section id="quiz">
  <div class="container">
     <div class="row quizes">
         

         <div class="col-lg-3 col-md-4 col-sm-12">
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
         
         
         
         
         <div class="col-lg-3 col-md-4 col-sm-12">
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
         <div class="col-lg-3 col-md-4 col-sm-12">
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


         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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

         <div class="col-lg-3 col-md-4 col-sm-12">
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
</section>
-->
<!--====================Exams Covered================================== -->

<!--=============our other ================================= -->


<!-- ======================================= -->

<!-- ======= Footer ======= -->
<?php include 'footer.php';?>