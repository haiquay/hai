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
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#listproduct">Danh sách sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#addproduct">Thêm sản phẩm</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="listproduct" class="container tab-pane active">
                        <h3 class="text-center">Danh sách sản phẩm</h3><!--Danh sach san pham-->
                        <div class="text-center">
                            <table class="table text-center w-100">
                                <tr>
                                    <th>ID</th>  <!--lam tiep-->
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Thương hiệu</th>
                                    <th>Size</th>
                                    <th>Số lượng </th>
                                    <th>Giới tính</th>
                                    <th>Hình ảnh</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                <?php foreach($listProduct as $row){ ?>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $row['trandmark'] ?></td>
                                    <td width="190">
                                        <?php foreach ($row['size'] as $product_size) { ?>
                                            <span class="text-white rounded m-2 p-1 bg-main"><?php echo $product_size['name'] ?></span>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $row['quantity'] ?></td>
                                    <td><?php echo $row['type'] ?></td>
                                    <td><img width="90px" height="90px" src="<?php echo $row['image']?>" alt=""></td>
                                    <td><a class="text-success" href="index.php?task=editproduct&id=<?php echo $row['id']; ?>"><i class="far fa-edit"></i></a></td>
                                    <td><a class="text-danger" href="index.php?task=deleteproduct&id=<?php echo $row['id'];?>"><i class="far fa-trash-alt"></i></a></td>
                                    </tr>
                                <?php }; ?>
                            </table>
                        </div>
                        <!--code database-->
                    </div>
                    <div id="addproduct" class="container tab-pane fade"> <!--Thêm sản phẩm-->
                        <h3 class="text-center">Thêm sản phẩm</h3>
                        <form method="POST" action="" enctype="multipart/form-data" id="form-add-product">
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input class="form-control" type="text" name="name_product" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="">Giá sản phẩm</label>
                                <input class="form-control" type="number" name="price" placeholder="Giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="">Số lượng</label>
                                <input class="form-control" type="number" name="quanity" placeholder="Số lượng">
                            </div>
                            <label>Kích cỡ</label>
                            <?php while($row = pg_fetch_assoc($listSize)) { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="size[]" class="custom-control-input" value="<?php echo $row['id']?>" id="<?php echo $row['id']?>">
                                    <label class="custom-control-label" for="<?php echo $row['id']?>"><?php echo $row['name']?></label>
                                </div>
                            <?php } ?>
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
                                <label for="">Ảnh</label>
                                <input type="file" name="imagefile" id="imagefile">
                            </div>
                            <br>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary btn-add-product" name="add_product" value="Thêm sản phẩm">
                            </div>
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