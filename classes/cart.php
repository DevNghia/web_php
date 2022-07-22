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
class cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_to_cart($quantity, $id)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();
        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->select($query)->fetch_assoc();
        $image = $result["image"];
        $price = $result["price"];
        $productName = $result["productName"];
        $query_cart = "SELECT * FROM tbl_cart WHERE productid= '$id' AND sId ='$sId'";
        $check_cart = $this->db->select($query_cart);
        if ($check_cart) {
            $msg = "Product Already Added";
            return $msg;
        } else {


            $query_insert = "INSERT INTO tbl_cart(productId,quantity,sId,productName,price,image) VALUES('$id','$quantity','$sId','$productName','$price','$image')";
            $insert = $this->db->insert($query_insert);
            if ($query) {
                header('Location:cart.php');
            } else {
                header('Location:404.php');
            }
        }
    }
    public function get_product_cart()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_product_cart($cartId)
    {
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        $query = "DELETE FROM tbl_cart WHERE cartId ='$cartId' ";
        $result = $this->db->delete($query);
        if ($result) {
            header('Location:cart.php');
        } else {
            $alert = "<span class='error'> Product Deleted Not Success</span>";
            return $alert;
        }
    }
    public function check_cart()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_quantity_cart($quantity, $cartId)
    {
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        $query = "UPDATE tbl_cart SET 
        quantity= '$quantity' 
         
        WHERE cartId ='$cartId' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Product Quantity Updated Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Product Quantity Updated Not  Successfully</span>";
            return $msg;
        }
    }
}
?>