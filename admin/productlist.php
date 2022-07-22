<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/product.php' ?>
<?php include_once '../helpers/format.php' ?>
<?php
$product = new product();
$fm = new Format();
if (isset($_GET['delid'])) {
	$id = $_GET['delid'];
	$delproduct = $product->del_product($id);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Post List</h2>
		<div class="block">
			<?php
			if (isset($delproduct)) {
				echo $delproduct;
			}
			?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>ID</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Product Image</th>
						<th>Category</th>
						<th>Brand</th>
						<th>Description</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php

					$pdlist = $product->show_product();
					if ($pdlist) {
						$i = 0;
						while ($result = $pdlist->fetch_assoc()) {
							$i++;
					?>
							<tr class="odd gradeX">
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><?php echo $result['price'] ?></td>
								<td><img src="uploads/<?php echo $result['image'] ?>" width="60"></td>
								<td><?php echo $result['catId'] ?></td>
								<td><?php echo $result['brandId'] ?></td>
								<td><?php echo $fm->textShorten($result['product_desc'], 50) ?></td>

								<td><?php
									if ($result['type'] == 1) {
										echo 'Feathered';
									} else {
										echo 'Non-Feathered';
									}
									?></td>
								<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit</> || <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['productId'] ?>">Delete</a></td>
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