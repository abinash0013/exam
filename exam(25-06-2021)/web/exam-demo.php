<?php include 'header.php';?>
<!--===================== End Header ===================-->

<?php 

    $userId = $_SESSION['userId'];
    $profileResultData = $con->query("SELECT * FROM `tbl_users` WHERE `userId`=$userId");
    $profileResult=array();
    while($profileRow=mysqli_fetch_array($profileResultData)){
        $profileResult[]=$profileRow;
    }
    
?>
<?php 
 
    $attemtResultData = $con->query("SELECT * FROM `tbl_attemt_exam` WHERE `examId`='1' and studentId='50'");
    $attemtResult=array();
    while($attemtRow=mysqli_fetch_array($attemtResultData)){
        $attemtResult[]=$attemtRow;
    }
    
?>
<?php 

    // $questionResultData = $con->query("SELECT * FROM `question` WHERE examId = 1");
    $questionResultData = $con->query("SELECT * FROM `question` WHERE examId = 1 ORDER BY examId DESC LIMIT 1");

    $questionResult=array();
    while($questionRow=mysqli_fetch_array($questionResultData)){
        $questionResult[]=$questionRow;
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
                             alert("Your exam completed")
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
<section id="profile">
    <div class="container">
        <div class="pro-cos">
            <h3 class="text-center"><a href="#">Exam Quiz</a></h3>
            
             <form id="joinform" method="post">
                 <input type="hidden" name="lg" value="1">
                 <input type="hidden" name="studentId" value="50">
                 <input type="hidden" name="examId" value="1">
                 <input type="submit" value="join exam" >
             </form>
            
             
            
            
            <?php $q=0; ?>
            <?php foreach($questionResult as $questionValue) { ?>
                <div class="test">
                    <h4>Q.<span  id="series"></span><span id="question"></span> </h4>
                    <form id="attemtform" method="post">
                             <input type="hidden" name="lg" value="1">
                             <input type="hidden" name="studentId" value="50">
                             <input type="hidden" name="examId" value="1">
                             
                                <input type="hidden" name="questionId"  id="questionId">
                                <input type="hidden" name="questionIdNext"  id="questionIdNext">
                                  <input type="hidden" name="questionNo"  id="questionNo">
                                A.<input type="radio" name="studentAnsware" value="a" id="o1" required>
                                <span id="option1"></span><br>
                                B.<input type="radio" name="studentAnsware" value="b" id="o2" required>
                                 <span id="option2"></span><br>
                                C.<input type="radio" name="studentAnsware" value="c" id="o3" required>
                                 <span id="option3"></span><br>
                                D.<input type="radio" name="studentAnsware" value="d" id="o4" required>
                                <span id="option4"></span><br>
                            
                            <input type="submit" value="submit" >
                    </form> 
                    <ul class="text-center">
                        <!--<input id="previous" type="button" value="Previous" onclick = "prev()" class="btn btn-info">-->
                        <!--<input id="next" type="button" value="Next" onclick = "next()" class="btn btn-info">-->
                    </ul>
                    <div class="question-main">
                    <?php 
                    $s=0;
                    foreach($attemtResult as $val){ $s=$s+1;?> 
                        <input type="button" id="<?php echo $val['questionId']?>" class="question-id" onclick = "getQuestion(<?php echo $val['questionId']?>,1,50,<?php echo $s;?>)" value="<?php echo $s ;?>">
                    <?php } ?>
                    
                    </div>
                </div>
            <?php } ?> 
        </div>
    </div>
</section>
<style>.question-id {
    margin-left: 15px;
    width: 50px;
    height: 44px;
    background: gray;
    border-radius: 50%;
    position: relative;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
}
.question-main {
    display: flex;
    width: 100%;
}



</style>

<!-- ======================================= -->

<?php include 'footer.php';?>