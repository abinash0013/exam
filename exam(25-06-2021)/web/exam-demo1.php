<?php include 'header.php';?>
<!--===================== End Header ===================-->

<?php 
    $examId=$_GET['examid'];
    $userId = $_SESSION['userId'];
    $profileResultData = $con->query("SELECT * FROM `tbl_users` WHERE `userId`=$userId");
    $profileResult=array();
    while($profileRow=mysqli_fetch_array($profileResultData)){
        $profileResult[]=$profileRow;
    }
    
?>
<?php 
 
    $attemtResultData = $con->query("SELECT * FROM `tbl_attemt_exam` WHERE `examId`='$examId' and studentId='$userId'");
    $attemtResult=array();
    $totalQ=0;
    while($attemtRow=mysqli_fetch_array($attemtResultData)){
        $attemtResult[]=$attemtRow;
        $totalQ++;
    }
    
?>
<?php 

    // $questionResultData = $con->query("SELECT * FROM `question` WHERE examId = 1");
    $questionResultData = $con->query("SELECT * FROM `question` WHERE examId = $examId ORDER BY examId DESC LIMIT 1");

    $questionResult=array();
    while($questionRow=mysqli_fetch_array($questionResultData)){
        $questionResult[]=$questionRow;
    }
    
?>
<?php
 
    $examResultData = $con->query("SELECT * FROM  `exam`  WHERE examId = $examId ");
   $examName=null;
   $examTime=null;
    while($examRow=mysqli_fetch_array($examResultData)){
        $examName=$examRow['examName'];
         $examTime=$examRow['examTime'];
    }
    
?>

<!--=====================join exam Script Start ===================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#joinform").on("submit", function (e) {
            e.preventDefault();
            $.ajax({
                url: "web-api/exam/join-exam.php",
                type: "POST",
                dataType: "JSON",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#btnsubmit").show(); 
                    if (data.status == 200) {
                         console.log(data)
                       
                        //alert(data.studentAnswer)
                          document.getElementById('question').innerHTML = data.questionlabel; 
                          document.getElementById('questionId').value =   data.questionId;
                          document.getElementById('questionIdNext').value = data.questionIdNext;
                          
                          document.getElementById('questionNo').value ='2'; 
                          document.getElementById('series').innerHTML ='1';
                          document.getElementById('series1').innerHTML ='1';
                          document.getElementById('option1').innerHTML =  data.option1; 
                          document.getElementById('option2').innerHTML =  data.option2; 
                          document.getElementById('option3').innerHTML =  data.option3; 
                          document.getElementById('option4').innerHTML =  data.option4; 
                          
                         if(data.studentAnswer == "a"){
                              document.getElementById("o1").checked = true; 
                         }
                        else if(data.studentAnswer == "b"){
                              document.getElementById("o2").checked = true; 
                         }
                        else if(data.studentAnswer == "c"){
                              document.getElementById("o3").checked = true; 
                         }
                        else if(data.studentAnswer == "d"){
                              document.getElementById("o4").checked = true; 
                         }
                         else{
                               document.getElementById("o1").checked = false; 
                               document.getElementById("o2").checked = false; 
                               document.getElementById("o3").checked = false; 
                               document.getElementById("o4").checked = false; 
                         }
                         
                         
                         
                        
                        	
                    } else {
                        Swal.fire(
                            'Faild!',
                            'Some thing wrong',
                            'warning'
                    	)
                    }
                },
                error: function (e) {
                    $("#err").show();
                    // $("#successmessage").html("Some thing went wrong").fadeIn().style.color.red;
                },
            });
        });
    });
</script>
<!--===================== Join Exam Script End ===================-->

