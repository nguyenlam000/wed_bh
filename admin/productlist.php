<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php include_once '../classes/product.php'?>
<?php include_once '../classes/category.php'?>
<?php include_once '../classes/brand.php' ?>
<?php include_once '../helpers/format.php' ?>
<?php 
	$product =  new Product();
	if(isset($_GET["productId"])){
		
		$product->delete_product($_GET["productId"]);
	}
	$result  = $product->show_product();

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Serial No.</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Type Product</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if($result){
						$i = 0;
						while($result_row = $result->fetch_assoc()){
							$i++;
							$category = new Category();
							$brand = new Brand();
							$format = new Format();
							$result_brand = $brand->getBrand($result_row['brandId']);
							$result_cat = $category->getCategory($result_row['catId']);
							$desc = trim($result_row['product_desc'],"&lt;p&gt;/");
							$desc = $format->textShorten($desc, 2);
							?>
								<tr class="odd gradeX">
									<td><?php echo $i?></td>
									<td><?php echo $result_row['productName']?></td>
									<td><?php echo $result_cat?></td>
									<td><?php echo $result_brand?></td>
									<td><?php echo $desc?></td>
									<td><?php echo $result_row['type_product']?></td>
									<td><a onclick="return confirm('Do you want delete product')" href="productlist.php?productId=<?php echo $result_row['productId']?>">Delete</a>||<a href="productedit.php?productId=<?php echo $result_row['productId']?>&productName=<?php echo $result_row['productName']?>&catName=<?php echo $result_cat?>&brandName=<?php echo $result_brand?>&desc=<?php echo $desc?>&product_type=<?php echo $result_row['type_product']?>&price=<?php echo $result_row['price']?>">Edit</a></td>
								</tr>
							<?php
						}
					}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
