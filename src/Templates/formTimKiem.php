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
        <div style="border-bottom: 2px solid black;" class="mb-4">
            <p class="t-tittle">KẾT QUẢ TÌM KIẾM</p>
        </div>
        <div class="row mx-auto">
            <?php
            if (pg_fetch_assoc($result)>0){
            while ($row = pg_fetch_assoc($result)){ ?>
                <div class="product">
                    <div class="product-details">
                        <div class="image-shoe">
                            <div><img class="image" src="<?php echo $row['image'];?>" alt=""></div>
                            <div class="middle">
                                <a style="color: #E8E8E8;" class="text" href="index.php?task=detail&id=<?php echo $row['id_product']; ?>">Xem hàng</a>
                            </div>
                        </div>
                        <div class="info-shoe">
                            <p class="p-name-product"><?php echo $row['name_product']?></p>
                            <p class="p-price-product"><?php echo number_format($row['price'],0,'.','.')?> đồng</p>
                        </div>
                    </div>
                </div>
            <?php }}else{ ?>
                <p class="alert alert-danger text-center">Không tìm thấy kết quả nào !</p>
            <?php } ?>
        </div>
    </div>
</div>
<footer>
    <?php include_once "Partials/Footer.php";?>
</footer>
</body>

</html>