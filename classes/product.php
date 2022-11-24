<?php

use LDAP\Result;

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>



<?php
/**
 * 
 */
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function search_product()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$search%' ";
            $result = $this->db->select($query);
            return $result;
        } else {
            $alert = "<span class='error'> There was no search results! </span>";
            return $alert;
        }
    }
    public function insert_product($data, $files)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        //kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;
        if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $type == "" || $price == "") {
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName,catId,brandId,product_desc,type,price,image) VALUES('$productName','$category','$brand','$product_desc','$type','$price','$unique_image')";
            $result = $this->db->insert($query);
            if ($query) {
                $alert = "<span class='success'>Insert Product Successfully </span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Product Not Successfully </span>";
                return $alert;
            }
        }
    }
    public function show_product()
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
        order by tbl_product.productId ";
        // $query = "SELECT * FROM tbl_product order by productId ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbyId($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productId ='$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_product($data, $files, $id)
    {

        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        //kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;
        if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $type == "" || $price == "") {
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        } else {
            if (!empty($file_name)) {
                //nếu người dùng chọn ảnh
                if ($file_size > 2048000) {

                    $alert = "<span class='error'>Image Size should be less then 2MB!</span>";
                    return $alert;
                } elseif (in_array($file_ext, $permited) === false) {
                    // echo "<span class='error'>You can upload only:-" . implode(',', $permited) . "</span>";
                    $alert = "<span class='success'>You can upload only:-" . implode(',', $permited) . "</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tbl_product SET 
        productName = '$productName' ,
         catId = '$category' ,
          brandId = '$brand' ,
           product_desc = '$product_desc' ,
            type = '$type' ,
             price = '$price',
              image = '$unique_image' 
             

        WHERE productId ='$id' ";
            } else {
                //nếu người dùng không chọn ảnh
                $query = "UPDATE tbl_product SET 
        productName = '$productName' ,
         catId = '$category' ,
          brandId = '$brand' ,
           product_desc = '$product_desc' ,
            type = '$type' ,
             price = '$price'
             

        WHERE productId ='$id' ";
            }


            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Product Update Successfully </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Product Update Not Success </span>";
                return $alert;
            }
        }
    }
    public function del_product($id)
    {
        $query = "DELETE FROM tbl_product WHERE productId ='$id' ";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Product Delete Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Product Delete Not Success</span>";
            return $alert;
        }
    }
    //end backend
    public function getproduct_feathered()
    {
        $query = "SELECT * FROM tbl_product WHERE type ='1' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_new()
    {
        $query = "SELECT * FROM tbl_product order by productId desc LIMIT 4 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id)
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
        INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
        WHERE tbl_product.productId ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestSamsung()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='2' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestXiaomi()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='3' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestOppo()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='4' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestApple()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='5' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getApple()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='5' order by productId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getTopApple()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='5' order by productId  LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getSamsung()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='2' order by productId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getTopSamsung()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='2' order by productId desc LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getXiaomi()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='3' order by productId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getTopXiaomi()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='3' order by productId desc LIMIT 4 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getOppo()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='4' order by productId desc LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getTopOppo()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='4' order by productId desc LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getVivo()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='12' order by productId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLenovo()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='6' order by productId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getAcer()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='7' order by productId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getDell()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='8' order by productId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getAsus()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='9' order by productId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getHP()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='10' order by productId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getMSI()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId ='11' order by productId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function insertCompare($productid, $customer_id)
    {
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
        $productid = mysqli_real_escape_string($this->db->link, $productid);
        $query_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id='$customer_id' ";
        $check_compare =  $this->db->select($query_compare);
        if ($check_compare) {
            $msg = "<span class='error'>Product Already Added to Compare</span>";
            return $msg;
        } else {

            $query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
            $result = $this->db->select($query)->fetch_assoc();
            $productName = $result["productName"];
            $price = $result["price"];
            $image = $result["image"];

            $query_insert = "INSERT INTO tbl_compare(productId,customer_id,productName,price,image) VALUES('$productid','$customer_id','$productName','$price','$image')";
            $insert_compare = $this->db->insert($query_insert);
            if ($insert_compare) {
                $alert = "<span class='success'>Added Compare Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Added Compare Not Successfully</span>";
                return $alert;
            }
        }
    }
    public function insertWishlist($productid, $customer_id)
    {
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
        $productid = mysqli_real_escape_string($this->db->link, $productid);
        $query_wishlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id='$customer_id' ";
        $check_wishlist =  $this->db->select($query_wishlist);
        if ($check_wishlist) {
            $msg = "<span class='error'>Product Already Added to Wishlist</span>";
            return $msg;
        } else {

            $query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
            $result = $this->db->select($query)->fetch_assoc();
            $productName = $result["productName"];
            $price = $result["price"];
            $image = $result["image"];

            $query_insert = "INSERT INTO tbl_wishlist(productId,customer_id,productName,price,image) VALUES('$productid','$customer_id','$productName','$price','$image')";
            $insert_wishlist = $this->db->insert($query_insert);
            if ($insert_wishlist) {
                $alert = "<span class='success'>Added Wishlist Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Added Wishlist Not Successfully</span>";
                return $alert;
            }
        }
    }
    public function insert_slider($data, $files)
    {

        $sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);

        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        //kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['slider_image']['name'];
        $file_size = $_FILES['slider_image']['size'];
        $file_temp = $_FILES['slider_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;
        if ($sliderName == "" || $type == "") {
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_slider(sliderName, slider_image, type) VALUES('$sliderName','$unique_image','$type')";
            $result = $this->db->insert($query);
            if ($query) {
                $alert = "<span class='success'>Insert Slider Successfully </span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Slider Not Successfully </span>";
                return $alert;
            }
        }
    }
    public function show_slider()
    {
        $query = "SELECT * FROM tbl_slider order by sliderId";
        $result = $this->db->select($query);
        return $result;
    }
    public function slider_update($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE tbl_slider SET type = '0' 
         
        WHERE sliderId ='$id' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Slider Updated Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>SliderUpdated Not  Successfully</span>";
            return $msg;
        }
    }
    public function slidered_update($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE tbl_slider SET type = '1' 
         
        WHERE sliderId ='$id' ";
        $result = $this->db->update($query);
    }
    public function get_slider()
    {
        $query = "SELECT * FROM tbl_slider WHERE type ='1'";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_slider($id)
    {

        $query = "DELETE FROM tbl_slider WHERE sliderId='$id'";
        $result = $this->db->delete($query);
        return $result;
    }
}
?>