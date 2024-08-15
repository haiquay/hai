<?php
/**
 * Created by PhpStorm.
 * User: MewMew
 * Date: 3/6/2019
 * Time: 7:27
 */

class ModelShoes
{
    private $db;
    public function __construct()
    {
        $conn_string = $_ENV['DB_URL'];
        $this->db = pg_connect($conn_string);
    }
    // đăng nhập
    public function doLogin(){
        $query = "SELECT * 
                  FROM users 
                  WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'";
        $result = pg_query($this->db, $query);
        if (pg_num_rows($result) > 0){
            $row = pg_fetch_assoc($result);
            return $row;
        }
        return false;
    }
    // đăng kí
    public function doRegister($name, $email, $phone,$address, $password, $created){
        $query = "INSERT INTO users (name, email, phone,address, password, level, created)
                  VALUES ('".$name."','".$email."', '".$phone."', '".$address."', '".$password."', '1', '".$created."')";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // lay du lieu trang chu
    public function getDataHome(){
        $query = "SELECT *
                  FROM product
                  LIMIT 15 OFFSET 1";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // lay du lieu trang giay nam
    public function getDataMen(){
        $query = "SELECT * 
                  FROM product, type
                  WHERE product.id_type = type.id_type
                  AND product.id_type = '1'";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // lay du lieu trang giay nu
    public function getDataWomen(){
        $query = "SELECT * 
                  FROM product, type
                  WHERE product.id_type = type.id_type
                  AND product.id_type = '2'";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // lay du lieu giay theo thuong hieu

    //converse
    public function getDataConverse(){
        $query = "SELECT * 
                  FROM product, trandmark,type
                  WHERE product.id_trandmark = trandmark.id_trandmark 
                  AND product.id_trandmark = '5'
                  AND product.id_type = type.id_type";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // adidas
    public function getDataAdidas(){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE product.id_trandmark = trandmark.id_trandmark 
                  AND product.id_trandmark = '1'
                  AND product.id_type = type.id_type";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // vans
    public function getDataVans(){
        $query = "SELECT * 
                  FROM product, trandmark,type
                  WHERE product.id_trandmark = trandmark.id_trandmark 
                  AND product.id_trandmark = '6'
                  AND product.id_type = type.id_type";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // balanciaga
    public function getDataBalanciaga(){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE product.id_trandmark = trandmark.id_trandmark 
                  AND product.id_trandmark = '4'
                  AND product.id_type = type.id_type";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // puma
    public function getDataPuma(){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE product.id_trandmark = trandmark.id_trandmark 
                  AND product.id_trandmark = '3'
                  AND product.id_type = type.id_type";
        $result = pg_query($this->db, $query);
        return $result;
    }
    //balance
    public function getDataBalance(){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE product.id_trandmark = trandmark.id_trandmark 
                  AND product.id_trandmark = '2'
                  AND product.id_type = type.id_type";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // them thanh vien
    public function addMember($name, $email, $phone, $password, $created){
        $query = "INSERT INTO users (name, email, phone, password, level, created)
                  VALUES ('".$name."','".$email."', '".$phone."', '".$password."', '1', '".$created."')";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // Xóa thành viên
    public function deleteUser(){
        $query = "DELETE FROM users
                  WHERE id_user = '{$_GET['iduser']}'";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // lay du lieu user
    public function getDataUser(){
        $query = "SELECT * 
                  FROM users
                  WHERE level = '1'";
        $listUser = pg_query($this->db, $query);
        return $listUser;
    }
    // lay du lieu san pham
    public function getDataProduct(){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE product.id_trandmark = trandmark.id_trandmark 
                  AND product.id_type = type.id_type";
        $listProduct = pg_query($this->db,$query);
        return $listProduct;
    }
    // lấy dữ liệu đơn hàng
    public function getDataBill(){
        $query = "SELECT *
                  FROM bill, users, detailorder, product
                  WHERE bill.id_user   = users.id_user
                  AND bill.id_bill = detailorder.id_bill
                  AND detailorder.id_product = product.id_product";
        $listBill = pg_query($this->db, $query);
        return $listBill;
    }
    // lấy dữ liệu trang sửa sản phẩm
    public function getPageEditProduct(){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE id_product = '{$_GET['id']}'
                  AND product.id_trandmark = trandmark.id_trandmark
                  AND type.id_type = product.id_type";
        $result = pg_query($this->db, $query);
        return $result->fetch_assoc();
    }
    // Sửa sản phẩm
    public function editProduct(){
        $query = "UPDATE product
                  SET name_product = '{$_POST['name_product']}',
                  price = '{$_POST['price']}',
                  quanity = '{$_POST['quantity']}',
                  id_trandmark = '{$_POST['trandmark']}',
                  id_type = '{$_POST['type']}'
                  WHERE id_product = '{$_POST['idan']}'";
        if (pg_query($this->db, $query)){
            $message = "Cập nhật thành công!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }else{
            $message = "Cập nhật thất bại!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }
    // xóa sản phẩm
    public function delProductSize(){
        $query = "DELETE FROM product_size
                  WHERE product_size.id_product = '{$_GET['id']}'";
        if (pg_query($this->db, $query)){
            return pg_last_oid($this->db);
        };
        return false;
    }
    public function delProduct(){
        $id = $this->delProductSize();
        if (isset($id)){
            $query = "DELETE FROM product
                      WHERE id_product = '{$_GET['id']}'";
            $result = pg_query($this->db, $query);
            return $result;
            $message = "Xóa sản phẩm".$_GET['id']." thành công!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        };
        return false;
    }

    // lấy size
    public function getSize(){
        $query = "SELECT *
                  FROM size";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // du lieu san pham de them
    public function dataProduct(){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE product.id_trandmark = trandmark.id_trandmark
                  AND product.id_type = type.id_type";
        $dataProduct = pg_fetch_assoc($this->db, $query);
        return $dataProduct;
    }
    // tìm kiếm sản phẩm
    public function doSearch(string $key){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE product.id_trandmark = trandmark.id_trandmark
                  AND product.id_type = type.id_type 
                  AND (name_trandmark LIKE '%$key%' OR name_type LIKE '%$key%' OR name_product LIKE '%$key%' )";
        //echo $query;
        $result = pg_query($this->db, $query);
        return $result;
    }
    // Thêm sản phẩm
    public function addProduct($name_product, $price, $quanity, $trandmark, $type, $image, $created){
        $query = "INSERT INTO product(name_product, price, quanity, id_trandmark, id_type, image, created)
                  VALUES ('{$name_product}','{$price}','{$quanity}','{$trandmark}','{$type}', '{$image}', '{$created}')";
        pg_query($this->db, $query);
        return pg_last_oid($this->db);
    }
    public function product_size($product_id)
    {
        $query = "SELECT * FROM product_size, size
                  WHERE id_product = {$product_id} 
                  AND size_id = size.id";
        $result = pg_query($this->db, $query);
        $arr = [];
        while($row = pg_fetch_assoc($result)) {
            $temp = [];
            $temp['id']   = $row['id'];
            $temp['name'] = $row['name'];
            array_push($arr, $temp);
        }
        return $arr;
    }
    public function addProductSize($size, $product_id){
        $query = "INSERT INTO product_size(size_id, id_product)
                  VALUES('{$size}', '{$product_id}')";
        $result = pg_query($this->db, $query);
        return $result;
    }
    // xem chi tiet sản phẩm
    public function detailProduct($product_id){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE product.id_trandmark = trandmark.id_trandmark 
                  AND product.id_type = type.id_type 
                  AND id_product = {$product_id}";
        $listProduct = pg_query($this->db,$query);

        return $listProduct;
    }
    // lấy chi tiết sản phẩm
    public function getProductDetails($product_id){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE product.id_trandmark = trandmark.id_trandmark
                  AND product.id_type = type.id_type 
                  AND id_product = {$product_id}";
        $result = pg_query($this->db,$query);
        $arr = [];
        while($row = pg_fetch_assoc($result)){
            $temp = [];
            $temp['id'] = $row['id_product'];
            $temp['name'] = $row['name_product'];
            $temp['price'] = $row['price'];
            $temp['image'] = $row['image'];
            array_push($arr, $temp);
        }
        return $arr;
    }
    //phân trang
    public function phanTrang(){
        // tìm số bản ghi
        $result = pg_query($this->db, "SELECT count(id_product) as total FROM product");
        return $result;
    }
    // Thanh toán
    public function creatBill(){
        $created = date("Y.m.d");
        $query = "INSERT INTO bill(payment_method, id_user, total, created)
                  VALUES ('{$_POST['payment_method']}', '{$_SESSION['id_user']}', '{$_SESSION['total']}', '{$created}')";

        if (pg_query($this->db, $query)){
            return pg_last_oid($this->db);
        };
        return false;
    }
    public function creatDetailOrder(){
        $bill_id = $this->creatBill();
        for($i=0; $i < count($_SESSION['cart']); $i++) {
            $query = "INSERT INTO detailorder(id_product, size, id_bill, quanity_order, sub_total)
                      VALUES ('{$_SESSION['cart'][$i]['id']}', '{$_SESSION['cart'][$i]['size']}','{$bill_id}','{$_SESSION['cart'][$i]['quantity']}','{$_SESSION['sub_total']}')";
            if (pg_query($this->db, $query)){
                $message = "Thanh toán thành công!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                unset($_SESSION['cart']);
                header("refresh:0; url=index.php?task=pagehome");
            }else{
                $message = "Thanh toán thất bại!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            };

        }
    }
}