<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/product.php' ?>
<?php include_once '../helpers/format.php' ?>
<?php
$product = new product();
$fm = new Format();
if (isset($_GET['delid'])) {
	$id = $_GET['delid'];
	// $delslide = $product->del_slider($id);
}
if (isset($_GET['sliderid'])) {
	$id = $_GET['sliderid'];
	$slider_update = $product->slider_update($id);
}
if (isset($_GET['slideredid'])) {
	$id = $_GET['slideredid'];
	$slider_update = $product->slidered_update($id);
}
if (isset($_GET['delslider'])) {
	$id = $_GET['delslider'];
	$del_slider = $product->del_slider($id);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Slider List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>No.</th>
						<th>Slider Title</th>
						<th>Slider Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$sliderlist = $product->show_slider();
					if ($sliderlist) {
						$i = 0;
						while ($result = $sliderlist->fetch_assoc()) {
							$i++;
					?>
							<tr class="odd gradeX">
								<td><?php echo $i ?></td>
								<td><img src="uploads/<?php echo $result['slider_image'] ?>" width="200"></td>
								<td><?php
									if ($result['type'] == 1) {
									?>
										<a href="?sliderid=<?php echo $result['sliderId'] ?>">On</a>
									<?php
									} elseif ($result['type'] == 0) {
									?>
										<a href="?slideredid=<?php echo $result['sliderId'] ?>">Off</a>
									<?php
									}
									?>
								<td>
									<a onclick="return confirm('Are you sure to Delete!');" href="?delslider=<?php echo $result['sliderId'] ?>">Delete</a>
								</td>
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