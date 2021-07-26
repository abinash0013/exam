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
    $pdfResultData=$con->query("select * from `tbl_pdf` LIMIT 0, 8");
    $pdfResultDataArr=array();
    while($pdgRow=mysqli_fetch_array($pdfResultData))
    {
        $pdfResultDataArr[]=$pdgRow;
    }
?>

<?php 
    //$topperResultData=$con->query("SELECT tbl_topper.*, exam.examName as eName, exam.examDate as eDate FROM tbl_topper LEFT JOIN exam on tbl_topper.examName = exam.examId LIMIT 0, 12");
   $topperResultData=$con->query("SELECT * from  tbl_topper ");
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

 
 



<!---================================================= -->

<!-- top selected============================= -->
<section id="academic">
    <div class="partaners">
        <div class="container">
            <h1>All Top Selected Students </h1>
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
        </div>
    </div> 
</section>
<!-- ========================================================= -->

<!--====================Exams Covered================================== -->

<!--=============our other ================================= -->

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