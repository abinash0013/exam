<?php include 'header.php';?>
<!--===================== End Header ===================-->


<!-- ==================== COURS content======================= -->

<!-- ========================our key ================================= -->
<!--<section id="cour-mid" class="sol">-->
<!--    <div class="container">        -->
<!--         <div class="solu-titl">-->
<!--             <i class="fas fa-chevron-left"></i> <h3>SSC CHSL : GS TEST 2101</h3>-->
<!--         </div>-->
<!--    </div>-->
<!--</section>-->
<!-- =====================Courises=========================== -->

<?php 
$examId=$_GET['examid'];
$studentId=$_SESSION['userId'];
 $rightAns=0;
$wrongAns=0;
$unattAns=0;
 
$totalQuestion=0;
?>
<?php  
   $query=$con->query("SELECT question.*, tbl_attemt_exam.* FROM `question` LEFT JOIN tbl_attemt_exam on 
   tbl_attemt_exam.questionId=question.questionId  WHERE   tbl_attemt_exam.examId=$examId and tbl_attemt_exam.studentId=$studentId");
              
    
    while($roww=mysqli_fetch_array($query)) 
    {
            $studentAnswer=null;
            $quesId=$roww['questionId'];  
            if($roww["studentAnswer"] == strtolower($roww['answer'])||$roww["answer"] == strtolower($roww['studentAnswer']) || $roww["answer"] == $roww['studentAnswer'] && $val['studentAnswer'] != null ){
                $rightAns=$rightAns+1;
            }
            
            $totalQuestion=$totalQuestion+1;
            
            if(($roww["studentAnswer"] != strtolower($roww['answer']) && $roww["answer"] != strtolower($roww['studentAnswer']) && $roww["answer"] != $roww['studentAnswer']) && $roww["studentAnswer"] != null){
                $wrongAns=$wrongAns+1;
            }
            
            if($roww["studentAnswer"] == null){
                $unattAns=$unattAns+1;
            } 
    } 
?>
<?php 
 
    $attemtResultData = $con->query("SELECT * FROM `tbl_attemt_exam` WHERE `examId`=$examId and studentId=$studentId");
    $attemtResult=array();
    while($attemtRow=mysqli_fetch_array($attemtResultData)){
        $attemtResult[]=$attemtRow;
    }
    
?>
<?php  
    $totalQues=0;
    $examTime=0;
    $ExamName=null;
    $examResultData = $con->query("SELECT * FROM `exam` WHERE `examId`=$examId"); 
    while($examRow=mysqli_fetch_array($examResultData)){
         $totalQues=$examRow['totalQuestion'];
        $examTime=$examRow['examTime'];
        $ExamName=$examRow['examName'];;
    }
    
?>
<!--====================Exams Covered================================== -->
<section id="mokexame">
  <div class="container">
        <div class="moke-tilte">
            <h3><?php echo $ExamName ?></h3>
        </div> 
        <div class="moke-top">
            <!--<div class="moke-top-1">-->
            <!--    <div class="moke-img">-->
            <!--        <img src="assets/img/moke.png">-->
            <!--    </div>-->
            <!--</div>-->
            <div class="moke-top-2">
                <div class="total-quz">
                    <p>Total Question-<?php echo $totalQues ?></p>
                </div>
            </div>
            <div class="moke-top-3">
                <div class="quz-time">
                    <p>Minutes-<?php echo $examTime ?></p>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div> 

        <div class="mok-question">
               <div class="mok-sub">
                   <ul>
                       <li><span class="attm"><?php echo $rightAns ?></span>Correct Answer</li>
                       <li><span class="untt"><?php echo $wrongAns ?></span>Incorrect Answer</li>
                       <li><span class="notv"><?php echo $unattAns; ?></span>Not Attempted</li>
                   </ul>
               </div> 
        </div>
        </div>
    </section>
<section id="cour-mid" class="sol">
    <div class="container">        
       <div class="solu-titl">
               <div class="mok-tab">
                   <!-- Tab links -->
                        <!--<div class="tab">-->
                        <!--  <button class="tablinks" onclick="openCity(event, 'All')">All</button>-->
                        <!--  <button class="tablinks" onclick="openCity(event, 'Attempted')">Attempted</button>-->
                        <!--  <button class="tablinks" onclick="openCity(event, 'Unattempted')">Unattempted</button>-->
                        <!--</div>-->

                        <!-- Tab content -->
                    <div id="All" class="tabcontent ex-tab" style="display: block;">
                      <ul>
                          <?php 
                    $s=0;
                    foreach($attemtResult as $val){ $s=$s+1;
                    
                    if($val["studentAnswer"] == strtolower($val['answerKey']) || $val["answerKey"] == strtolower($val['studentAnswer']) || $val["answerKey"] == $val['studentAnswer'] && $val['studentAnswer'] != null){
                    ?> 
                         <li><span class="attm"><?php echo $s ;?></span></li>
                    <?php }else if($val["studentAnswer"] != strtolower($val['answerKey']) && $val["answerKey"] != strtolower($val['studentAnswer']) && $val["answerKey"] != $val['studentAnswer'] && $val['studentAnswer'] != null){  ?>
                         <li><span class="untt"><?php echo $s ;?></span></li>
                    <?php  } else{ ?> 
                          <li><span class="notv"><?php echo $s ;?></span></li> 
                     <?php }}?>           
                      </ul>    
                    </div>
 
               </div>           
         
        </div>
        
       
        <br>
    
        <div class="mok-button">
            <div class="mok-but-1">
                <a href="solution.php?examid=<?php echo $examId; ?>">Solution</a>
            </div>
            <div class="mok-but-2">
                <a href="index.php">Go to home</a>
            </div>
            <div class="mok-but-3"> 
                <a href="exam-demo1.php?examid=<?php echo $examId; ?>">Re-attempt</a>
            </div>
   
        </div>  
        
</div>
  
</section>
<!--=============our other ================================= -->

<script type="text/javascript">
    function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

</script>

<!-- ======================================= -->

<!-- ======= Footer ======= -->
<?php include 'footer.php';?>