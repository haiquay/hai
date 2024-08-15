<?php
/**
 * Created by PhpStorm.
 * User: MewMew
 * Date: 3/6/2019
 * Time: 7:27
 */
require_once __DIR__ . '/../Models/ModelShoes.php';
require_once __DIR__ . "/../Views/ViewShoes.php";

class ControllerShoes
{
    var $model, $view;
    public function __construct()
    {
        $this->view = new ViewShoes();
        $this->model = new ModelShoes();
    }
    // trang chu
    public function getPageHome(){
        $result = $this->model->phanTrang();
        $row = pg_fetch_assoc($result);
        $total_record = $row['total'];
        // tìm số lượng trang và số sản phẩm trên 1 trang
        $current_page = isset($_GET['page'])? $_GET['page']:1;
        $limit = 15;
        // tổng trang
        $total_page = ceil($total_record/$limit);
        //
        if ($current_page > $total_page){
            $current_page = $total_page;
        }else if ($current_page < 1){
            $current_page = 1;
        }
        //trang bắt đầu
        $start = ($current_page - 1) * $limit;
        $result = $this->model->getDataHome();
        $arr = [];
        $temp = [];
        $temp['current_page'] = $current_page;
        $temp['total_page'] = $total_page;
        array_push($arr, $temp);

        $this->view->getPageHome($result, $arr);
    }
    //Trang tin tức
    public function getPageNews(){
        $this->view->getPageNews();
    }
    // trang liên hệ
    public function getPageContact(){
        $this->view->getPageContact();
    }
    // trang giay nam
    public function getPageMenShoes(){
        $result = $this->model->getDataMen();
        $this->view->getPageMenShoes($result);
    }
    // trang giay nu
    public function getPageWomenShoes(){
        $result = $this->model->getDataWomen();
        $this->view->getPageWomenShoes($result);
    }
    // adidas
    public function getPageAdidas(){
        $result = $this->model->getDataAdidas();
        $this->view->getPageAdidas($result);
    }
    //vans
    public function getPageVans(){
        $result = $this->model->getDataVans();
        $this->view->getPageVans($result);
    }
    //converse
    public function getPageConverse(){
        $result = $this->model->getDataConverse();
        $this->view->getPageConverse($result);
    }
    //balenciaga
    public function getPageBalenciaga(){
        $result = $this->model->getDataBalanciaga();
        $this->view->getPageBalenciaga($result);
    }
    //balance
    public function getPageBalance(){
        $result = $this->model->getDataBalance();
        $this->view->getPageBalance($result);
    }
    //puma
    public function getPagePuma(){
        $result = $this->model->getDataPuma();
        $this->view->getPagePuma($result);
    }
    //trang dang nhap
    public function getPageLogin(){
        $this->view->getPageLogin();
    }
    //trang dang ky
    public function getPageRegister(){
        $this->view->getPageRegister('');
    }
    //trang chi tiet
    public function getDetailPage($product_id)
    {
        $data = [];
        $products = $this->model->detailProduct($product_id);
        while($row = pg_fetch_assoc($products)) {
            $temp = [];
            $temp['id'] = $row['id_product'];
            $temp['name'] = $row['name_product'];
            $temp['price'] = $row['price'];
            $temp['trandmark'] = $row['name_trandmark'];
            $temp['size'] = $this->model->product_size($row['id_product']);
            $temp['quantity'] = $row['quanity'];
            $temp['type'] = $row['name_type'];
            $temp['image'] = $row['image'];
            array_push($data, $temp);
        }
        $this->view->getPageDetail($data);
    }
    // trang quản lý user
    public function getPageUser(){
        $listUser = $this->model->getDataUser();
        $this->view->getPageUser($listUser);
    }
    // quản lý sản phẩm
    public function getPageProduct(){
        $listProduct = $this->model->getDataProduct();
        $listSize = $this->model->getSize();
        $productsBySize = [];
        while($row = pg_fetch_assoc($listProduct)) {
            $temp = [];
            $temp['id'] = $row['id_product'];
            $temp['name'] = $row['name_product'];
            $temp['price'] = $row['price'];
            $temp['trandmark'] = $row['name_trandmark'];
            $temp['size'] = $this->model->product_size($row['id_product']);
            $temp['quantity'] = $row['quanity'];
            $temp['type'] = $row['name_type'];
            $temp['image'] = $row['image'];
            array_push($productsBySize, $temp);
        }
        $this->view->getPageProduct($productsBySize, $listSize);
    }
    // lấy tranng quản lý đơn hàng
    public function getPageBill(){
        $listBill = $this->model->getDataBill();
        $this->view->getPageBill($listBill);
    }
    // Xóa thành viên
    public function deleteUser(){
        $this->model->deleteUser();
        header("location:index.php?task=pagemanager");
    }
    // dang nhap
    public function doLogin(){
        $result = $this->model->doLogin();
        $_SESSION['id_user'] = $result['id_user'];
        $_SESSION['username'] = $result['name'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['phone'] = $result['phone'];
        $_SESSION['address'] = $result['address'];
        echo $result['address'];
        $_SESSION['level'] = $result['level'];
        if ($result['level'] == 2){
            header("location:index.php?task=pageuser");
        }elseif ($result['level'] == 1){
            header("location:index.php?task=pagehome");
        }
    }
    // dang ky
    public function doRegister($name, $email, $phone,$address, $password, $created){
        $result =  $this->model->doRegister($name, $email, $phone,$address, $password, $created);
        $message = "Đăng ký thành công !";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $this->view->getPageRegister();
    }
    // Tìm kiếm
    public function doSearch($key){
        $result = $this->model->doSearch($key);
        $this->view->getPageSearch($result);
    }
    // Thêm sản phẩm
    public function addProduct($name_product, $price, $quanity, $trandmark, $type, $created, $size){
        if (isset($_FILES['imagefile']['name'])){
            $path = "Image/shoe/".$trandmark."/";
            $image = $_FILES['imagefile']['name'];
            move_uploaded_file($_FILES['imagefile']['tmp_name'], $path.$image);
            // them anh
            if (empty($name_product) || empty($price) || empty($quanity) || empty($trandmark) || empty($type)){
                header("location:".$_SERVER['REQUEST_URI']."");
            }else {
                $insert_id = $this->model->addProduct($name_product, $price, $quanity, $trandmark, $type, $path . $image, $created);
                foreach ($size as $item) {
                    $this->model->addProductSize($item, $insert_id);
                }
            }
        }else{
            echo "<div class='container mt-4' style='width: 380px;'><div class='alert alert-success text-center'>Vui lòng chọn ảnh!</div></div>";
        }
    }
    // trang sửa sản phẩm
    public function getPageEditProduct(){
        $result = $this->model->getPageEditProduct();
        $this->view->getPageEditProduct($result);
    }
    public function doUpdateProduct(){
        $result = $this->model->editProduct();
        if ($result == true){
            header("location:index.php?task=pageproduct");
        }else{
            var_dump($result);
        }
    }
    // Xóa sản phẩm
    public function delProduct(){
        $result = $this->model->delProduct();
        if ($result == true){

            header("location:index.php?task=pageproduct");
        }else{
            var_dump($result);
        }
    }
    // gio hang
    function add_to_cart($info)
    {
        if (count($_SESSION['cart']) > 0) {
            $this->merge($info);
        } else {
            array_push($_SESSION['cart'], $info);
        }
        //header('Location: '.$_SERVER["REQUEST_URI"].'');
    }
    // Xóa khỏi giỏ hàng
    function remove_from_cart($product_id)
    {
        $ids = array_column($_SESSION['cart'], 'id');
        if(in_array($product_id, $ids)) {
            $key = array_search($product_id, $ids);
            print_r($key);
            if($key !== false) {
                unset($_SESSION['cart'][$key]);
                Sort($_SESSION['cart']);
                header('Location: '.$_SERVER["HTTP_REFERER"].'');
            }
        }
    }
    // Tăng số lượng sản phẩm nếu sản phẩm bị trùng
    function merge($new_added)
    {
        $ids = array_column($_SESSION['cart'], 'id');
        if(in_array($new_added['id'], $ids)) {
            for($i = 0; $i < count($_SESSION['cart']); $i++) {
                if($_SESSION['cart'][$i]['id'] == $new_added['id']) {
                    $total_quantity = $_SESSION['cart'][$i]['quantity'] + $new_added['quantity'];
                    if($total_quantity < 11) {
                        $_SESSION['cart'][$i]['quantity'] = $total_quantity;
                    } else {
                        $_SESSION['cart'][$i]['quantity'] = 10;
                    }
                }
            }
        } else {
            array_push($_SESSION['cart'], $new_added);
        }
    }
    // lấy dữ liệu giỏ hàng
    public function getPageCart(){
        $product_info = [];
        for ($i=0; $i < count($_SESSION['cart']); $i++) {
            $data['quantity'] = $_SESSION['cart'][$i]['quantity'];
            $data['product_info'] = $this->model->getProductDetails($_SESSION['cart'][$i]['id']);
            array_push($product_info, $data);
        }
        $data = $product_info;
        $this->view->getPageCart($data);
    }
    public function getPagePayment(){
        $this->view->getPagePayment();
    }
    public function payment(){
        $this->model->creatDetailOrder();
    }
}