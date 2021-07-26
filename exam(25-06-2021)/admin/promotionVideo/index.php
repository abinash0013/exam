<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    // $resultdata = $con->query("SELECT tbl_videos.*, 
    //     tbl_chapter.chapterName as chname, tbl_chapter.chapterNameHi as chnamehi, 
    //     tbl_subject.subjectName as sname, tbl_subject.subjectNameHi as snamehi, 
    //     tbl_course.courseName as cname, tbl_course.courseNameHi as cnamehi 
    //     FROM tbl_videos LEFT JOIN tbl_chapter on tbl_videos.chapterId = tbl_chapter.chapterId 
    //     LEFT JOIN tbl_subject on tbl_subject.subjectId = tbl_videos.subjectId
    //     LEFT JOIN tbl_course on tbl_course.courseid = tbl_videos.courseId order by videoId DESC
    // ");
    $resultdata = $con->query("SELECT * FROM `tbl_videos` where videoType='promotion' order by videoId DESC");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    }
?>
<!-- ::::::::::::::::::::::::::::::::::::> Fetch Data End <:::::::::::::::::::::::::::::::::::: -->

<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table Start <::::::::::::::::::::::::::::::::::::::  -->
<?php
     $resultdataCourse =$con->query("select * from `tbl_course` order by courseName ASC" );
     $resultCourse=array();
     while($rowCourse=mysqli_fetch_array($resultdataCourse))
    {
       $resultCourse[]= $rowCourse;
    }
?> 
<!-- ::::::::::::::::::::::::::::::::::::::> Fetch Details of course table End <::::::::::::::::::::::::::::::::::::::  -->

<!-- ::::::::::::::::::::::::::::::::::::> Delete Data start <:::::::::::::::::::::::::::::::::::: -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function deletefun(param1){  
        $.ajax({
            url: "./api/delete-api.php",
            type: "POST",
            dataType:"JSON",
            data: "id=" + param1,
            success: function(data)
            {
                //  alert(data.status);
                if(data.status == '200')
                {
                    location.reload(true);
                }
                else
                { 
                    // swal('Oops...', 'Something went wrong with ajax !', 'error');
                    alert(data.message);
                }
            },
                 
        });
    }
</script>
<!-- ::::::::::::::::::::::::::::::::::::> Delete Data end <:::::::::::::::::::::::::::::::::::: -->
    
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Promotion Video</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Promotion Video List</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary" href="add.php" role="button">
								Add Promotion Video <i class="icon-copy ion-plus-round"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Export Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">List of Promotion Video</h4>
				</div>
				<div class="pb-20">
					<table class="table hover data-table-export nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Sl. No.</th>
								<th>Video Title</th>
								<th>Video Title in Hindi</th>
								<th>Video Description</th>
								<th>Video Description in Hindi</th>
								<th>Video Url</th>
								<th>Video Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <?php $i=0; ?>
                            <?php foreach($result as $value){ ?>
							    <tr>
						            <td><?php echo $i=$i+1?></td>
									<td class="table-plus"><?php echo $value['videoTitle']?></td>
									<td><?php echo $value['videoTitleHi']?></td>
									<td><?php echo $value['videoDescription']?></td>
									<td><?php echo $value['videoDescriptionHi']?></td>
									<td><?php echo $value['videoUrl']?></td>
									<td><img src="<?php echo $value['videoImage']?>" style="height:50px; widht:60px;"></td>
									<td>
                                        <div class="table-actions">
                                            <a href="edit.php?id=<?php echo $value['videoId']; ?> &Q=<?php echo $value['videoId']; ?>" data-color="#265ed7" style="color: rgb(38, 94, 215);"><i class="icon-copy dw dw-edit2"></i></a>
                                            <a data-toggle="modal" data-target="#exampleModalCenter<?php echo $value['videoId']?>" data-color="#e95959" style="color: rgb(233, 89, 89);"><i class="icon-copy dw dw-delete-3"></i></a>
                                        </div>
									</td>
							    </tr>
                                <div class="modal fade" id="exampleModalCenter<?php echo $value['videoId']?>">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5 class="modal-title text-center">Yes.. I want to Delete this.</h5>
                                                 <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button
                                            /div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger" onclick="deletefun(<?php echo $value['videoId'];?>)">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
						</tbody>
					</table>
				</div>
				</div>
			</div>
			<!-- Export Datatable End -->
		</div>
	</div>
</div>
<?php include './../pages/footer.php'; ?>