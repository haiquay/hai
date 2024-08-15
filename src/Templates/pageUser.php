<!DOCTYPE html>
<html lang="en">

<link href="bootstrap/bootstrap.css" rel="stylesheet">
<script src="bootstrap/bootstrap.bundle.js"></script>
<script src="bootstrap/bootstrap.js"></script>
<link rel="stylesheet" href="Css/css.css">
<link rel="stylesheet" href="fontawesome/css/all.css">
<link rel="stylesheet" href="slick/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" href="slick/slick-1.8.1/slick/slick-theme.css">
<head>
    <?php include_once "Partials/Head.php";?>
</head>
<body>
<nav>
    <?php include_once "Partials/Header.php";?>
</nav>
<div class="bg-light">
    <div class="container">
        <div class="row mt-3" style="min-height: 300px;">
            <div class="col-lg-3">
                <h1>Quản lý</h1>
                <div class="list-group">
                    <a class="list-group-item" href="index.php?task=pageuser">Quản lý thành viên</a>
                    <a class="list-group-item" href="index.php?task=pageproduct">Quản lý sản phẩm</a>
                    <a class="list-group-item" href="index.php?task=pagebill">Quản lý đơn hàng</a>
                </div>
            </div>
            <div class="col-lg-9">
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#listuser">Danh sách thành viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#addmember">Thêm thành viên</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="listuser" class="container tab-pane active"> <!--Danh sach thanh vien-->
                        <h3 class="text-center">Danh sách thành viên</h3>
                        <div class="text-center">
                            <table class="table text-center w-100">
                                <tr>
                                    <th>ID</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Mật khẩu</th>
                                    <th>Ngày tạo tài khoản</th>
                                    <th>Xóa</th>
                                </tr>
                                <?php
                                while ($row = pg_fetch_assoc($listUser)){ ?>
                                    <tr>
                                        <td><?php echo $row['id_user'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['password'] ?></td>
                                        <td><?php echo $row['created'] ?></td>
                                        <td><a class="text-danger" href="index.php?task=deleteuser&iduser=<?php echo $row['id_user'] ?>"><i class="far fa-trash-alt"></i></a></td>
                                    </tr>
                                <?php }; ?>
                            </table>
                        </div>
                    </div>
                    <div id="addmember" class="container tab-pane fade"> <!--Them thanh vien-->
                        <h3 class="text-center">Thêm thành viên</h3>
                        <form method="POST" action="">
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
                                <label for="">Mật khẩu</label>
                                <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="">Nhập Lại Mật khẩu</label>
                                <input class="form-control" type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div><input type="submit" class="btn btn-primary" name="register" value="Thêm thành viên"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <?php include_once "Partials/Footer.php";?>
</footer>
<script src="bootstrap/jquery-3.3.1.min.js"></script>
<script src="bootstrap/popper.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>
</body>

</html>