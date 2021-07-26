<?php include 'header.php';?>
<!--===================== End Header ===================-->
<style>
/*.accordion {*/
/*  background-color: #eee;*/
/*  color: #444;*/
/*  cursor: pointer;*/
/*  padding: 18px;*/
/*  width: 100%;*/
/*  border: none;*/
/*  text-align: left;*/
/*  outline: none;*/
/*  font-size: 15px;*/
/*  transition: 0.4s;*/
/*}*/

/*.active, .accordion:hover {*/
/*  background-color: #ccc; */
/*}*/

/*.panel {*/
/*  padding: 0 18px;*/
/*  display: none;*/
/*  background-color: white;*/
/*  overflow: hidden;*/
/*}*/
</style>


<?php
     $resultdata =$con->query("SELECT * FROM `tbl_faq` order by faqId desc" );
     $result=array();
     while($row=mysqli_fetch_array($resultdata))
    {
       $result[]= $row;
    }
?> 
        
<!-- ==================broadcom=============================== -->
<section id="broadcom">
    <div class="container">
        <div class="broad-main">
            <!--<a href="#" class="brod-cat">Cabana Capitals</a><span>/</span>-->
            <!--<a href="#" class="broad-link">Contact Us</a>-->
        </div>
    </div>
</section>
<!-- ======= banner ======= -->
<section id="banner">
    <div class="container">
        <div class="banner-main" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000">
            <h3>FAQ's</h3>
            <!--<p>Cabana Capital - Frequently Asked Questions.</p>-->
        </div>
    </div>
</section>

<section>
    <?php foreach($result as $value){ ?>
        <button class="accordion"><?php echo $value['question'] ?></button>
        <div class="panel">
            <p><?php echo $value['answer'] ?></p>
        </div>
    <?php } ?>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

</section>
 
<!-- End banner -->

<!-- =========================================-->
  <section id="faq-capital">
    <div class="container">
        
         
         
    </div>
</section>
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

    
<!-- =========================================-->

<?php include 'footer.php';?>
