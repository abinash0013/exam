<?php include 'header.php';?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php 
    $bannerResultData=$con->query("select * from `tbl_banner`");
    $bannerResultDataArr=array();
    while($bannerRow=mysqli_fetch_array($bannerResultData))
    {
        $bannerResultDataArr[]=$bannerRow;
    }
    foreach($bannerResultDataArr as $data){ 
        //echo $data['image']; 
    }
?>

<?php 
    $videoResultData=$con->query("select * from `tbl_videos` where videoType='promotion' LIMIT 0, 9");
    $videoResultDataArr=array();
    while($videoRow=mysqli_fetch_array($videoResultData))
    {
        $videoResultDataArr[]=$videoRow;
    }
?>

<?php 
    $pdfResultData=$con->query("select * from `tbl_pdf` where pdfType='promotion' LIMIT 0, 8");
    $pdfResultDataArr=array();
    while($pdgRow=mysqli_fetch_array($pdfResultData))
    {
        $pdfResultDataArr[]=$pdgRow;
    }
?>

<?php 
    //$topperResultData=$con->query("SELECT tbl_topper.*, exam.examName as eName, exam.examDate as eDate FROM tbl_topper LEFT JOIN exam on tbl_topper.examName = exam.examId LIMIT 0, 12");
   $topperResultData=$con->query("SELECT * from  tbl_topper LIMIT 8");
    $topperResultDataArr=array();
    while($pdgRow=mysqli_fetch_array($topperResultData))
    {
        $topperResultDataArr[]=$pdgRow;
    }
?>
<?php 

    $courseResultData=$con->query("select * from `tbl_course`");
    $courseResultDataArr=array();
    while($courseRow=mysqli_fetch_array($courseResultData))
    {
        $courseResultDataArr[]=$courseRow;
    }

?>
<section id="banner">     
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
              
        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php $i=1;  foreach($bannerResultDataArr as $data){ ?>
                <?php if($i == 1){ ?>
                 <a href="banner-details.php?bannerId=<?php echo $data['bannerId']; ?>"> 
                    <div class="carousel-item active"> 
                <?php } else { ?>
                  <div class="carousel-item">
                <?php } $i=2; ?>
                    <img src="<?php echo $data['image']; ?>" alt="Los Angeles" width="1100" height="500">
                    <div class="carousel-caption">
                    </div>
                </div>
            <?php } ?> 
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
    </div>
    </a>
</section>
 
 
<section id="corse-slide">
<link href="assets/css/slidecss/multislider.css" rel="stylesheet">
<link href="assets/css/slidecss/slider_item.css" rel="stylesheet">

