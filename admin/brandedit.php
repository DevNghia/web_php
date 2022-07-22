<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php' ?>
<?php
$brand = new brand();
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
    echo "<script>window.lobrandion = 'brandlist.php'</script>";
} else {
    $id = $_GET['brandid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    $brandName = $_POST['brandName'];

    $updatebrand = $brand->update_brand($brandName, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>

        <div class="block copyblock">
            <?php
            $get_brand_name = $brand->getbrandbyId($id);
            if ($get_brand_name) {
                while ($result = $get_brand_name->fetch_assoc()) {



            ?>
                    <form action="" method="post">
                        <?php
                        if (isset($updatebrand)) {
                            echo $updatebrand;
                        }
                        ?>
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['brandName'] ?>" name="brandName" placeholder="Sửa danh mục thương hiệu..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="update" />
                                </td>
                            </tr>
                        </table>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>