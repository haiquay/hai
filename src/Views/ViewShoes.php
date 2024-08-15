<?php
/**
 * Created by PhpStorm.
 * User: MewMew
 * Date: 3/6/2019
 * Time: 7:27
 */

class ViewShoes
{
    public function getPageHome($result, $arr){
        include_once  __DIR__ . "/../Templates/Home.php";
    }
    public function getPageContact(){
        include_once  __DIR__ . "/../Templates/contact.php";
    }
    public function getPageNews(){
        include_once  __DIR__ . "/../Templates/news.php";
    }
    public function getPageMenShoes($result){
        include_once  __DIR__ . "/../Templates/MenShoes.php";
    }
    public function getPageWomenShoes($result){
        include_once  __DIR__ . "/../Templates/WomenShoes.php";
    }
    public function getPageLogin(){
        include_once  __DIR__ . "/../Templates/FormLogin.php";
    }
    public function getPageRegister(){
        include_once  __DIR__ . "/../Templates/FormRegister.php";
    }
    public function getPageAdidas($result){
        include_once  __DIR__ . "/../Templates/adidas.php";
    }
    public function getPageVans($result){
        include_once  __DIR__ . "/../Templates/vans.php";
    }
    public function getPagePuma($result){
        include_once  __DIR__ . "/../Templates/puma.php";
    }
    public function getPageBalenciaga($result){
        include_once  __DIR__ . "/../Templates/balenciaga.php";
    }
    public function getPageBalance($result){
        include_once  __DIR__ . "/../Templates/balance.php";
    }
    public function getPageConverse($result){
        include_once  __DIR__ . "/../Templates/converse.php";
    }
    public function getPageSearch($result){
        include_once  __DIR__ . "/../Templates/formTimKiem.php";
    }
    // quản lý user
    public function getPageUser($listUser){
        include_once  __DIR__ . "/../Templates/pageUser.php";
    }
    // quản lý sản phẩm
    public function getPageProduct($listProduct, $listSize){
        include_once  __DIR__ . "/../Templates/pageProduct.php";
    }
    // quản lý hóa đơn
    public function getPageBill($listBill){
        include_once  __DIR__ . "/../Templates/bill.php";
    }
    public function getPageEditProduct($result){
        include_once  __DIR__ . "/../Templates/FormEditProduct.php";
    }
    public function getPageDetail($data){
        include_once  __DIR__ . "/../Templates/detail_product.php";
    }
    public function getPageCart($data){
        include_once  __DIR__ . "/../Templates/cart.php";
    }
    public function getPagePayment(){
        include_once  __DIR__ . "/../Templates/payment.php";
    }
}