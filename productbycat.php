<?php
include 'inc/header.php';
?>
<?php
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
	echo "<script>window.location = '404.php'</script>";
} else {
	$id = $_GET['catId'];
}
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	$catName = $_POST['catName'];
// 	$updateCat = $cat->update_category($catName, $id);
// }
?>
<div class="main">
	<div class="content">
		<?php
		$getcatName = $cat->get_name_by_cat($id);
		if ($getcatName) {
			while ($resultcatName = $getcatName->fetch_assoc()) {

		?>
				<div class="content_top">
					<div class="heading">

						<h3>Category : <?php echo $resultcatName['catName'] ?></h3>

					</div>
					<div class="clear"></div>
				</div>
		<?php
			}
		}
		?>
		<div class="section group">
			<?php
			$getproduct = $cat->get_product_by_cat($id);
			if ($getproduct) {
				while ($result = $getproduct->fetch_assoc()) {
			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
						<h2><?php echo $result['productName'] ?></h2>
						<p><?php echo $fm->textShorten($result['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $result['price'] ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			} else {
				echo 'Category Not Avaiable';
			}
			?>
		</div>



	</div>
</div>
</div>
<?php
include 'inc/footer.php';
?>