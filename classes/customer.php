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
class Customer
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_binhluan()
    {
        $product_id = $_POST['product_id_binhluan'];
        $tenbinhluan = $_POST['tennguoibinhluan'];
        $binhluan = $_POST['binhluan'];
        if ($tenbinhluan == '' || $binhluan == '') {
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_binhluan(tenbinhluan, binhluan,product_id) VALUES('$tenbinhluan','$binhluan','$product_id')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Bình luận sẽ được admin phê duyệt </span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Bình luận không thành công </span>";
                return $alert;
            }
        }
    }
    public function insert_customers($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        if ($name == "" || $address == "" || $city == "" || $country == "" || $zipcode == "" || $phone == "" || $email == "" || $password == "") {
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        } else {
            $check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                $alert = "<span class='error'>Email Already Existed ! Please Enter Another Email</span>";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_customer(name	,address, city, country	,zipcode,phone,	email,password) VALUES('$name','$address','$city','$country','$zipcode','$phone','$email','$password')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'>Customer Created Successfully </span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Customer Created Not Successfully </span>";
                    return $alert;
                }
            }
        }
    }
    public function login_customers($data)
    {
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        if ($email == "" ||  $password == "") {
            $alert = "<span class='error'>Email and Password must be not empty</span>";
            return $alert;
        } else {
            $check_login = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password' ";
            $result_check = $this->db->select($check_login);

            if ($result_check) {

                $value = $result_check->fetch_assoc();
                Session::set('customer_login', true); // set customer đã tồn tại
                // gọi function Checklogin để kiểm tra true.
                Session::set('customer_id', $value['id']);
                Session::set('customer_name', $value['name']);
                header("Location:order.php");
            } else {
                $alert = "<span class='error'>Email or Password doesn't match</span>";
                return $alert;
            }
        }
    }
    public function show_customer($id)
    {
        $query = "SELECT * FROM tbl_customer WHERE id='$id' ";

        $result = $this->db->select($query);
        return $result;
    }
    public function update_customers($data, $id)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);

        if ($name == "" || $address == "" || $city == "" || $zipcode == "" || $phone == "" || $email == "") {
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        } else {
            $query = "UPDATE tbl_customer SET name='$name'	,address='$address', city='$city',zipcode='$zipcode',phone='$phone',email='$email' WHERE id='$id'";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Customer Update Successfully </span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Customer Update Not Successfully </span>";
                return $alert;
            }
        }
    }
}
?>