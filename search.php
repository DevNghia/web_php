<?php
include 'inc/header.php';
?>
<?php
// if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
//     echo "<script>window.location = '404.php'</script>";
// } else {
//     $id = $_GET['catId'];
// }
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	$catName = $_POST['catName'];
// 	$updateCat = $cat->update_category($catName, $id);
// }
?>
<div class="main">
    <div class="content">

        <div class="content_top">
            <div class="heading">

                <h3>Tìm kiếm cho từ khóa : <?php echo $_GET['search'] ?></h3>

            </div>
            <div class="clear"></div>
        </div>

        <div class="section group">
            <?php
            $getsearch = $product->search_product();
            if ($getsearch) {
                while ($result = $getsearch->fetch_assoc()) {
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
                echo "<span class='error'> There was no search results! </span>";
            }
            ?>
        </div>



    </div>
</div>
</div>
<?php
include 'inc/footer.php';
?>