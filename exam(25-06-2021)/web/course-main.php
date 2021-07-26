<?php include 'header.php';?>
<?php 

    $courseId=$_GET['courseId'];
    $subjectId=$_GET['subjectId'];
    $chapterId=$_GET['chapterId'];
    
    $examResultData=$con->query("select * from `exam` where  subjectId=$subjectId And type='Quiz' LIMIT 0, 3");
    $examResultDataArr=array();
    while($examRow=mysqli_fetch_array($examResultData))
    {
        $examResultDataArr[]=$examRow;
    }

 
 
 
    $videosResultData=$con->query("select * from `tbl_videos` where  chapterId=$chapterId   LIMIT 0, 3");
    $videosResultDataArr=array();
    while($videosRow=mysqli_fetch_array($videosResultData))
    {
        $videosResultDataArr[]=$videosRow;
    }

   $pdfResultData=$con->query("select * from `tbl_pdf` where  chapterId=$chapterId   LIMIT 0, 4");
    $pdfResultDataArr=array();
    while($pdfRow=mysqli_fetch_array($pdfResultData))
    {
        $pdfResultDataArr[]=$pdfRow;
    }

?>
<!--===================== End Header ===================-->
<section id="course-sg" style="background-image: url(assets/img/bank-po.jpg);" class="back-bg">
   
</section>
 
<!-- ==================== COURS content======================= -->

<!-- =====================Courises=========================== -->


<!--====================Exams Covered================================== -->
<section id="quiz">
  <div class="container">
     <div class="row corsquz quizes">
         <div class="col-lg-6 col-md-6 col-sm-6 quz-title">
           <h4>Quiz</h4>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 quz-see">
           <h5><a href="exam-list.php?subjectId=<?php echo $subjectId ?>&&courseId=<?php echo $courseId ?>&&type=Quiz">See all</a></h5>
         </div>
      <?php foreach($examResultDataArr as $examdata){ ?>
         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="<?php echo $examdata['image']?>">
                </div>
                 <div class="quz-con">
                    <h3><a href="exam-demo1.php?examid=<?php echo $examdata['examId']; ?>"><?php echo $examdata['examName']?></a></h3>
                  <p><?php echo $examdata['description']?></p>
                  <p>Question- <?php echo $examdata['totalQuestion']?></p>
                 </div>
            </div>
         </div>
         <?php } ?>
          
     </div>
  </div>
</section>
<!--=============our other ================================= -->

<section id="quiz">
  <div class="container">
     <div class="row quizes">
         <div class="col-lg-6 col-md-6 col-sm-6 quz-title">
           <h4>Videos</h4>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 quz-see">
           <h5><a href="video.php?subjectId=<?php echo $subjectId ?>&&chapterId=<?php echo $chapterId ?>">See all</a></h5>
         </div>
 <?php foreach($videosResultDataArr as $videodata){ ?>
         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="quz-main">
               <iframe height="200" width="100%"  
                src="https://www.youtube.com/embed/<?php echo $videodata['videoUrl']; ?>">
                </iframe> 
            </div>
         </div>
 <?php } ?>
         

     </div>
  </div>
</section>

<!-- ======================================= -->
<section id="quiz">
  <div class="container">
     <div class="row quizes corpdf">
         <div class="col-lg-6 col-md-6 col-sm-6 quz-title">
           <h4>Notes & PDF’s</h4>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 quz-see">
           <h5><a href="notespdf.php?subjectId=<?php echo $subjectId ?>&&chapterId=<?php echo $chapterId ?>">See all</a></h5>
         </div>

        <?php foreach($pdfResultDataArr as $pdfdata){ ?>
         <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="quz-main">
                <div class="ebok-main ">
                        
                             <div class="ebok-four">
                              <img src="<?php echo $pdfdata['pdfImage']; ?>" alt="Avatar" class="image">
                              <div class="overlay">
                                <div class="text">
                                   <a href="<?php echo $pdfdata['pdfUrl']; ?>" download>
                                       Download
                                   </a>
                                </div>
                              </div>
                        </div> 
                    </div>
            </div>
         </div>
 <?php } ?>

     </div>
  </div>
</section>
 
<!-- ======= Footer ======= -->
<?php include 'footer.php';?>