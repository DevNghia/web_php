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
    h3.success_order {
        text-align: center;
        color: red;
    }
</style>
<form action="" method="post">
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="heading">
                    <h3 class="success_order">Succsess Order</h3>
                    <?php
                    $customer_id = Session::get('customer_id');
                    $get_amount = $ct->getAmountPrice($customer_id);
                    if ($get_amount) {
                        $amount = 0;
                        while ($result = $get_amount->fetch_assoc()) {
                            $price = $result['price'];
                            $amount += $price;
                        }
                    }
                    ?>
                    <h4>Total Price You Have Bought From My Website:
                        <?php
                        $vat = $amount * 0.1;
                        $totals = $vat + $amount;
                        echo $totals . 'VND';
                        ?>
                    </h4>
                    <h4>We will contact as soon as possiable. Please see your order details here <a href="orderdetails.php">Click Here</a></h4>
                </div>
                <div class="clear"></div>

            </div>
        </div>

</form>
<?php
include './inc/footer.php'
?>