<link href="css/bootstrap.min.css" rel="stylesheet">

    <div class="container-fluid">
        <div class="cour-title">
            <h3>All Course </h3>
        </div>
        <div id="blogSlider">
            <div class="MS-content">
                <?php foreach($courseResultDataArr as $data){ ?> 
                    <div class="item">
                        <div class="product-grid">
                            <div class="product-image"> 
                                <a href="#">
                                    <img class="pic-1" src="<?php echo $data['image'];?>">
                                </a>
                            </div>
                            <div class="product-content1">
                                <h3 class="title">
                                    <a href="course-single.php?name=<?php echo $data['courseName'];?>&&id=<?php echo $data['courseid'];?>"><?php echo $data['courseName'];?></a>
                                    <h6>Rs. <?php echo $data['coursePrice'];?>/-</h6>
                                </h3>
                                <form method="POST"> 
                                    <?php if ($_SESSION['userId'] != '') { ?>
                                        <input type="hidden"value="<?php echo $data['courseName'];?>" id="courseName"  name="courseName"  class="form-data" />
                                        <input type="hidden" value="<?php echo $data['coursePrice'];?>" name="coursePrice" id="coursePrice" class="form-data" /> 
                                        <input type="hidden" value="<?php echo $data['courseid'];?>" name="courseId" id="courseId" class="form-data" /> 
                                        <input type="hidden" value="<?php echo $_SESSION['userId'];?>" name="studentId" id="studentId" class="form-data" /> 
                                        <input type="hidden" value="<?php echo $data['courseDes'];?>" name="courseDescription" id="courseDescription"  class="form-data" /> 
                                        <input type="hidden" value="<?php echo $data['courseNameHi'];?>" name="courseNameHi" id="courseNameHi" class="form-data" /> 
                                        <input type="hidden" value="<?php echo $data['courseDesHi'];?>" name="courseDescriptionHi" id="courseDescriptionHi" class="form-data" /> 
                                        <br/>
                                        <input class="pro-buy" type="button" name="btn" id="btn" value="Buy Now" onclick="payNNow()">
                                    <?php   }  else  { ?>
                                        <a href="login.php"><input class="pro-buy" type="button" name="btn" id="btn" value="Buy Now"></a>
    					            <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
         
         </div>
             <div class="MS-controls">
                 <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                 <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
             </div>
         </div>
                     
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


</section>
<!-- ========================our key ================================= 
<section id="our-key">
    <div class="container">
        <div class="our-key-main">
            <div class="our-title">
                <h4>EXPLORE AMAZING FEATURES</h4>
                <h2>Our key offerings</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="our-key-con">
                  <div class="our-key-con-img">
                       <div class="our-key-img">
                           <p><i class="fas fa-video"></i></p>
                       </div>
                       <div class="our-key-con-title">
                           <h3>Quality Video Lectures</h3>
                           <p>Top of the line faculty having an enriched experiance of years will teach you in an organized way for effective and effecient understanding</p>
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="our-key-con">
                    <div class="our-key-con-img">
                        <div class="our-key-img">
                            <p> <i class="fas fa-book-reader"></i></p>
                        </div>
                        <div class="our-key-con-title">
                            <h3>Online Assessments</h3>
                            <p>You can evaluate your level of preparations by participating in live tests, quizzes along with video solutions substantiated by proper explanations.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="our-key-con">
                    <div class="our-key-con-img">
                        <div class="our-key-img">
                            <p> <i class="fas fa-clipboard"></i></p>
                        </div>
                        <div class="our-key-con-title">
                           <h3>Pathbreaking Features</h3>
                           <p>For quick revision make your own custom flash cards & MCQ ,Audio feature for less data consumption ,Detailed video explanation for each question in Quiz & Test.</p>
                        </div>
                    </div>
              </div>
            </div>
       </div>
    </div>
</section>
-->

<section id="in-home">
    <div class="container">
        <div class="video-home">
            <h2>Latest Videos</h2>
                <!-- Grid row -->
                <div class="row">
                    <?php foreach($videoResultDataArr as $data){  ?>
                        <div class="col-lg-4 col-md-6 mb-4 col-sm-12">
                            <iframe height="200" width="100%"  src="https://www.youtube.com/embed/<?php echo $data['videoUrl']; ?>?showinfo=0&controls=0&rel=0&modestbranding=1">
                            </iframe>
                        </div>
                    <?php } ?>
                <div class="mor-but">
                    <!--<a href="video.php">More Videos</a>-->
                </div>
            </div>
        </div>
   </div>
</section>
<!---================================================= -->


<section id="ebook">
    <div class="container">
        <div class="video-home">
             <h2>Latest Ebooks</h2>
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
        <div class="mor-but">
            <!--<a href="notespdf.php">More E-Books</a>-->
        </div>
    </div>
</section>
<!-- top selected============================= -->
<section id="academic">
    <div class="partaners">
        <div class="container">
            <h1> Top Selected Students </h1>
            <div class="top-st row">
                <?php foreach($topperResultDataArr as $data){  ?> 
                    <div class="col-lg-3 col-md-3 col-sm-6">
                         <div class="ebbok-con">
                             <div class="ebbok-img">
                                <img src="<?php echo $data['image']; ?>">
                             </div>
                             <div class="ebbok-tt">
                                  <h3><?php echo $data['topperName']; ?></h3>
                                  <div class="toper-dec"><?php echo $data['rank']; ?>,&nbsp;<?php echo $data['examName']; ?> - <?php echo $data['year']; ?></div>
                             </div>
                         </div>
                    </div> 
                <?php } ?>
            </div> 
            <div class="mor-but">
            <!--<a href="topper.php">More </a>-->
        </div>
        </div>
    </div> 
</section>
<!-- ========================================================= -->

<section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="container padding-25px-all">
        <div class="row  hover-option4 blog-post-style3"> 
            <div class="grid-item col-12 col-md-6 col-lg-6 md-margin-30px-bottom text-center text-md-left wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                <div class="bg-light-gray border shadow">
                    <div class="padding-0px-all sm-padding-0px-all box-style-1">
                        <h5 class="s2blue">Latest Vacancies </h5>
                            <div class="marj">
                                <marquee  scrollamount="2" scrolldelay="5" direction="up" onmouseover="this.stop()" onmouseout="this.start()">
                                    <ul class="p-0 list-style-10">
                                        <li class="text-extra-dark-gray text-medium"><i class="fa fa-hand-o-right text-extra-dark-gray" aria-hidden="true"></i><a href="" class="text-extra-dark-gray"><span>SBI Clerk Notification Out Not</span></a></li>
                                        <li class="text-extra-dark-gray text-medium"><i class="fa fa-hand-o-right text-extra-dark-gray" aria-hidden="true"></i><a href="" class="text-extra-dark-gray"><span>SBI Apprentice Recruitment 2020 Notification Out</span></a></li>
                                        <li class="text-extra-dark-gray text-medium"><i class="fa fa-hand-o-right text-extra-dark-gray" aria-hidden="true"></i><a href="" class="text-extra-dark-gray"><span>SBI PO 2020 Notification Out</span></a></li>
                                        <li class="text-extra-dark-gray text-medium"><i class="fa fa-hand-o-right text-extra-dark-gray" aria-hidden="true"></i><a href="" class="text-extra-dark-gray"><span>SSC CHSL (10+2) Examination, 2020 Notification Released</span></a></li>
                                        <li class="text-extra-dark-gray text-medium"><i class="fa fa-hand-o-right text-extra-dark-gray" aria-hidden="true"></i><a href="" class="text-extra-dark-gray"><span>UPSESSB TGT, PGT Recruitment Exam Notification Released</span></a></li>
                                        <li class="text-extra-dark-gray text-medium"><i class="fa fa-hand-o-right text-extra-dark-gray" aria-hidden="true"></i><a href="" class="text-extra-dark-gray"><span>IBPS SO 2021-22 Notification Released</span></a></li>
                                        <li class="text-extra-dark-gray text-medium"><i class="fa fa-hand-o-right text-extra-dark-gray" aria-hidden="true"></i><a href="" class="text-extra-dark-gray"><span>UCO Bank SO Recruitment 2020</span></a></li>
                                        <li class="text-extra-dark-gray text-medium"><i class="fa fa-hand-o-right text-extra-dark-gray" aria-hidden="true"></i><a href="" class="text-extra-dark-gray"><span>SSC Stenographer Grade ‘C’ &amp; ‘D’ Notification 2020 Out</span></a></li>
                                    </ul>
                                </marquee>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-item col-12 col-md-6 col-lg-6 text-center text-md-left wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <div class="bg-light-gray border shadow">
                        <div class="padding-0px-all sm-padding-0px-all box-style-1">
                            <h5 class="s2blue">Upcoming</h5>
                            <div class="marj">
                                <marquee  scrollamount="2" scrolldelay="5" direction="up" onmouseover="this.stop()" onmouseout="this.start()">
                                    <div class="batch">
                                        <div class="testimonial-info-2 text-extra-dark-gray text-medium font-weight-400 text-inherit padding-10px-bottom"><a href="" class="text-extra-dark-gray">Reasoning Foundation Online Batch</a></div>
                                        <div class="date"><span class="post-author text-small text-medium-gray text-uppercase d-block margin-10px-bottom sm-margin-5px-bottom"><i class="fa fa-calendar"></i> 15-06-21 &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fa fa-clock-o"></i>  &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fa fa-map-marker "></i> </span></div>
                                            <div class="separator-line-horrizontal-full bg-medium-gray margin-20px-tb"></div>
                                    </div>
                                    <div class="batch">
                                        <div class="testimonial-info-2 text-extra-dark-gray text-medium font-weight-400 text-inherit padding-10px-bottom"><a href="" class="text-extra-dark-gray">Science Foundation Online Batch</a></div>
                                        <div class="date"><span class="post-author text-small text-medium-gray text-uppercase d-block margin-10px-bottom sm-margin-5px-bottom"><i class="fa fa-calendar"></i> 15-06-21 &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fa fa-clock-o"></i>  &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fa fa-map-marker "></i> </span></div>
                                        <div class="separator-line-horrizontal-full bg-medium-gray margin-20px-tb"></div>
                                    </div>
                                    <div class="batch"> 
                                        <div class="testimonial-info-2 text-extra-dark-gray text-medium font-weight-400 text-inherit padding-10px-bottom"><a href="" class="text-extra-dark-gray">Banking Foundation Complete Online Course</a></div>
                                        <div class="date"><span class="post-author text-small text-medium-gray text-uppercase d-block margin-10px-bottom sm-margin-5px-bottom"><i class="fa fa-calendar"></i> 01-07-21 &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fa fa-clock-o"></i>  &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fa fa-map-marker "></i> </span></div>
                                        <div class="separator-line-horrizontal-full bg-medium-gray margin-20px-tb"></div>
                                    </div>
                                </marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--====================Exams Covered================================== -->
<section id="ex-coverd">
    <div class="container">
        <div class="ex-coverd-main">
            <div class="ex-coverd-title">
                <h3>Exams Covered</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ex-coverd-con">
                        <img src="assets/img/ibps-2.png">
                        <h3>IBPS PO</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ex-coverd-con">
                        <img src="assets/img/ibps-2.png">
                        <h3>IBPS CLERK</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ex-coverd-con">
                        <img src="assets/img/ibps-2.png">
                        <h3>IBPS RRB</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ex-coverd-con">
                        <img src="assets/img/ibps-2.png">
                        <h3>IBPS RRB CLERK</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============our other ================================= -->

<section id="our-add">
  <div class="container">
      <div class="our-add-main">
          <div class="our-add-main-title">
              <h3>Our Additional Material</h3>
          </div>
          <div class="row">
              <div class="col-lg-2 com-md-4 col-sm-12">
                  <div class="our-add-con">
                      <img src="assets/img/syllabus-new.png">
                      <h3>Syllabus</h3>
                  </div>
              </div>

              <div class="col-lg-2 com-md-4 col-sm-12">
                  <div class="our-add-con">
                      <img src="assets/img/news-new.png">
                      <h3>E-News</h3>
                  </div>
              </div>

              <div class="col-lg-2 com-md-4 col-sm-12">
                  <div class="our-add-con">
                      <img src="assets/img/question-new.png">
                      <h3>Question Bank</h3>
                  </div>
              </div>

              <div class="col-lg-2 com-md-4 col-sm-12">
                  <div class="our-add-con">
                      <img src="assets/img/current-affairs-new.png">
                      <h3>Current Affairs</h3>
                  </div>
              </div>

              <div class="col-lg-2 com-md-4 col-sm-12">
                  <div class="our-add-con">
                      <img src="assets/img/vocabulary-new.png">
                      <h3>Daily Vocabulary</h3>
                  </div>
              </div>

              <div class="col-lg-2 com-md-4 col-sm-12">
                  <div class="our-add-con">
                      <img src="assets/img/e-mica-new.png">
                      <h3>Competition Booster</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<?php include 'footer.php';?>


<!--//////////////////////////razorpay////////////////////////////// -->
<script>
    function payNNow(){
        alert('successl');
        var options = {
            alert('successlllllll');
            // "key": "rzp_test_rlDBSqjlD1ISdm", 
            // "amount": "50000000",
            // "currency": "INR",
            // "name": "Excellent coachings", 
            // "description": "Excellent coachings",
            // "image": "https://dynamic.brandcrowd.com/asset/logo/cbb0b2e5-dc04-4383-937d-8a48ef4d93fd/logo?v=636782307497330000",
            // "handler": function (response){
                // jQuery.ajax({
                //     // url: "web-api/course-purchage/payment.php",
                //     type: "POST",
                //     data: "payment_id="+response.razorpay_payment_id+",
                //     // &purchaseAmount="+amt+"&courseName="+courseName+"&courseId="+courseId+"&studentId"+studentId+"&courseDesc="+courseDescription+"&courseNameHi="+courseNameHi+"&courseDescriptionHi="+courseDescriptionHi,
                //     success:function(result){
                //         alert('Data Inserted Successfully');
                //     }
                //     // {
                //     //     if(data.status == '200')
                //     //     {
                //     //       alert('success');
                //     //         // window.location. reload();
                //     //     }
                //     //     else
                //     //     { 
                //     //      //   $("#err").show()
                //     //     }
                //     // },
                //     // error: function(e) 
                //     // {
                //     // }          
                // });
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
</script>

<!--<script>-->
<!--var options = {-->
    <!--"key": "rzp_test_rlDBSqjlD1ISdm", // Enter the Key ID generated from the Dashboard-->
    <!--"amount": "50000" * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise-->
<!--    "currency": "INR",-->
<!--    "name": "Excellent Coachings",-->
<!--    "description": "Test Transaction",-->
<!--    "image": "https://example.com/your_logo",
    // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1-->
<!--    "handler": function (response){-->
<!--       alert('Payment Successfully...!');-->
<!--    },-->
<!--    "prefill": {-->
<!--        "name": "Abinash",-->
<!--        "email": "abinash@test.com",-->
<!--        "contact": "9999999999"-->
<!--    },-->
<!--    "notes": {-->
<!--        "address": "Razorpay Corporate Office"-->
<!--    },-->
<!--    "theme": {-->
<!--        "color": "#3399cc"-->
<!--    }-->
<!--};-->
<!--var rzp1 = new Razorpay(options);-->
<!--rzp1.on('payment.failed', function (response){-->
<!--        alert(response.error.code);-->
<!--        alert(response.error.description);-->
<!--        alert(response.error.source);-->
<!--        alert(response.error.step);-->
<!--        alert(response.error.reason);-->
<!--        alert(response.error.metadata.order_id);-->
<!--        alert(response.error.metadata.payment_id);-->
<!--});-->
<!--document.getElementById('btn').onclick = function(e){-->
<!--    rzp1.open();-->
<!--    e.preventDefault();-->
<!--}-->
<!--</script>-->

<!--//////////////////////////razorpay//////////////////////////////-->