<?php include 'header.php';?>
<!--===================== End Header ===================-->


<!-- ==================== COURS content======================= -->
<?php 
$examId=$_GET['examid'];
$studentId='50';//$_SESSION['userId'];
 $rightAns=0;
$wrongAns=0;
$unattAns=0;
 
$totalQuestion=0;
?>
<?php  
   $query=$con->query("SELECT  * FROM `question`  where examId=$examId"); 
     $dataarr=array();        
    while($roww=mysqli_fetch_array($query))
    {
     $dataarr[]= $roww;    
    } 
?>
<section id="cour-mid" class="sol">
    <div class="container">
 <div class="mok-button">
            <div class="mok-but-1">
                <a href="result.php?examid=<?php echo $examId; ?>">Result</a>
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
<!-- ========================our key ================================= -->
<section id="cour-mid" class="sol">
    <div class="container">        
         <div class="solu-titl"> 
             <h3>Solutions</h3>
         </div>
    </div>
</section>
<!-- =====================Courises=========================== -->


<!--====================Exams Covered================================== -->
<!--<section id="solu">-->
<!--  <div class="container">-->
<!--         <div class="sol-t2">-->
<!--            <h3>Choose Section :</h3>-->
<!--            <form>-->
<!--                <select>-->
<!--                    <option>History of Ancient India</option>-->
<!--                    <option>History of Ancient India 1</option>-->
<!--                    <option>History of Ancient India 2</option>-->
<!--                    <option>History of Ancient India 3</option>-->
<!--                    <option>History of Ancient India 4</option>-->
<!--                    <option>History of Ancient India 5</option>-->
<!--                    <option>History of Ancient India 7</option>-->
<!--                    <option>History of Ancient India 8</option>-->
<!--                </select>-->
<!--            </form>-->
<!--         </div>-->
<!--  </div>-->
<!--</section>-->
<!--=============our other ================================= -->

<section class="accord">
    <div class="container">
        <?php $i=1; foreach($dataarr as $val){?>
         <div class="acc-main">
               <div class="accordion">
                   <div class="ac-top ">
                       <h3>Q. <?php echo $i++; ?></h3>  
                   </div>
                   <div class="ac-down">
                    <p> <?php echo $val['questionlabel']; ?> ?</p>
                   </div>
               </div>

                 
                  <div class="panel-con">
                      <?php if($val['answer'] == 'A' || strtolower($val['answer']) == 'a'){ ?>
                      
                        <div class="opt-val"><span class="attm">A <?php echo $val['option1']; ?></span></div>
                        
                     <?php }else{?>
                        <div class="opt-val"><span>A <?php echo $val['option1']; ?></span></div>
                        
                     <?php } ?>
                     
                     <?php if($val['answer'] == 'B' || strtolower($val['answer']) == 'b'){ ?>
                        <div class="opt-val"><span class="attm">B <?php echo $val['option2']; ?></span></div>
                     <?php }else{?>
                        <div class="opt-val"><span>B <?php echo $val['option2']; ?></span></div>
                     <?php } ?>
                     
                     <?php if($val['answer'] == 'C' || strtolower($val['answer']) == 'c'){ ?>
                        <div class="opt-val"><span class="attm">C <?php echo $val['option3']; ?></span></div>
                     <?php }else{?>
                        <div class="opt-val"><span>C <?php echo $val['option3']; ?></span></div>
                     <?php } ?>
                     
                     <?php if($val['answer'] == 'D' || strtolower($val['answer']) == 'd'){ ?>
                        <div class="opt-val"><span class="attm">D <?php echo $val['option4']; ?></span></div>
                     <?php }else{?>
                       <div class="opt-val"><span>D <?php echo $val['option4']; ?></span></div>
                     <?php } ?>
                      
                     
                     <div class="expl">
                         <h4>Explanation</h4>
                         <ul><?php echo $val['explaination']?>
                      </ul>
                     </div>
                  
                </div> 
                 
         </div>
         <hr>
         <?php } ?>
    </div>
</section>

<!-- ======================================= -->
<style type="text/css">
    /* Style the buttons that are used to open and close the accordion panel */
.accord .accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.accord .active, .accord .accordion:hover {
  background-color: #ccc;
}

/* Style the accordion panel. Note: hidden by default */
.accord .panel {
  padding: 0 18px;
  background-color: white;
  display: none;
  overflow: hidden;
}
</style>
<script type="text/javascript">
    var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<!-- ======= Footer ======= -->
<?php include 'footer.php';?>