<?php
include 'inc/header.php';
?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id);
    $delCart = $ct->del_all_data_cart();
    header('Location:success.php');
}
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//     $quantity = $_POST['quantity'];
//     $AddtoCart = $ct->add_to_cart($quantity, $id);
// }
?>
<style>
    .box_left {
        width: 50%;
        border: 1px solid #666;
        float: left;
        padding: 5px;
    }

    .box_right {
        width: 45%;
        border: 1px solid #666;
        float: right;
        padding: 4px;
    }

    .a_order {
        padding: 10px 70px;
        border: none;
        background: red;
        font-size: 25px;
        color: white;
        margin: 10px;
        cursor: pointer;
    }
</style>
<form action="" method="post">
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="heading">
                    <h3>Offline Payment</h3>
                </div>
                <div class="clear"></div>
                <div class="box_left">
                    <div class="cartpage">

                        <?php
                        if (isset($delcart)) {
                            echo $delcart;
                        }
                        if (isset($update_quantity_cart)) {
                            echo $update_quantity_cart;
                        }
                        ?>
                        <table class="tblone">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">Product Name</th>

                                <th width="15%">Price</th>
                                <th width="25%">Quantity</th>
                                <th width="20%">Total Price</th>

                            </tr>
                            <?php
                            $get_product_cart = $ct->get_product_cart();
                            if ($get_product_cart) {
                                $subtotal = 0;
                                $qty = 0;
                                $i = 0;
                                while ($result = $get_product_cart->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $result['productName'] ?></td>

                                        <td><?php echo $result['price'] . ' ' . 'VND' ?></td>
                                        <td>


                                            <input type="number" name="quantity" min="1" value="<?php echo $result['quantity'] ?>" />


                                        </td>
                                        <td>
                                            <?php
                                            $total = $result['price'] * $result['quantity'];
                                            echo $total . ' ' . 'VND';
                                            ?>
                                        </td>

                                    </tr>
                            <?php
                                    $subtotal += $total;
                                    $qty = $qty + $result['quantity'];
                                }
                            }
                            ?>


                        </table>
                        <?php
                        $check_cart = $ct->check_cart();
                        if ($check_cart) {
                        ?>
                            <table style="float:right;text-align:left;" width="40%">
                                <tr>
                                    <th>Sub Total : </th>
                                    <td><?php
                                        echo $subtotal . ' ' . 'VND';
                                        Session::set('sum', $subtotal);
                                        Session::set('qty', $qty);
                                        ?></td>
                                </tr>
                                <tr>
                                    <th>VAT : </th>
                                    <td>10%</td>
                                </tr>
                                <tr>
                                    <th>Grand Total :</th>
                                    <td> <?php
                                            $vat = $subtotal * 0.1;
                                            $gtotal = $subtotal + $vat;
                                            echo $gtotal . ' ' . 'VND';
                                            ?></td>
                                </tr>
                            </table>
                        <?php
                        } else {
                            echo 'Your Cart is Empty ! Please Shopping Now';
                        }
                        ?>
                    </div>
                </div>
                <div class="box_right">
                    <?php
                    $id = Session::get('customer_id');
                    $showCustomer = $cs->show_customer($id);
                    if (isset($showCustomer)) {
                        while ($result = $showCustomer->fetch_assoc()) {

                    ?>
                            <table class="tblone">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td><?php echo $result['name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td><?php echo $result['address'] ?></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>:</td>
                                    <td><?php echo $result['city'] ?></td>
                                </tr>
                                <tr>
                                    <td>Zipcode</td>
                                    <td>:</td>
                                    <td><?php echo $result['zipcode'] ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td><?php echo $result['phone'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $result['email'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><a href="editprofile.php">Update Profile</a></td>

                                </tr>
                            </table>
                    <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
        <center><a href="?orderid=order" class="a_order">Order</a></center>
    </div>
</form>
<?php
include './inc/footer.php'
?>