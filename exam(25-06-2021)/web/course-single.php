<?php include 'header.php';?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php 

 $courseId=$_GET['id'];
    $subjectResultData=$con->query("select * from `tbl_subject` where  courseId=$courseId");
    // $subjectResultData=$con->query("SELECT tbl_subject.*, tbl_purchase_course.courseId, tbl_purchase_course.studentId FROM tbl_subject LEFT JOIN tbl_purchase_course on tbl_purchase_course.studentId = tbl_subject.courseId order by tbl_subject.courseId desc");

    $subjectResultDataArr=array();
    while($subjectRow=mysqli_fetch_array($subjectResultData))
    {
        $subjectResultDataArr[]=$subjectRow;
    }

 
     $videoResultData=$con->query("select * from `tbl_videos` where  courseId=$courseId and videoType='live'");
    
    $videoResultDataArr=array();
    while($videoRow=mysqli_fetch_array($videoResultData))
    {
        $videoResultDataArr[]=$videoRow;
    }

 
    $courseResultData=$con->query("select * from `tbl_course` where courseid=$courseId");
    $courseResultDataArr=array();
    while($courseRow=mysqli_fetch_array($courseResultData))
    {
        $courseResultDataArr[]=$courseRow; 
    }

 
    $examResultData=$con->query("select * from `exam` where courseId=$courseId");
    $examResultDataArr=array();
    while($examRow=mysqli_fetch_array($examResultData))
    {
        $examResultDataArr[]=$examRow;
    }
    
    $sId = $_SESSION['userId'];
    $purchaseResultData=$con->query("select * from `tbl_purchase_course` where courseId=$courseId AND studentId=$sId");
    $purchaseCourse=0;;
    while($purchaseRow=mysqli_fetch_array($purchaseResultData))
    {
        $purchaseCourse=1;
    }
?>
<!--===================== End Header ===================-->
<section id="course-sg" style="background-image: url(assets/img/bank-po.jpg);" class="back-bg">
   
