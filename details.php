<?php
include 'inc/header.php';
?>
<?php
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
	echo "<script>window.location = '404.php'</script>";
} else {
	$id = $_GET['proid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$quantity = $_POST['quantity'];
	$AddtoCart = $ct->add_to_cart($quantity, $id);
}
?>
<div class="main">
	<div class="content">
		<div class="section group">
			<?php
			$get_product_details = $product->get_details($id);
			if ($get_product_details) {
				while ($result = $get_product_details->fetch_assoc()) {
			?>
					<div class="cont-desc span_1_of_2">
						<div class="grid images_3_of_2">
							<img src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
						</div>
						<div class="desc span_3_of_2">
							<h2><?php echo $result['productName'] ?></h2>
							<p><?php echo $fm->textShorten($result['product_desc'], 150) ?></p>
							<div class="price">
								<p>Price: <span><?php echo $result['price'] ?></span></p>
								<p>Category: <span><?php echo $result['catName'] ?></span></p>
								<p>Brand:<span><?php echo $result['brandName'] ?></span></p>
							</div>
							<div class="add-cart">
								<form action="" method="post">
									<input type="number" class="buyfield" name="quantity" value="1" min="1" />
									<input type="submit" class="buysubmit" name="submit" value="Buy Now" />

								</form>
								<?php
								if (isset($AddtoCart)) {
									echo '<span style="color: red; font-size:18px;">Product Already Added</span>';
								}
								?>
							</div>
						</div>
						<div class="product-desc">
							<h2>Product Details</h2>
							<p><?php echo $fm->textShorten($result['product_desc'], 150) ?></p>

						</div>
				<?php
				}
			}
				?>
					</div>
					<div class="rightsidebar span_3_of_1">
						<h2>CATEGORIES</h2>
						<?php
						$getCategory = $cat->get_Category();
						if ($getCategory) {
							while ($resultCat = $getCategory->fetch_assoc()) {

						?>
								<ul>
									<li><a href="productbycat.php?catId=<?php echo $resultCat['catId'] ?>"><?php echo $resultCat['catName'] ?></a></li>

								</ul>
						<?php
							}
						}
						?>
					</div>
		</div>
	</div>
</div>
<?php
include './inc/footer.php'
?>