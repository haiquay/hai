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
<div class="bg-light mb-5">
    <div class="container" style="height: 100%; min-height: 400px;">
        <div style="border-bottom: 2px solid black;" class="mb-4">
            <p class="t-tittle">Giỏ hàng (<?php echo count($_SESSION['cart'])?> Sản phẩm)</p>
        </div>
        <form action="" method="POST">
            <div class="row mx-auto">
                <table class="table text-center">
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Size</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    <?php
                    $total = 0;
                    for($i=0; $i < count($_SESSION['cart']); $i++) { ?>
                        <tr>
                            <?php foreach ($data[$i]['product_info'] as $item) { ?>
                                <td>
                                    <?php echo $i+1; ?>
                                </td>
                                <td>
                                    <img width="200px" height="200px" src="<?php echo $data[$i]['product_info'][0]['image']; ?>" alt="">
                                </td>
                                <td>
                                    <?php echo $item['name']; ?>
                                </td>
                                <td>
                                    <?php echo $_SESSION['cart'][$i]['size']; ?>
                                </td>
                                <td>
                                    <?php echo $data[$i]['quantity']; ?>
                                </td>
                                <td>
                                    <?php
                                        $_SESSION['sub_total'] = $item['price'] * $data[$i]['quantity'];
                                        echo number_format($_SESSION['sub_total'],0,'.','.');
                                    ?>
                                </td>
                                <td>
                                    <a class="text-danger" href="?task=del_cart&id=<?php echo $item['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            <?php }?>
                        </tr>
                    <?php
                        $total += $item['price'] * $data[$i]['quantity'];
                        $_SESSION['total'] = $total;
                    } ?>
                </table>
                <div class="font-weight-bold">
                    <?php
                        echo "Tổng tiền: ".number_format($total,0,'.','.')." VNĐ";
                    ?>
                </div>
            </div>
            <div><input class="btn btn-danger float-right" type="submit" name="payment" value="Thanh toán"></div>
        </form>
    </div>
</div>
<?php include_once "link.php";?>
<footer>
    <?php include_once "Partials/Footer.php";?>
</footer>
<script>
    $("input[name='quantity']").TouchSpin({
        initval: 1,
        min: 1,
        max: 20
    });
</script>
</body>

</html>