<!--====================Question attemt Script Start ===================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#attemtform").on("submit", function (e) {
            e.preventDefault();
            $.ajax({
                url: "web-api/exam/attemt-exam.php",
                type: "POST",
                dataType: "JSON",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    // $("#btnsubmit").show(); 
                    //alert(data.questionlabel)
                    if (data.status == 200) { 
                         if(data.option1 == null){
                             var btnid=document.getElementById('questionId').value;
                             document.getElementById(btnid).style.background='green';
                           alert("Your exam completed");
                                
                             
                         }else{
                          var btnid=document.getElementById('questionId').value;
                          document.getElementById(btnid).style.background='green';
                          document.getElementById('question').innerHTML = data.questionlabel; 
                          document.getElementById('questionId').value =   data.questionId;
                          document.getElementById('questionIdNext').value = data.questionIdNext; 
                          document.getElementById('questionNo').value = data.questionNo;  
                          document.getElementById('option1').innerHTML =  data.option1; 
                          document.getElementById('option2').innerHTML =  data.option2; 
                          document.getElementById('option3').innerHTML =  data.option3; 
                          document.getElementById('option4').innerHTML =  data.option4; 
                          if(data.questionNo > 1){
                            document.getElementById('series').innerHTML =data.questionNo-1;
                            document.getElementById('series1').innerHTML =data.questionNo-1;
                          }
                         
                          
                        if(data.studentAnswer == "a"){
                              document.getElementById("o1").checked = true; 
                         }
                        else if(data.studentAnswer == "b"){
                              document.getElementById("o2").checked = true; 
                         }
                        else if(data.studentAnswer == "c"){
                              document.getElementById("o3").checked = true; 
                         }
                        else if(data.studentAnswer == "d"){
                              document.getElementById("o4").checked = true; 
                         }
                         else{
                               document.getElementById("o1").checked = false; 
                               document.getElementById("o2").checked = false; 
                               document.getElementById("o3").checked = false; 
                               document.getElementById("o4").checked = false; 
                         }
                        }
                         
                    } else {
                        Swal.fire(
                            'Faild!',
                            'Some thing wrong',
                            'warning'
                    	)
                    }
                },
                error: function (e) {
                    $("#err").show();
                    // $("#successmessage").html("Some thing went wrong").fadeIn().style.color.red;
                },
            });
        });
    });
</script>
<!--====================Question attemt Script End ===================-->
<script>
        function getQuestion(Qid,Eid,Sid,SeriesNo) {
             
         $.ajax({
            url: "web-api/exam/get-question-details.php",
            type: "POST",
            dataType:"JSON",
            data: "questionId=" + Qid +"&examId=" + Eid +"&studentId=" + Sid +"&questionNo=" + SeriesNo ,
            success: function(data)
            {
//alert(data.questionIdNext);
                if(data.status == '200')
                {
                          document.getElementById('question').innerHTML = data.questionlabel; 
                          document.getElementById('questionId').value =   data.questionId;
                          document.getElementById('questionIdNext').value = data.questionIdNext; 
                          document.getElementById('questionNo').value = data.questionNo;  
                          document.getElementById('option1').innerHTML =  data.option1; 
                          document.getElementById('option2').innerHTML =  data.option2; 
                          document.getElementById('option3').innerHTML =  data.option3; 
                          document.getElementById('option4').innerHTML =  data.option4; 
                          if(data.questionNo > 1){
                             document.getElementById('series').innerHTML =data.questionNo-1;
                             document.getElementById('series1').innerHTML =data.questionNo-1;
                          }
                          
                          // document.getElementById(data.questionId).style.background='green';
                           
                        if(data.studentAnswer == "a"){
                              document.getElementById("o1").checked = true; 
                         }
                        else if(data.studentAnswer == "b"){
                              document.getElementById("o2").checked = true; 
                         }
                        else if(data.studentAnswer == "c"){
                              document.getElementById("o3").checked = true; 
                         }
                        else if(data.studentAnswer == "d"){
                              document.getElementById("o4").checked = true; 
                         }
                         else{
                               document.getElementById("o1").checked = false; 
                               document.getElementById("o2").checked = false; 
                               document.getElementById("o3").checked = false; 
                               document.getElementById("o4").checked = false; 
                         }
                }
                else
                { 
                  
                    alert(data.message);
                }
            },
                 
        });
    }
