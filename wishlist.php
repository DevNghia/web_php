<?php
include 'inc/header.php';


?>
<?php
if (isset($_GET['wishlistId'])) {
    $customer_id = Session::get('customer_id');
    $wishlistId = $_GET['wishlistId'];
    $del_wishlist = $ct->del_wishlist($wishlistId, $customer_id);
}
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//     $cartId = $_POST['cartId'];
//     $quantity = $_POST['quantity'];
//     $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
// }
?>
<?php
if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Your Wishlist</h2>

                <table class="tblone">
                    <tr>
                        <th width="10%">ID Compare</th>
                        <th width="20%">Product Name</th>
                        <th width="20%">Image</th>
                        <th width="15%">Price</th>
                        <th width="20%">Action</th>
                    </tr>
                    <?php
                    $customer_id = Session::get('customer_id');
                    $get_product_wishlist = $ct->get_product_wishlist($customer_id);
                    if ($get_product_wishlist) {
                        $i = 0;
                        while ($result = $get_product_wishlist->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['productName'] ?></td>
                                <td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
                                <td><?php echo $result['price'] ?></td>
                                <td><a onclick="return confirm('Are you want to delete?')" href="?wishlistId=<?php echo $result['productId'] ?>">Xóa</a>||<a href="details.php?proid=<?php echo $result['productId'] ?>">Buy Now</a></td>
                            </tr>
                    <?php

                        }
                    }
                    ?>


                </table>

            </div>
            <div class="shopping">
                <div class="shopleft">
                    <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                </div>

            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>