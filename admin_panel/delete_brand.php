<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<?php  
	if (isset($_GET['delete_brand'])) {
		$delete_brand_id = $_GET['delete_brand'];
		$delete_brand = "delete from brands where brand_id = '$delete_brand_id'";
		$run_delete = mysqli_query($con, $delete_brand);
		if ($run_delete) {
			echo "<script>alert('Brand has been deleted successfully')</script>";
			echo "<script>window.open('index.php?view_brands', '_self')</script>";
		}
	}
?>

<?php  
	}
?>