</script>
<script>
    function submitexam(){
                             var txt;
                                  var r = confirm("Your exam completed . Are you want see result ?");
                                  if (r == true) {
                                    window.location.href="result.php?examid=<?php echo $examId; ?>";
                                  } else {
                                     
                                  }
    }
</script>
<section id="profile">
    <div class="container">
        <div class="pro-cos">
            <div class="moke-tilte">
               <h3><?php echo $examName; ?></h3>
            </div> 
            
            <?php if($_SESSION['userId'] != null){?>
            <div class="join-form-main join-block">
               <form id="joinform" method="post">
                 <input type="hidden" name="lg" value="en">
                 <input type="hidden" name="studentId" value="<?php echo $userId ; ?>">
                 <input type="hidden" name="examId" value="<?php echo $examId ; ?>">
                 <input type="submit" value="join exam" class="sub-but" >
             </form> 
            </div>
            <?php } else { ?>
            <div class="join-form-main join-block">
                <form id="joinform"  action="login.php"  >
                 <a  class="sub-but" href="login.php" >Join Exam</a>
             </form> 
            </div>
            <?php } ?>
            
            <script>
                $('.join-form-main .sub-but').on('click', function(){
                    $('.join-form-main').removeClass('join-block');
                    $(this).addClass('join-none');
                });
                
                $(".sub-but").click(function(){
                      $(".main-block-ex").removeClass("main-none");
                      $(".main-block-ex").addClass("main-block");
                    });
            </script>
            <style>
                .join-block{ display:block;}
                .join-none{ display:none;}
                .main-none{ display:none;}
                .main-block{ display:block;}
                #joinform {
                    text-align: center;
                    width: 100%;
                    margin: 30px 0 0 0;
                }
                .sub-but {
                    background-color: #306a98;
                    color: #fff;
                    border: none;
                    font-size: 24px;
                    text-transform: uppercase;
                    padding: 10px 30px;
                    border-radius: 3px;
                }
                .quz-main input[type=checkbox], input[type=radio] {
                    box-sizing: border-box;
                    padding: 10px;
                    height: 20px;
                    width: 34px;
                }
            </style>
            
            <div class="main-block-ex main-none">
            <div class="moke-top">
            <div class="moke-top-1">
                
                <div class="total-quz">
                    <p><span  id="series1"></span>/<?php echo $totalQ; ?></p>
                </div>
            </div>
            <div class="moke-top-2">
                <div class="quz-time">
                    <p id="quztime"></p>
                </div>
            </div>
            <div class="moke-top-3">
                <div class="moke-img">
                    <input   type="button" value="Submit" onclick = "submitexam()" class="btn btn-info">
                </div>
                 
            </div>
            <div style="clear:both;"></div>
        </div>
            
            <?php $q=0; ?>
            <?php foreach($questionResult as $questionValue) { ?>
                <div class="test">
                    <div class="mok-quz-title">Q.<span  id="series"></span> <span id="question"></span> </div>
                    <form id="attemtform" method="post">
                             <input type="hidden" name="lg" value="1">
                             <input type="hidden" name="studentId" value="<?php echo $userId ; ?>">
                             <input type="hidden" name="examId" value="<?php echo $examId ; ?>">
                             
                                <input type="hidden" name="questionId"  id="questionId">
                                <input type="hidden" name="questionIdNext"  id="questionIdNext">
                                  <input type="hidden" name="questionNo"  id="questionNo">
                              <div class="quz-main">  
                                    <span>A</span><input type="radio" name="studentAnsware" value="a" id="o1" required>
                                    <div id="option1"></div>
                               </div> 
                               <div class="quz-main">
                                   <span>B</span><input type="radio" name="studentAnsware" value="b" id="o2" required>
                                     <div id="option2"></div>
                               </div>
                               <div class="quz-main">
                                   <span>C</span><input type="radio" name="studentAnsware" value="c" id="o3" required>
                                     <div id="option3"></div>
                                </div>
                                <div class="quz-main">
                                   <span>D</span><input type="radio" name="studentAnsware" value="d" id="o4" required>
                                    <div id="option4"></div>
                                </div>
                                
                            
                           <div class="sub-mm"> <input type="submit" value="Next" id="btnnext"></div>
                    </form> 
                    <ul class="text-center">
                        <!--<input id="previous" type="button" value="Previous" onclick = "prev()" class="btn btn-info">-->
                       
                    </ul>
                    <div class="question-main">
                    <?php 
                    $s=0;
                    foreach($attemtResult as $val){ $s=$s+1;?> 
                        <input type="button" id="<?php echo $val['questionId']?>" class="question-id" onclick = "getQuestion(<?php echo $val['questionId']?>,<?php echo $examId ; ?>,<?php echo $userId ; ?>,<?php echo $s;?>)" value="<?php echo $s ;?>">
                    <?php } ?>
                    
                    </div>
                </div>
            <?php } ?> 
            
            </div>
        </div>
    </div>
