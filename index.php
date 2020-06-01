<?php 
	include realpath("inc/header.php");
	include realpath("inc/slider.php");
?>
<?php 
	$product = new Product();
	$result_product = $product->show_product_feature();
?>	

		<div class="main">
			<div class="content">
				<div class="content_top">
					<div class="heading">
						<h3>Feature Products</h3>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section group">
					
					<?php 
						if($result_product != false){
							while($result_product_row = $result_product->fetch_assoc()){
								
								?>
										<div class="grid_1_of_4 images_1_of_4">
						                    <a href="preview.php"><img src="<?php echo 'admin/upload/'.$result_product_row['image_product']?>" alt="" /></a>
						                    <h2><?php echo $result_product_row['productName']?> </h2>
						                    <p><?php echo $result_product_row['product_desc']?></p>
						                    <p><span class="price"><?php echo $result_product_row['price']?></span></p>
						                    <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
					                    </div>
								<?php
							}
						}
					?>
					<!-- <div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/feature-pic1.png" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
						<p><span class="price">$505.22</span></p>
						<div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/feature-pic2.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
						<p><span class="price">$620.87</span></p>
						<div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/feature-pic3.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
						<p><span class="price">$220.97</span></p>
						<div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<img src="images/feature-pic4.png" alt="" />
						<h2>Lorem Ipsum is simply </h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
						<p><span class="price">$415.54</span></p>
						<div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
					</div> -->
				</div>
				<div class="content_bottom">
					<div class="heading">
						<h3>New Products</h3>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section group">
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/new-pic1.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<p><span class="price">$403.66</span></p>
						<div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/new-pic2.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<p><span class="price">$621.75</span></p>
						<div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/feature-pic2.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<p><span class="price">$428.02</span></p>
						<div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<img src="images/new-pic3.jpg" alt="" />
						<h2>Lorem Ipsum is simply </h2>
						<p><span class="price">$457.88</span></p>

						<div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	include "inc/footer.php";
?>

	