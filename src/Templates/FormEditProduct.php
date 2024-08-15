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
        <form method="POST" action="" enctype="multipart/form-data">
            <h4 class="rounded" style="border-bottom: solid 3px #F18620; color: #E8E8E8;">
                <div class="mt-2 p-1 bg-main rounded" style="width: 325px;">SỬA THÔNG TIN SẢN PHẨM</div>
            </h4>
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="hidden" name="idan" value="<?=$result['id_product']?>">
                <input class="form-control" type="text" name="name_product" value="<?=$result['name_product'] ?>">
            </div>
            <div class="form-group">
                <label for="">Giá sản phẩm</label>
                <input class="form-control" type="number" name="price" value="<?=$result['price'] ?>">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input class="form-control" type="number" name="quantity" value="<?=$result['quanity']?>">
            </div>
            <div class="form-group">
                <label for="">Thương hiệu</label>
                <select name="trandmark" class="form-control">
                    <option value="1">Adidas</option>
                    <option value="2">Balance</option>
                    <option value="3">Puma</option>
                    <option value="4">Balenciaga</option>
                    <option value="5">Converse</option>
                    <option value="6">Vans</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Giới tính</label>
                <select class="form-control" name="type" id="">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name = "update_product" value="Cập nhật sản phẩm">
            </div>
        </form>
    </div>
</div>
<footer>
    <?php include_once "Partials/Footer.php";?>
</footer>
</body>

</html>