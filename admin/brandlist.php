<?php include "../classes/brand.php" ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>brand List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Brand Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$brand = new Brand();
					$check_brand = false;
					$result = $brand->show_brand();
					if ($result) {
						$i = 0;
						
						while ($result_row = $result->fetch_assoc()) {
							
					?>
							<?php
							
							if (isset($_GET['brandId']) && $_GET['brandId'] == $result_row['brandId']) {
								$check_brand = $brand->delete_brand($_GET['brandId']);
							continue;
                            }
                            $i++;
							?>
						
							<tr class="old gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result_row['brandName'] ?></td>
								<td><a onclick ="return confirm('Do you want to delete brand')" href="brandlist.php?brandId=<?php echo $result_row['brandId']?>">Delete</a>||<a href="brandedit.php?brandId=<?php echo $result_row['brandId'];?>&brandName=<?php echo $result_row['brandName']?>">Edit</a></td>
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
	$(document).ready(function() {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php'; ?>