</section>
<style>.question-id {
    margin-left: 8px;
    margin-right: 7px;
    width: 50px;
    height: 50px;
    background: gray;
    border-radius: 50%;
    position: relative;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    float: left;
    margin-bottom: 15px;
    
}
.question-main {
    
    width: 100%;
}
.mok-quz-title span {
    font-size: 18px;
    color: #306a98;
    margin: 0;
    padding: 25px 0;
}
.quz-main p, .quz-main h1, .quz-main h2, .quz-main h3, .quz-main h4, .quz-main h5, .quz-main h6 {
    margin: 0;
}
.mok-quz-title{color: #306a98;}
.join-form-main {
    width: 100%;
}
.pro-cos {
    width: 100%;
    float: left;
}
.test {
    width: 100%;
    float: left;
    display: block;
    padding: 20px 0;
}
.main-block-ex {
    width: 100%;
    float: left;
}
.sub-mm {
    width: 100%;
    text-align: center;
    margin: 20px 0;
}
.sub-mm input {
    background-color: #135589;
    color: #fff;
    padding: 10px 30px;
    border-radius: 5px;
    border: none;
    text-transform: uppercase;
}
.quz-main {
    width: 100%;
    margin-bottom: 15px;
    margin-top: 15px;
    display: flex;
    align-items: center;
}

.quz-main span {
    border: 1px solid #306a98;
    border-radius: 50px;
    margin-right: 15px;
    height: 36px;
    width: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
}
div#option1, div#option2, div#option3, div#option4 {
    margin-left: 15px;
}


</style>

<script>
 var countDownDate = new Date();
                        countDownDate.setMinutes(countDownDate.getMinutes() + <?php echo $examTime; ?>); // timestamp
                        countDownDate = new Date(countDownDate); // Date object 
                        // Set the date we're counting down to
                        //var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();
                        
                        // Update the count down every 1 second
                        var x = setInterval(function() {
                        
                          // Get today's date and time
                          var now = new Date().getTime();
                           // alert(now)
                          // Find the distance between now and the count down date
                          var distance = countDownDate - now;
                            
                          // Time calculations for days, hours, minutes and seconds
                          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                            
                          // Output the result in an element with id="quztime"
                          document.getElementById("quztime").innerHTML = hours + ":"
                          + minutes + ":" + seconds + "";
                            
                          // If the count down is over, write some text 
                          if (distance < 0) {
                              clearInterval(x);
                               $("#btnnext").hide(); 
                             
                           // clearInterval(x);
                            document.getElementById("quztime").innerHTML = "TIME EXPIRED";
                             window.location.href="result.php?examid=<?php echo $examId; ?>";
                             
                            
                          }
                        }, 1000);

</script>

<!-- ======================================= -->

<?php include 'footer.php';?>