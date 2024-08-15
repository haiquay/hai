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
        <h4 class="rounded" style="border-bottom: solid 3px #F18620; color: #E8E8E8;">
            <div class="mt-2 p-1 bg-main rounded" style="width: 220px;">GIÀY BALENCIAGA</div>
        </h4>
        <div class="row mx-auto">
            <?php
            while ($row = pg_fetch_assoc($result)){ ?>
                <div class="product">
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
<footer>
    <?php include_once "Partials/Footer.php";?>
</footer>
</body>

</html>