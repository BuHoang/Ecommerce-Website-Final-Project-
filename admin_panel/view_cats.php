<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / View Categories</li>
			<input type="text" name="search" id="user_query" placeholder="Search category" style="float: right;">
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-eye"></i> View Categories</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Category ID</th>
								<th>Category Title</th>
								<th>Category Description</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$i=0;
								$get_cats = "select * from categories";
								$run_cats = mysqli_query($con, $get_cats);
								while ($row_cats=mysqli_fetch_array($run_cats)) {
									$cat_id = $row_cats['cat_id'];
									$cat_title = $row_cats['cat_title'];
									$cat_desc = $row_cats['cat_desc'];
									$i++;
								
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $cat_title; ?></td>
								<td width="300"><?php echo $cat_desc; ?></td>
								<td>
									<button class="btn btn-success">
										<a href="index.php?edit_cat=<?php echo $cat_id; ?>"><i class="fa fa-pencil"></i> Edit</a>
									</button>
								</td>
								<td>
									<button class="btn btn-danger">
										<a href="index.php?delete_cat=<?php echo $cat_id; ?>"><i class="fa fa-trash"></i> Delete</a>
									</button>
								</td>
							</tr>
							<?php  
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php  
	}
?>