</section>
<?php foreach($courseResultDataArr as $courseData){ ?>
<!-- ==================== COURS content======================= -->
<section id="course-content">
  <div class="container">
      <div class="row">
           <div class="col-lg-8 col-md-8 col-sm-12">
               <div class="cour-left">
                   <h3><?php echo $courseData['courseName'];?></h3>
                   <p><?php echo $courseData['courseDes'];?></p>
                  <!--<ul>-->
                  <!--  <li><strong>CHSL</strong> (Combined Higher Secondary Level)</li>-->
                  <!--  <li><strong>LDC</strong> (Lower Division Clerk)</li>-->
                  <!--  <li><strong>MTS</strong> (Multi Tasking Staff)</li>-->
                  <!--</ul>-->
                  <div class="cour-down">
                      <!--<a class="" href="assets/img/ssc.pdf" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Syllabus</a>-->

                      <!--<a class="" href="assets/img/ssc.pdf" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Exam Pattern</a>-->

                      <!--<a targt="_blank" name="btn" id="btn" onclick="payNNow()"><i class="fas fa-shopping-cart"></i> Buy Now</a>-->
                      <a href="" onclick='payNow()'><i class="fas fa-shopping-cart"></i> Buy Now</a>
                      <!--<input class="pro-buy" type="button" name="btn" id="btn" value="Buy Now" onclick="payNNow()">-->
                  </div>
               </div>
           </div>
           <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="cour-right">
                   <img src="<?php echo $courseData['image'];?>">
               </div>
           </div>
      </div>
  </div>
</section>
<!-- ========================our key ================================= -->
<section id="cour-mid">
    <div class="container">
        <!--<div class="ssc-ma">-->
        <!--    <h3><i class="fas fa-chevron-left"></i><?php echo $courseData['courseName'];?></h3>-->
        <!--</div>-->

        <div class="ssc-ma">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="ssc-ma-one row">
                        <div class="ssc-img col-lg-2 col-md-2 col-sm-6">
                            <img src="assets/img/viicon.png">
                        </div>
                        <div class="ssc-con col-lg-10 col-md-10 col-sm-6">
                            <p>Access More Subject</p>
                            <h3><?php echo $courseData['courseName'];?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 ssc-ma-two">
                    <?php if ($_SESSION['userId'] != '') { ?>
                        <a href="" onclick='payNow()'>Get Subscribed</a>
                    <?php   }  else  { ?>
                        <a href="login.php">Get Subscribed</a>
		            <?php } ?>
                </div>
            </div>
        </div>


    </div>
</section>

<!-- ===================make slider===================================== -->
<?php 

    $courseResultData=$con->query("select * from `tbl_course`");
    $courseResultDataArr=array();
    while($courseRow=mysqli_fetch_array($courseResultData))
    {
        $courseResultDataArr[]=$courseRow;
    }

?>
<section id="corse-slide">
<link href="assets/css/slidecss/multislider.css" rel="stylesheet">
<link href="assets/css/slidecss/slider_item.css" rel="stylesheet">

<link href="css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row quizes">
         <div class="col-lg-6 col-md-6 col-sm-6 quz-title">
           <h4>Live Classes</h4>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 quz-see">
           <h5><a href="liveclass.php?subjectId=<?php echo $subjectId ?>&&courseId=<?php echo $courseId ?>&&type=Mock">See all</a></h5>
         </div>
    </div>
</div> 

 <div class="container-fluid">
        <!--<div class="cour-title">
            <h3>All Moke Test </h3>
        </div>-->
        <div id="blogSlider1">
            <div class="MS-content">
             
                   
                <?php $ii=1; foreach($videoResultDataArr as $data){ ?> 
                <div class="item">
                <?php if($purchaseCourse == 1){?>
                         <?php if($_SESSION['userId'] !=null) {?>
                             
                                    <iframe height="200" width="100%"  src="https://www.youtube.com/embed/<?php echo $data['videoUrl']; ?>?showinfo=0&controls=0&rel=0&modestbranding=1">
                                    </iframe>
                                
                        <?php } else {?>
                         <a href="login.php">
                          
                                    <iframe height="200" width="100%"  src="https://www.youtube.com/embed/<?php echo $data['videoUrl']; ?>?showinfo=0&controls=0&rel=0&modestbranding=1">
                                    </iframe>
                                 
                        </a>
                        <?php }?>
                     
                    <?php } else { 
                    
                    if($ii == 1){?> 
                     
                                    <iframe height="200" width="100%"  src="https://www.youtube.com/embed/<?php echo $data['videoUrl']; ?>?showinfo=0&controls=0&rel=0&modestbranding=1">
                                    </iframe>
                               
                    <?php } else { ?>
                               <a href="pay.php"></a> 
                                    <iframe height="200" width="100%"  src="https://www.youtube.com/embed/<?php echo $data['videoUrl']; ?>?showinfo=0&controls=0&rel=0&modestbranding=1">
                                    </iframe>
                                
                                </a>
                
              <?php } } ?>
              </div>
                <?php $ii=$ii+1; } ?> 
            
           
            </div>
             <div class="MS-controls">
                 <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                 <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
             </div>
         </div>
         
         <!--<div class="mok-see">
              <a href="quz.php">See More</a>
         </div>-->
                     
    </div>
                     
                     
                     
<div class="container">
    <div class="row quizes">
         <div class="col-lg-6 col-md-6 col-sm-6 quz-title">
           <h4>Mock Exam</h4>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 quz-see">
           <h5><a href="exam-list.php?subjectId=<?php echo $subjectId ?>&&courseId=<?php echo $courseId ?>&&type=Mock">See all</a></h5>
         </div>
    </div>
</div>    
    <div class="container-fluid">
        <!--<div class="cour-title">
            <h3>All Moke Test </h3>
        </div>-->
        <div id="blogSlider">
            <div class="MS-content">
            
                <?php $ii=1; foreach($examResultDataArr as $data){ ?> 
                <?php if($purchaseCourse == 1){?>
                    <div class="item">
                        <div class="product-grid">
                            <div class="product-image"> 
                                <a href="#">
                                    <img class="pic-1" src="<?php echo $data['image'];?>">
                                </a>
                            </div>
                            <div class="product-content1">
                              <div class="cour-title1">
                                <h3 class="title">
                                    <?php if($_SESSION['userId'] !=null) {?>
                                        <a href="exam-demo1.php?examid=<?php echo $data['examId'];?>"><?php echo $data['examName'];?></a>
                                        <h6><?php echo $data['examDate'];?> </h6>
                                    <?php } else {?>
                                         <a href="login.php"><?php echo $data['examName'];?></a>
                                        <h6><?php echo $data['examDate'];?> </h6>
                                    <?php }?>
                                </h3>
                               </div> 
                            </div>
                        </div>
                    </div>
                    <?php } else { 
                    
                    if($ii == 1){?> 
                       <div class="item">
                        <div class="product-grid">
                            <div class="product-image"> 
                                <a href="#">
                                    <img class="pic-1" src="<?php echo $data['image'];?>">
                                </a>
                            </div>
                            <div class="product-content1">
                              <div class="cour-title1">
                                <h3 class="title">
                                    <?php if($_SESSION['userId'] !=null) {?>
                                        <a href="exam-demo1.php?examid=<?php echo $data['examId'];?>"><?php echo $data['examName'];?></a>
                                        <h6><?php echo $data['examDate'];?> </h6>
                                    <?php } else {?>
                                         <a href="login.php"><?php echo $data['examName'];?></a>
                                        <h6><?php echo $data['examDate'];?> </h6>
                                    <?php }?>
                                </h3>
                               </div> 
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="item">
                        <div class="product-grid">
                            <div class="product-image"> 
                                <a href="#">
                                    <img class="pic-1" src="<?php echo $data['image'];?>">
                                </a>
                            </div>
                            <div class="product-content1">
                              <div class="cour-title1">
                                <h3 class="title">
                                    <a href="purchase.php"><?php echo $data['examName'];?></a>
                                    <a href="purchase.php" id="btn" onclick="payNNow()"><?php echo $data['examName'];?></a>
                                    <h6><?php echo $data['examDate'];?> </h6> 
                                </h3>
                               </div> 
                            </div>
                        </div>
                    </div>
                
              <?php } } ?>
                <?php $ii=$ii+1; } ?> 
            
            </div>
             <div class="MS-controls">
                 <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                 <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
             </div>
         </div>
         
         <!--<div class="mok-see">
              <a href="quz.php">See More</a>
         </div>-->
                     
    </div>
                     
                     
                     
                     
   
   <script src="assets/js/slide/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="assets/js/slide/multislider.min.js"></script>
   <script src="assets/js/slide/custom.js"></script>
   
    


  <script>
   
$('#blogSlider').multislider({
		duration: 750,
			interval: 400000
	});
       
//    </script>


 <script>
   
$('#blogSlider1').multislider({
		duration: 750,
			interval: 400000
	});
       
//    </script>

<style>
    #blogSlider1 {
    position: relative;
}
#blogSlider1 .MS-content {
    white-space: nowrap;
    overflow: hidden;
    margin: 0 5%;
}
#blogSlider1 .MS-content .item {
    display: inline-block;
    height: 100%;
    overflow: hidden;
    position: relative;
    vertical-align: top;
    width: 24%;
    margin: 6px;
  
}
#blogSlider1 .MS-content .item {
    /*background-color: #fff;*/
}
#blogSlider1 .MS-controls .MS-left {
    left: 0px;
}
#blogSlider1 .MS-controls button {
    position: absolute;
    border: none;
    background-color: transparent;
    outline: 0;
    font-size: 36px;
    top: 75px;
    color: rgb(0 0 0 / 86%);
    transition: 0.15s linear;
}
#blogSlider1 .MS-controls .MS-right {
    right: 0px;
}
#blogSlider1 .MS-controls button {
    position: absolute;
    border: none;
    background-color: transparent;
    outline: 0;
    font-size: 36px;
    top: 75px;
    color: rgb(0 0 0 / 86%);
    transition: 0.15s linear;
}
</style>

