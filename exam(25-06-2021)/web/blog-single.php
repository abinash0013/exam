<?php include 'header.php'; ?>

<?php include 'nav.php'; ?>

<!-- ::::::::::::::::::::::::: single fetch start ::::::::::::::::::::::::: -->
<?php
    $blogId=$_GET['id'];
    $resultdata =$con->query("select * from `tbl_blog` WHERE blogId = $blogId");
    $result=array();
    while($row=mysqli_fetch_array($resultdata))
    {
       $result[]= $row;
    }
?> 
<!-- :::::::::::::::::::::::: single fetch finish :::::::::::::::::::::::: -->

<!-- :::::::::::::::::::::::: all fetch start :::::::::::::::::::::::: -->
<?php
    $allresultdata =$con->query("select * from `tbl_blog`");
    $allresult=array();
    while($allrow=mysqli_fetch_array($allresultdata))
    {
       $allresult[]= $allrow;
    }
?> 
<!-- :::::::::::::::::::::::: all fetch finish :::::::::::::::::::::::: -->
<section id="blog-banner">
    <div class="blog-si-img">
        <?php foreach($result as $value){?>
        <img src="<?php echo $value['image'] ?>"/>
        <?php } ?>
    </div>
</section>
   

<section id="blog-sec">
    
    <div class="container">
        <div class="blog-sec-main">
            <?php foreach($result as $value){?>
                <div class="blog-sign-l">
                    <div class="blog-sign-l-con">
                        <div class="blog-tile"><h2><?php echo $value['title'] ?></h2></div>
                        <div class="blog-post-date">
                            <h4><span>Date : </span><?php echo $value['createdAt'] ?></h4>
                        </div>
                        <div class="blog-dec">
                            <p><?php echo $value['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="blog-sign-r">
                <div class="blog-sign-r-con">
                    <div class="blog-cat">
                        <h3>Recent Blogs</h3>
                        <?php foreach($allresult as $value2){?>
                            <a href="blog-single.php?id=<?php echo $value2['blogId']; ?>&Q=<?php echo $value2['blogId']; ?>"><?php echo $value2['title'] ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
            
            <div class="blog-sig-t">
                <h2>Related Blogs</h2>
            </div>
            
            <?php foreach($allresult as $value3){?>
            <div class="blog-1">
                <div class="blog-1-con">
                    <div class="blog-img">
                        <img src="<?php echo $value3['image'] ?>"></a>
                    </div>
                    <div class="blog-title">
                        <a href="blog-single.php?id=<?php echo $value3['blogId']; ?> &Q=<?php echo $value3['blogId']; ?>"><h3><?php echo $value3['title'] ?></h3></a>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div style="clear:both"></div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>