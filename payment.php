<?php
include 'inc/header.php';
?>
<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
    header('Location:login.php');
}
?>
<?php
// if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
//     echo "<script>window.location = '404.php'</script>";
// } else {
//     $id = $_GET['proid'];
// }
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//     $quantity = $_POST['quantity'];
//     $AddtoCart = $ct->add_to_cart($quantity, $id);
// }
?>
<style>
    .wapper_method {
        border: 2px solid gray;
        background-color: antiquewhite;
        padding: 30px;
        text-align: center;
        width: 600px;
        margin: 0 auto;
    }

    h3.payment {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;

        margin-bottom: 20px;

    }

    .wapper_method a {
        padding: 10px;
        background: red;
        color: #fff;
    }
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_bottom">
                <div class="heading">
                    <h3>Payment Method</h3>
                </div>
                <div class="clear"></div>
                <div class="wapper_method">
                    <h3 class="payment">Choose your methor payment</h3>
                    <a href="offlinepayment.php">Offline Payment</a>
                    <a href="onlinepayment.php">Online Payment</a>

                </div>
            </div>


        </div>
    </div>
</div>
<?php
include './inc/footer.php'
?>