</section>

<!-- =====================Courises=========================== -->
<section id="course-main">
    <div class="container">
    <div class="row quizes">
         <div class="col-lg-6 col-md-6 col-sm-6 quz-title">
           <h4>Course</h4>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 quz-see">
           <!--<h5><a href="#">See all</a></h5>-->
         </div>
    </div>
</div> 
  <div class="container">
       <div class="row">
           <?php foreach($subjectResultDataArr as $data){ ?>
           <div class="col-lg-4 col-md-4 col-sm-12 ">
              <div class="course-con1">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 cours-imgs">
                         <a href="chapter.php?subjectId=<?php echo $data['subjectId'];?>&&courseId=<?php echo $data['subjectId'];?>"> <img src="<?php echo $data['image']; ?>"></a>
                      </div> 
                      <div class="col-lg-12 col-md-12 col-sm-12 cours-imgs">
                        <a href="chapter.php?subjectId=<?php echo $data['subjectId'];?>&&courseId=<?php echo $data['subjectId'];?>">  <h3><?php echo $data['subjectName']; ?></h3></a>
                      </div>
                      
                  </div>
              </div>
           </div>
           <?php } ?>
           

       </div>
  </div>
</section>

<!--====================Exams Covered================================== 
<section id="quiz">
  <div class="container">
     <div class="row quizes">
         <div class="col-lg-6 col-md-6 col-sm-6 quz-title">
           <h4>Quiz</h4>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 quz-see">
           <h5><a href="#">See all</a></h5>
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
</section>
=============our other ================================= 

