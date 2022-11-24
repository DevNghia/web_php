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
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_bottom">
                <div class="heading">
                    <h3>Profile Customer</h3>
                </div>
                <div class="clear"></div>
            </div>
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
<?php
include './inc/footer.php'
?>