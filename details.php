<?php
include 'inc/header.php';
?>
<?php
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
	echo "<script>window.location = '404.php'</script>";
} else {
	$id = $_GET['proid'];
}
$customer_id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
	$productid = $_POST['productid'];
	$insertCompare = $product->insertCompare($productid, $customer_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {
	$productid = $_POST['productid'];
	$insertWishlist = $product->insertWishlist($productid, $customer_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$quantity = $_POST['quantity'];
	$insertCart = $ct->add_to_cart($quantity, $id);
}
if (isset($_POST['binhluan_submit'])) {
	$binhluan_insert = $cs->insert_binhluan();
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
								<p>Price: <span><?php echo $fm->format_currency($result['price']) . " " . "VND" ?></span></p>
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
							<div class="add-cart">
								<form action="" method="POST">
									<!-- <a href="?wlist=<?php echo $result['productId'] ?>" class="buysubmit">Save to WishList</a> -->
									<!-- <a href="?compare=<?php echo $result['productId'] ?>" class="buysubmit">Compare Product</a> -->
									<input type="hidden" name="productid" value="<?php echo $result['productId'] ?>" />
									<?php
									$login_check = Session::get('customer_login');
									if ($login_check == false) {
										echo '';
									} else {
										echo '<input type="submit" class="buysubmit" name="compare" value="Compare Product" />';
									}
									?>

									<?php
									if (isset($insertCompare)) {
										echo $insertCompare;
									}
									?>
								</form>
							</div>
							<div class="add-cart">
								<div class="button_details">
									<form action="" method="POST">
										<!-- <a href="?wlist=<?php echo $result['productId'] ?>" class="buysubmit">Save to WishList</a> -->
										<!-- <a href="?compare=<?php echo $result['productId'] ?>" class="buysubmit">Compare Product</a> -->
										<input type="hidden" name="productid" value="<?php echo $result['productId'] ?>" />
										<?php
										$login_check = Session::get('customer_login');
										if ($login_check == false) {
											echo '';
										} else {
											echo '<input type="submit" class="buysubmit" name="wishlist" value="Save to WishList" />';
										}
										?>

										<?php
										if (isset($insertWishlist)) {
											echo $insertWishlist;
										}
										?>
									</form>
								</div>
								<div class="clear"></div>
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
	<div class="binhluan">
		<div class="row">
			<div class="col-md-8">
				<h5>Ý kiến sản phẩm</h5>
				<?php
				if (isset($binhluan_insert)) {
					echo $binhluan_insert;
				}
				?>
				<form action="" method="POST">
					<p><input type="hidden" value="<?php echo $id ?>" name="product_id_binhluan"></p>
					<input placeholder="Điền tên" type="text" class="form-control" name="tennguoibinhluan"><br>
					<textarea rows="5" placeholder="Bình luận..." class="form-control" name="binhluan"></textarea>
					<p><input type="submit" name="binhluan_submit" class="btn btn-success " value="Gửi bình luận"></p>
				</form>
			</div>
		</div>
		</textarea>
	</div>
</div>
<?php
include './inc/footer.php'
?>