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
                <p class="p-login">Đăng Nhập</p>
                <p>Đăng nhập giúp nhận được thông tin sản phẩm mới, lưu danh sách sản phẩm yêu thích, nhận nhiều ưu đãi hấp dẫn.</p>
                <img src="Image/coco.png" width="300px" alt="">
            </div>
            <div class="col-8 ml-5 mt-3 mb-3 bg-white rounded">
                <form action="" method="POST">
                    <div><p class="p-login">Đăng Nhập</p></div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" name="email" type="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input class="form-control" name="password" type="password" placeholder="Mật khẩu">
                    </div>
                    <div><input type="submit" name="login" class="btn btn-primary" value="Đăng Nhập"></div>
                    <p>Nếu bạn chưa có tài khoản có thể đăng ký <a class="a-blue" href="index.php?task=pageregister">tại đây</a> !</p>
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