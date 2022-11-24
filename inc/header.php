<?php
include 'lib/session.php';
Session::init();
?>
<?php
include_once  'lib/database.php';
include_once 'helpers/format.php';

spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});
$db = new Database();
$fm = new Format();
$ct = new cart();
$ur = new user();
$cs = new customer();
$product = new product();
$cat = new category();
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>

<head>
    <title>Store Website</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#dc_mega-menu-orange').dcMegaMenu({
                rowItems: '4',
                speed: 'fast',
                effect: 'fade'
            });
        });
    </script>
</head>

<body>
    <div class="wrap">
        <div class="header_top">
            <div class="logo">
                <a href="index.php"><img src="images/logo-fpt-shop.jpg" alt="" /></a>
            </div>
            <div class="header_top_right">
                <div class="search_box">
                    <form action="search.php" method="GET">
                        <input type="text" name="search" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
                    </form>
                </div>
                <div class="shopping_cart">
                    <div class="cart">
                        <a href="#" title="View my shopping cart" rel="nofollow">
                            <span class="cart_title">Cart</span>
                            <span class="no_product">
                                <?php
                                $check_cart = $ct->check_cart();
                                if ($check_cart) {
                                    $qty = Session::get("qty");
                                    $sum = Session::get("sum");
                                    echo  $qty;
                                } else {
                                    echo 'Empty';
                                }
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
                <?php
                if (isset($_GET['customer_id'])) {
                    $customer_id = $_GET['customer_id'];
                    $delCart = $ct->del_all_data_cart();
                    $delCompare = $ct->del_all_compare($customer_id);
                    Session::destroy();
                }
                ?>
                <div class="login">
                    <?php
                    $login_check = Session::get('customer_login');
                    if ($login_check == false) {
                        echo ' <a href="login.php">Login</a>
                </div> ';
                    } else {
                        echo ' <a href="?customer_id=' . Session::get('customer_id') . '">Logout</a>
                </div>';
                    }
                    ?>


                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="menu">
                <ul id="dc_mega-menu-orange" class="dc_mm-orange">
                    <li><a href="index.php">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            CATEGORIES
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            $getCategory = $cat->get_Category();
                            if ($getCategory) {
                                while ($resultCat = $getCategory->fetch_assoc()) {
                            ?>
                                    <li><a class="dropdown-item" href="productbycat.php?catId=<?php echo $resultCat['catId'] ?>"><?php echo $resultCat['catName'] ?></a></li>
                            <?php
                                }
                            }
                            ?>

                        </ul>
                    </li>
                    <li><a href="products.php">Products</a> </li>
                    <li><a href="topbrands.php">Top Brands</a></li>
                    <li><a href="cart.php">Cart</a></li>

                    <?php
                    $login_check = Session::get('customer_login');
                    if ($login_check == false) {
                        echo '';
                    } else {
                        echo '<li><a href="profile.php">Profile</a> </li>';
                    }
                    ?>
                    <?php
                    $customer_id = Session::get('customer_id');
                    $check_order = $ct->check_order($customer_id);
                    if ($check_order == true) {
                        echo '<li><a href="orderdetails.php">Ordered</a></li>';
                    } else {
                        echo '';
                    }
                    ?>
                    <?php
                    $login_check = Session::get('customer_login');
                    if ($login_check == false) {
                        echo '';
                    } else {
                        echo '<li><a href="compare.php">Compare</a> </li>';
                    }
                    ?>

                    <?php
                    $login_check = Session::get('customer_login');
                    if ($login_check == false) {
                        echo '';
                    } else {
                        echo '<li><a href="wishlist.php">Wishlist</a> </li>';
                    }
                    ?>

                    <li><a href="contact.php">Contact</a> </li>
                    <div class="clear"></div>
                </ul>
            </div>