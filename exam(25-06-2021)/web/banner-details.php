<?php include 'header.php';?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php 

 $bannerId=$_GET['bannerId'];
    $bannerResultData=$con->query("select * from `tbl_banner` where  bannerId=$bannerId");
    // $subjectResultData=$con->query("SELECT tbl_subject.*, tbl_purchase_course.courseId, tbl_purchase_course.studentId FROM tbl_subject LEFT JOIN tbl_purchase_course on tbl_purchase_course.studentId = tbl_subject.courseId order by tbl_subject.courseId desc");

    $bannerResultDataArr=array();
    while($bannerRow=mysqli_fetch_array($bannerResultData))
    {
        $bannerResultDataArr[]=$bannerRow;
    }
?>
<!--===================== End Header ===================-->
<section id="course-sg" style="background-image: url(assets/img/bank-po.jpg);" class="back-bg">
   
</section>
<?php foreach($bannerResultDataArr as $data){ ?>
<!-- ==================== COURS content======================= -->
<section id="course-content">
  <div class="container">
      <div class="row">
           <div class="col-lg-8 col-md-8 col-sm-12">
               <div class="cour-left">
                   <h3><?php echo $data['title'];?></h3>
                   <p><?php echo $data['description'];?></p>
                  <!--<ul>-->
                  <!--  <li><strong>CHSL</strong> (Combined Higher Secondary Level)</li>-->
                  <!--  <li><strong>LDC</strong> (Lower Division Clerk)</li>-->
                  <!--  <li><strong>MTS</strong> (Multi Tasking Staff)</li>-->
                  <!--</ul>-->
                  <div class="cour-down">
                      <!--<a class="" href="assets/img/ssc.pdf" target="_blank">
                      <i class="fa fa-download" aria-hidden="true"></i> Syllabus</a>-->

                      <!--<a class="" href="assets/img/ssc.pdf" target="_blank">
                      <i class="fa fa-download" aria-hidden="true"></i> Exam Pattern</a>-->

                      <!--<a targt="_blank" name="btn" id="btn" onclick="payNNow()">
                      <i class="fas fa-shopping-cart"></i> Buy Now</a>-->
                      <!--<a href="" onclick='payNow()'><i class="fas fa-shopping-cart"></i> Buy Now</a>-->
                      <!--<input class="pro-buy" type="button" name="btn" id="btn" value="Buy Now" onclick="payNNow()">-->
                  </div>
               </div>
           </div>
           <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="cour-right">
                   <img src="<?php echo $data['image'];?>">
               </div>
           </div>
      </div>
  </div>
</section>


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