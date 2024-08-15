<!DOCTYPE html>
<html lang="en">
<?php include_once "link.php";?>
<head>
    <?php include_once "Partials/Head.php";?>
</head>
<body>
<nav>
    <?php include_once "Partials/Header.php";?>
</nav>
<div class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-3 mt-3 mb-3 bg-white rounded">
                <p class="p-login">Tạo Tài Khoản</p>
                <p>Tạo tài khoản để theo dõi đơn hàng, lưu danh sách sản phẩm yêu thích và nhận nhiều ưu đãi hấp dẫn hơn.</p>
                <img src="Image/coco.png" width="300px" alt="">
            </div>
            <div class="col-8 bg-white mt-3 mb-3 ml-5 rounded">
                <form method="POST" action="">
                    <div><p class="p-login">Tạo Tài Khoản</p></div>
                    <div class="form-group">
                        <label for="">Tên Người Dùng</label>
                        <input class="form-control" type="text" name="name" placeholder="Tên người dùng">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Số Điện Thoại</label>
                        <input class="form-control" type="number" name="phone" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="">Địa Chỉ</label>
                        <input class="form-control" type="text" name="address" placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="">Nhập Lại Mật khẩu</label>
                        <input class="form-control" type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                    </div>
                    <div><input type="submit" class="btn btn-primary" name="register" value="Đăng Ký"></div>
                    <p>Nếu bạn đã có tài khoản đăng nhập  <a class="a-blue" href="index.php?task=pagelogin">tại đây</a> !</p>
                </form>
            </div>
        </div>
    </div>
</div>
<footer>
    <?php include_once "Partials/Footer.php";?>
</footer>
</body>
</html>