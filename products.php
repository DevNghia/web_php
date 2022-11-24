<?php
include 'inc/header.php';
include 'inc/slider.php';

?>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Apple</h3>
			</div>
			<div class="clear"></div>
		</div>

		<div class="section group">
			<?php
			$getApple = $product->getApple();
			if ($getApple) {
				while ($resultApple = $getApple->fetch_assoc()) {


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
		<div class="content_top">
			<div class="heading">
				<h3>Latest from Samsung</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getSamsung = $product->getSamsung();
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
				<h3>Latest from Xiaomi</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getXiaomi = $product->getXiaomi();
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
				<h3>Latest from Oppo</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getOppo = $product->getOppo();
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
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Vivo</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getVivo = $product->getVivo();
			if ($getVivo) {
				while ($resultVivo = $getVivo->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $resultVivo['productId'] ?>"><img src="admin/uploads/<?php echo $resultVivo['image'] ?>" alt="" /></a>
						<h2><?php echo $resultVivo['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($resultVivo['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $fm->format_currency($resultVivo['price']) . " " . "VND" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultVivo['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			}
			?>

		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Lenovo</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getLenovo = $product->getLenovo();
			if ($getLenovo) {
				while ($resultLenovo = $getLenovo->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $resultLenovo['productId'] ?>"><img src="admin/uploads/<?php echo $resultLenovo['image'] ?>" alt="" /></a>
						<h2><?php echo $resultLenovo['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($resultLenovo['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $fm->format_currency($resultLenovo['price']) . " " . "VND" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultLenovo['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			}
			?>

		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Acer</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getAcer = $product->getAcer();
			if ($getAcer) {
				while ($resultAcer = $getAcer->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $resultAcer['productId'] ?>"><img src="admin/uploads/<?php echo $resultAcer['image'] ?>" alt="" /></a>
						<h2><?php echo $resultAcer['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($resultAcer['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $fm->format_currency($resultAcer['price']) . " " . "VND" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultAcer['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			}
			?>

		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Dell</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getDell = $product->getDell();
			if ($getDell) {
				while ($resultDell = $getDell->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $resultDell['productId'] ?>"><img src="admin/uploads/<?php echo $resultDell['image'] ?>" alt="" /></a>
						<h2><?php echo $resultDell['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($resultDell['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $fm->format_currency($resultDell['price']) . " " . "VND" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultDell['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			}
			?>

		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Asus</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getAsus = $product->getAsus();
			if ($getAsus) {
				while ($resultAsus = $getAsus->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $resultAsus['productId'] ?>"><img src="admin/uploads/<?php echo $resultAsus['image'] ?>" alt="" /></a>
						<h2><?php echo $resultAsus['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($resultAsus['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $fm->format_currency($resultAsus['price']) . " " . "VND" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultAsus['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			}
			?>

		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from HP</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getHP = $product->getHP();
			if ($getHP) {
				while ($resultHP = $getHP->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $resultHP['productId'] ?>"><img src="admin/uploads/<?php echo $resultHP['image'] ?>" alt="" /></a>
						<h2><?php echo $resultHP['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($resultHP['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $fm->format_currency($resultHP['price']) . " " . "VND" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultHP['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			}
			?>

		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from MSI</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getMSI = $product->getMSI();
			if ($getMSI) {
				while ($resultMSI = $getMSI->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $resultMSI['productId'] ?>"><img src="admin/uploads/<?php echo $resultMSI['image'] ?>" alt="" /></a>
						<h2><?php echo $resultMSI['productName'] ?> </h2>
						<p><?php echo $fm->textShorten($resultMSI['product_desc'], 150) ?></p>
						<p><span class="price"><?php echo $fm->format_currency($resultMSI['price']) . " " . "VND" ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultMSI['productId'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			} else {
				echo "<span>Products Not Avaiable</span>";
			}
			?>

		</div>
	</div>
</div>
<?php
include 'inc/footer.php';
?>