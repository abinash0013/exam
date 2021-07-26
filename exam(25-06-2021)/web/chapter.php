<?php include 'header.php';?>
<?php 

 $courseId=$_GET['courseId'];
    $subjectId=$_GET['subjectId'];
 
    $subjectResultData=$con->query("select * from `tbl_chapter` where  subjectId=$subjectId");
    $subjectResultDataArr=array();
    while($subjectRow=mysqli_fetch_array($subjectResultData))
    {
        $subjectResultDataArr[]=$subjectRow;
    }

 
 
 

 
?>
<!--===================== End Header ===================-->
<section id="course-sg" style="background-image: url(assets/img/bank-po.jpg);" class="back-bg">
   
</section>
<?php foreach($courseResultDataArr as $courseData){ ?>


<section id="course-main">
  <div class="container">
       <div class="row">
           <?php foreach($subjectResultDataArr as $data){ ?>
           <div class="col-lg-4 col-md-4 col-sm-12 ">
              <div class="course-con1">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 cours-ttle">
                        <a href="course-main.php?name=<?php echo $data['chapterName'];?>&&subjectId=<?php echo $data['subjectId'];?>&&chapterId=<?php echo $data['chapterId'];?>">  <h3><?php echo $data['chapterName']; ?></h3></a>
                      </div>
                      
                  </div>
              </div>
           </div>
           <?php } ?>
           

       </div>
  </div>
</section>

<!--====================Exams Covered================================== 

=============our other ================================= 


<?php } ?>
<!-- ======= Footer ======= -->
<?php include 'footer.php';?>