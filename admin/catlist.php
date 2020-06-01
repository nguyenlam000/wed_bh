<?php include "../classes/category.php" ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Category List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$category = new Category();
					$check_category = false;
					$result = $category->show_category();
					if ($result) {
						$i = 0;
						
						while ($result_row = $result->fetch_assoc()) {
						
					?>
							<?php
							
							if (isset($_GET['catId']) && $_GET['catId'] == $result_row['catId']) {
								$check_category = $category->delete_category($_GET['catId']);
							continue;
							}
							$i++;
							?>
							
							<tr class="old gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result_row['catName'] ?></td>
								<td><a onclick ="return confirm('Do you want to delete category')" href="catlist.php?catId=<?php echo $result_row['catId']?>">Delete</a>||<a href="catedit.php?catId=<?php echo $result_row['catId'];?>&catName=<?php echo $result_row['catName']?>">Edit</a></td>
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