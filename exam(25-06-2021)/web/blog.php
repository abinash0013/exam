<?php include 'header.php'; ?>

<?php include 'nav.php'; ?>

<section id="blog-banner">
    <div class="blog-sec" style="background-image: url(images/banner3.jpg);">
        <h2>Blog</h2>
        <div class="blog-overlay"></div>
    </div>
</section>

<!-- Blog Fetch Script Start -->
<?php
    $resultdata21 =$con->query("select * from `tbl_blog` order by blogId desc" );
    $result21=array();
    while($row21=mysqli_fetch_array($resultdata21))
    {
       $result21[]= $row21;
    }
?> 
<!-- Blog Fetch Script Finish -->

<section id="blog-sec">
    <div class="container">
        <div class="blog-sec-main">
            <?php foreach($result21 as $value){?>
                <a href="blog-single.php?id=<?php echo $value['blogId']; ?>&Q=<?php echo $value['blogId']; ?>">
                    <div class="blog-1">
                        <div class="blog-1-con">
                            <div class="blog-img">
                                <img src="<?php echo $value['image'] ?>"></a>
                            </div>
                            <div class="blog-title">
                                <a href="blog-single.php?id=<?php echo $value['blogId']; ?>&Q=<?php echo $value['blogId']; ?>"><h3><?php echo $value['title'] ?></h3></a>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
            <div style="clear:both"></div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>