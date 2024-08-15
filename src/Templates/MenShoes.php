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
        <div class="row">
            <!--<div class="col-lg-3">
                <div class="list-group">
                    <div class="list-group-item"><label for="">Thương Hiệu</label></div>
                    <div class="list-group-item">
                        <div><input name="converse" type="checkbox"> Converse</div>
                        <div><input name="adidas" type="checkbox"> Adidas</div>
                        <div><input name="pumu" type="checkbox"> Puma</div>
                        <div><input name="balaciaga" type="checkbox"> Balanciaga</div>
                        <div><input name="vans" type="checkbox"> Vans</div>
                        <div><input name="blance" type="checkbox"> Blance</div>
                        <br>
                        <div><input class="btn btn-warning" type="submit" name="tim" value="Tìm kiếm"></div>
                    </div>
                </div>
            </div>-->
            <div class="">
                <h4 class="rounded" style="border-bottom: solid 3px #F18620; color: #E8E8E8;">
                    <div class="mt-2 p-1 bg-main rounded" style="width: 250px;">GIÀY THỂ THAO NAM</div>
                </h4>
                <div class="row mx-auto">
                    <?php
                    while ($row = pg_fetch_assoc($result)){ ?>
                        <div class="product mr-2">
                            <div class="product-details">
                                <div class="image-shoe">
                                    <img class="image" src="<?php echo $row['image'];?>" alt="">
                                    <div class="middle">
                                        <a style="color: #E8E8E8;" class="text" href="index.php?task=detail&id=<?php echo $row['id_product']; ?>">Xem hàng</a>
                                    </div>
                                </div>
                                <div class="info-shoe">
                                    <a class="p-name-product" href="index.php?task=detail&id=<?php echo $row['id_product']; ?>"><?php echo $row['name_product']?></a>
                                    <p class="p-price-product"><?php echo number_format($row['price'],0,'.','.')?> đồng</p>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <?php include_once "Partials/Footer.php";?>
</footer>
</body>

</html>