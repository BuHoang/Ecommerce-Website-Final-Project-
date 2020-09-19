<?php
	$active='Home';  
	include("includes/header.php");
?>
	</div>
	<div class="container" id="slider">
		<div class="col-md-12">
			<div class="carousel slide" id="myCarousel" data-ride="carousel">
				<ol class="carousel-indicators">
					<li class="active" data-target="#myCarousel" data-slide-to="0"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner">
					<?php  
						$get_slider = "select * from slider LIMIT 0,1";
						$run_slider = mysqli_query($con, $get_slider);
						while ($row_slider = mysqli_fetch_array($run_slider)) {
							$slide_name = $row_slider['slide_name'];
							$slide_image = $row_slider['slide_image'];
							echo "
								<div class = 'item active'>
									<img src = 'admin_panel/slides_images/$slide_image'>
								</div>
							";
						}
						$get_slider = "select * from slider LIMIT 1,3";
						$run_slider = mysqli_query($con, $get_slider);
						while ($row_slider = mysqli_fetch_array($run_slider)) {
							$slide_name = $row_slider['slide_name'];
							$slide_image = $row_slider['slide_image'];
							echo "
								<div class = 'item'>
									<img src = 'admin_panel/slides_images/$slide_image'>
								</div>
							";
						}
					?>
				</div>
				<a href="#myCarousel" class="left carousel-control" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a href="#myCarousel" class="right carousel-control" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<div id="advantages">
		<div class="container">
			<div class="same-height-row">
				<div class="col-sm-4">
					<div class="box same-height">
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h3><a href="contact.php">Best service</a></h3>
						<p>We know how to provide the best service to our customers and there is support service when customers have problems</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="box same-height">
						<div class="icon">
							<i class="fa fa-tag"></i>
						</div>
						<h3><a href="shop.php">Suitable price</a></h3>
						<p>All our clothing products are priced in line with the market and the price is not too expensive for customers</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="box same-height">
						<div class="icon">
							<i class="fa fa-product-hunt"></i>
						</div>
						<h3><a href="shop.php">Reliable product</a></h3>
						<p>100% of our clothing products are imported from highly reliable countries such as the US, Japan, and Korea.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="hot">
		<div class="box">
			<div class="container">
				<div class="col-md-12">
					<h2>Newest Clothes Products</h2>
				</div>
			</div>
		</div>
	</div>
	<div id="content" class="container">
		<div class="row">
			<?php  
				getPro();
			?>
		</div>
	</div>
	<?php
		include("includes/footer.php");
	?>
	<script src="js/bootstrap-337.min.js"></script>
</body>
</html>