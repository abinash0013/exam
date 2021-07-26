<?php include 'header.php';?>
<?php 

    $courseId=$_GET['courseId'];
    $subjectId=$_GET['subjectId'];
    $chapterId=$_GET['chapterId'];
    
    $type=$_GET['type'];
    
    if($type == 'Quiz'){
    $examResultData=$con->query("select * from `exam` where  subjectId=$subjectId And type='Quiz'");
    }else{
        $examResultData=$con->query("select * from `exam` where  courseId=$courseId And type='Mock'");
    }
    
    
    $examResultDataArr=array();
    while($examRow=mysqli_fetch_array($examResultData))
    {
        $examResultDataArr[]=$examRow;
    }
?>
<!--===================== End Header ===================-->


<!-- ==================== COURS content======================= -->

<!-- ========================our key ================================= -->
<section id="cour-mid" class="quzmok">
    <div class="container">
        <!--<div class="ssc-ma">-->
             <!--<p><i class="fas fa-chevron-left"></i> SSC Exam</p>-->
             <!--<h3>SSC Exams Subjects</h3>-->
        <!--</div>-->

        <!--<div class="ssc-ma">-->
        <!--     <div class="row">-->
        <!--         <div class="col-lg-6 col-md-6 col-sm-12">-->
        <!--             <div class="ssc-ma-one row">-->
        <!--                <div class="ssc-img col-lg-2 col-md-2 col-sm-6">-->
        <!--                    <img src="assets/img/viicon.png">-->
        <!--                </div>-->
        <!--                <div class="ssc-con col-lg-10 col-md-10 col-sm-6">-->
                            <!--<p>Access more than</p>-->
                            <!--<h3>15,630+ courses for SSC Exams</h3>-->
        <!--                </div>-->
        <!--             </div>-->
        <!--         </div>-->
        <!--         <div class="col-lg-6 col-md-6 col-sm-12 ssc-ma-two">-->
                     
                        <!--<a href="#">Get Subscribed</a>-->
                    
        <!--         </div>-->
        <!--     </div>-->
        <!--</div>-->


    </div>
</section>
<!-- =====================Courises=========================== -->


<!--====================Exams Covered================================== -->

<!--=============our other ================================= -->

<section id="quiz">
  <div class="container">
     <div class="row quizes">
         <div class="col-lg-12 col-md-12 col-sm-12 quz-title">
           <h4 class="quz-all-1"><?php echo $type ; ?> Exam</h4>
         </div>
       
          <?php foreach($examResultDataArr as $data){ ?>
          <a class="col-lg-4 col-md-6 col-sm-12 quz-sing-1" href="exam-demo1.php?examid=<?php echo $data['examId'] ; ?>">
          
            <div class="quz-main">
                <div class="quz-img" >
                  <img src="<?php echo $data['image'] ; ?>">
                </div>
                 <div class="quz-con row">
                     <div class="col-md-6 col-sm-6 quz-cona"> <h3><?php echo $data['examName'] ; ?></h3></div>
                     <div class="col-md-6 col-sm-6 quz-conb"><p><?php echo $data['examTime'] ; ?></p></div>
                     <div class="col-md-12 col-sm-12 quz-conc"><p>Lesson <?php echo $data['examMarkes'] ; ?></p></div>
                 
                  
                  
                 </div>
           
         </div>
         </a>
         <?php } ?>
         
     </div>
  </div>
</section>

<!-- ======================================= -->

<!-- ======= Footer ======= -->
<?php include 'footer.php';?>