<section id="quiz">
  <div class="container">
     <div class="row quizes">
         <div class="col-lg-6 col-md-6 col-sm-6 quz-title">
           <h4>Notes & PDF’s</h4>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 quz-see">
           <h5><a href="#">See all</a></h5>
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
</section>

 ======================================= 
<section id="quiz">
  <div class="container">
     <div class="row quizes">
         <div class="col-lg-6 col-md-6 col-sm-6 quz-title">
           <h4>Videos</h4>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 quz-see">
           <h5><a href="#">See all</a></h5>
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
<?php } ?>
<!-- ======= Footer ======= -->

<!--//////////////////////////razorpay//////////////////////////////-->
<script>
    function payNow(){
        alert("payment gateway");
        // var name = $('#name').val();
        // var amt = $('#amt').val();
        // var courseId = $('#courseId').val();
        // var studentId = $('#studentId').val();
        // var courseDescription = $('#courseDescription').val();
        // var courseNameHi = $('#courseNameHi').val();
        // var courseDescriptionHi = $('#courseDescriptionHi').val();
        
        // var options = {
        //     "key": "rzp_test_rlDBSqjlD1ISdm", 
        //     "amount": 100*amt,
        //     "currency": "INR",
        //     "name": name, 
        //     "description": name,
        //     "image": "https://dynamic.brandcrowd.com/asset/logo/cbb0b2e5-dc04-4383-937d-8a48ef4d93fd/logo?v=636782307497330000",
        //     "handler": function (response){
        //         console.log(response);
        //     }
                
            //  jquery.ajax({
            //     url: "web-api/course-purchage/payment.php",
            //     type: "POST",
            //     dataType:"JSON",
            //     data:"purchaseAmount="+amt+"&courseName="+name+"&courseId="+courseId+"&studentId="+studentId+"&courseDescription="+courseDescription+"&courseNameHi="+courseNameHi+"&courseDescriptionHi="+courseDescriptionHi, 
            //     contentType: false,
            //     cache: false,
            //     processData:false,
            //     success: function(result)
            //     {
            //         if(data.status == '200')
            //         {
            //           alert('success');
            //             // window.location. reload();
            //         }
            //         else
            //         { 
            //          //   $("#err").show()
            //         }
            //     },
            //     error: function(e) 
            //     {
            //     }          
            // });
        // };
        // var rzp1 = new Razorpay(options);
        // rzp1.open();
    }
</script>
<!--//////////////////////////razorpay//////////////////////////////-->

<?php include 'footer.php';?>