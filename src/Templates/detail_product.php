<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "Partials/Head.php";?>
</head>
<body>
<nav>
    <?php include_once "Partials/Header.php";?>
</nav>
<div class="bg-light">
    <?php foreach ($data as $product) { ?>
    <div class="container">
        <div class="row mx-auto mt-2 mb-2">
            <div class="col-4">
                <img width="300px" height="300px" src="<?php echo $product['image']?>" alt="">
            </div>
            <div class="col-8">
                <form action="" method="post">
                <table class="mb-5">
                    <tr>
                        <td class="p-1"><label for="">Tên sản phẩm</label></td>
                        <td><?php echo $product['name']?></td>
                    </tr>
                    <tr>
                        <td class="p-1"><label for="">Thương hiệu</label></td>
                        <td><?php echo $product['trandmark']?></td>
                    </tr>
                    <tr>
                        <td class="p-1"><label for="">Giá tiền</label></td>
                        <td><?php echo $product['price']?> VND</td>
                    </tr>
                    <tr>
                        <td class="p-1"><label for="">Kiểu giày</label></td>
                        <td><?php echo $product['type']?></td>
                    </tr>
                    <tr>
                        <td class="p-1">
                            <label for="">Size</label></td>
                        <td>
                            <?php if(count($product['size']) != 0) {?>
                                <?php foreach ($product['size'] as $size) { ?>
                                    <div class="custom-control custom-control-inline custom-radio">
                                        <input type="radio" id="<?php echo $size['id'] ?>" value="<?php echo $size['name'] ?>" name="size" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="<?php echo $size['id'] ?>"><?php echo $size['name'] ?></label>
                                    </div>
                                <?php } ?>
                            <?php } else {
                                echo 'Chưa nhập';
                            } ?>
                        </td>
                    </tr>
                </table>
                <div>
                    <input type="hidden" value="<?php echo $product['id'] ?>" name="id">
                    <input id="quantity" type="text" value="" name="quantity">
                    <input class="btn btn-danger" type="submit" name="btn-cart" value="THÊM VÀO GIỎ HÀNG">
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<footer>
    <?php include_once "Partials/Footer.php";?>
</footer>
<?php include_once "link.php";?>
<script>
    $("input[name='quantity']").TouchSpin({
        initval: 1,
        min: 1,
        max: 20
    });
</script>
</body>

</html>