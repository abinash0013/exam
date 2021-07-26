<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $resultdata = $con->query("SELECT * from `tbl_faq` order by faqId desc");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    }
?>
<!-- ::::::::::::::::::::::::::::::::::::> Fetch Data End <:::::::::::::::::::::::::::::::::::: -->

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
							<h4>Faq</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Faq List</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary" href="add.php" role="button">
								Add Faq <i class="icon-copy ion-plus-round"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Export Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">List of Faq</h4>
				</div>
				<div class="pb-20">
					<table class="table hover data-table-export nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Sl. No.</th>
								<th>Question</th>
								<th>Answer</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <?php $i=0; ?>
                            <?php foreach($result as $value){ ?>
							    <tr>
						            <td><?php echo $i=$i+1?></td>
									<td class="table-plus"><?php echo $value['question']?></td>
									<td><?php echo $value['answer']?></td>
									<td>
                                        <div class="table-actions">
                                            <a href="edit.php?id=<?php echo $value['faqId']; ?> &Q=<?php echo $value['faqId']; ?>" data-color="#265ed7" style="color: rgb(38, 94, 215);"><i class="icon-copy dw dw-edit2"></i></a>
                                            <a data-toggle="modal" data-target="#exampleModalCenter<?php echo $value['faqId']?>" data-color="#e95959" style="color: rgb(233, 89, 89);"><i class="icon-copy dw dw-delete-3"></i></a>
                                        </div>
									</td>
							    </tr>
                                <div class="modal fade" id="exampleModalCenter<?php echo $value['faqId']?>">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5 class="modal-title text-center">Yes.. I want to Delete this.</h5>
                                                 <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button
                                            /div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger" onclick="deletefun(<?php echo $value['faqId'];?>)">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Export Datatable End -->
		</div>
	</div>
</div>
<?php include './../pages/footer.php'; ?>