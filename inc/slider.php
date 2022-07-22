<div class="header_bottom">
	<div class="header_bottom_left">
		<div class="section group">

			<?php
			$getLastestSamsung = $product->getLastestSamsung();
			if ($getLastestSamsung) {
				while ($resultSamsung = $getLastestSamsung->fetch_assoc()) {


			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="details.php?proid=<?php echo $resultSamsung['productId'] ?>"> <img src="admin/uploads/<?php echo $resultSamsung['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2><?php echo $resultSamsung['productName'] ?></h2>
							<p><?php echo $resultSamsung['product_desc'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultSamsung['productId'] ?>">Add to cart</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
			<?php
			$getLastestXiaomi = $product->getLastestXiaomi();
			if ($getLastestXiaomi) {
				while ($resultXiaomi = $getLastestXiaomi->fetch_assoc()) {


			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="details.php?proid=<?php echo $resultXiaomi['productId'] ?>"> <img src="admin/uploads/<?php echo $resultXiaomi['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2><?php echo $resultXiaomi['productName'] ?></h2>
							<p><?php echo $resultXiaomi['product_desc'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultXiaomi['productId'] ?>">Add to cart</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
		<div class="section group">
			<?php
			$getLastestOppo = $product->getLastestOppo();
			if ($getLastestOppo) {
				while ($resultOppo = $getLastestOppo->fetch_assoc()) {


			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="details.php?proid=<?php echo $resultOppo['productId'] ?>"> <img src="admin/uploads/<?php echo $resultOppo['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2><?php echo $resultOppo['productName'] ?></h2>
							<p><?php echo $resultOppo['product_desc'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultOppo['productId'] ?>">Add to cart</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
			<?php
			$getLastestApple = $product->getLastestApple();
			if ($getLastestApple) {
				while ($resultApple = $getLastestApple->fetch_assoc()) {


			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="details.php?proid=<?php echo $resultApple['productId'] ?>"> <img src="admin/uploads/<?php echo $resultApple['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2><?php echo $resultApple['productName'] ?></h2>
							<p><?php echo $resultApple['product_desc'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultApple['productId'] ?>">Add to cart</a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="header_bottom_right_images">
		<!-- FlexSlider -->

		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					<li><img src="images/1.jpg" alt="" /></li>
					<li><img src="images/2.jpg" alt="" /></li>
					<li><img src="images/3.jpg" alt="" /></li>
					<li><img src="images/4.jpg" alt="" /></li>
				</ul>
			</div>
		</section>
		<!-- FlexSlider -->
	</div>
	<div class="clear"></div>
</div>