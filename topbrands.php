<?php
include 'inc/header.php';
include 'inc/slider.php';

?>

<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Iphone</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getTopApple = $product->getTopApple();
			if ($getTopApple) {
				while ($resultApple = $getTopApple->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $resultApple['productId'] ?>"><img src="admin/uploads/<?php echo $resultApple['image'] ?>" alt="" /></a>
						<h2><?php echo $resultApple['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($resultApple['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $fm->format_currency($resultApple['price']) . " " . "VND" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultApple['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			}
			?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Samsung</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getSamsung = $product->getTopSamsung();
			if ($getSamsung) {
				while ($resultSamsung = $getSamsung->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $resultSamsung['productId'] ?>"><img src="admin/uploads/<?php echo $resultSamsung['image'] ?>" alt="" /></a>
						<h2><?php echo $resultSamsung['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($resultSamsung['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $fm->format_currency($resultSamsung['price']) . " " . "VND" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultSamsung['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			}
			?>

		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Xiaomi</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getXiaomi = $product->getTopXiaomi();
			if ($getXiaomi) {
				while ($resultXiaomi = $getXiaomi->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $resultXiaomi['productId'] ?>"><img src="admin/uploads/<?php echo $resultXiaomi['image'] ?>" alt="" /></a>
						<h2><?php echo $resultXiaomi['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($resultXiaomi['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $fm->format_currency($resultXiaomi['price']) . " " . "VND" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultXiaomi['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			}
			?>

		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Oppo</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getOppo = $product->getTopOppo();
			if ($getOppo) {
				while ($resultOppo = $getOppo->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $resultOppo['productId'] ?>"><img src="admin/uploads/<?php echo $resultOppo['image'] ?>" alt="" /></a>
						<h2><?php echo $resultOppo['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($resultOppo['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $fm->format_currency($resultOppo['price']) . " " . "VND" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultOppo['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			}
			?>

		</div>
	</div>
</div>
<?php
include 'inc/footer.php';
?>