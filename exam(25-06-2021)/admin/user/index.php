<?php include './../pages/header.php'; ?>

<?php include './../pages/sidebar.php'; ?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
    $resultdata = $con->query("SELECT * from `tbl_users` order by userId desc");
    $result = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row;
    }
?>
<!-- ::::::::::::::::::::::::::::::::::::> Fetch Data End <:::::::::::::::::::::::::::::::::::: -->

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>User</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">User List</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<!--<div class="dropdown">-->
						<!--	<a class="btn btn-primary" href="add.php" role="button">-->
						<!--		Add User <i class="icon-copy ion-plus-round"></i>-->
						<!--	</a>-->
						<!--</div>-->
					</div>
				</div>
			</div>
			<!-- Export Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">List of User</h4>
				</div>
				<div class="pb-20">
					<table class="table hover data-table-export nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Sl. No.</th>
								<th>User Name</th>
								<!--<th>User Name Hi</th>-->
								<th>Email</th>
								<th>Phone</th>
								<th>DOB</th>
								<th>Gender</th>
								<!--<th>Image</th>-->
								<!--<th>Action</th>-->
							</tr>
						</thead>
						<tbody>
                            <?php $i=0; ?>
                            <?php foreach($result as $value){ ?>
							    <tr>
						            <td><?php echo $i=$i+1?></td>
									<td class="table-plus"><?php echo $value['userName']?></td>
									<!--<td><?php echo $value['userNameHi']?></td>-->
									<td><?php echo $value['userEmail']?></td>
									<td><?php echo $value['userPhone']?></td>
									<td><?php echo $value['userDob']?></td>
									<td><?php echo $value['userGender']?></td>
									<!--<td><img src="<?php echo $value['userImage']?>" style="hight:60px; width:60px; "></td>-->
									<!--<td>-->
         <!--                               <div class="table-actions">-->
         <!--                                   <a href="edit.php?id=<?php echo $value['userId']; ?> &Q=<?php echo $value['userId']?>" data-color="#265ed7" style="color: rgb(38, 94, 215);"><i class="icon-copy dw dw-edit2"></i></a>-->
         <!--                                   <a id="sa-params" data-color="#e95959" style="color: rgb(233, 89, 89);"><i class="icon-copy dw dw-delete-3"></i></a>-->
         <!--                               </div>-->
									<!--</td>-->
							    </tr>
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