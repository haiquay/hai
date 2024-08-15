<!DOCTYPE html>
<html lang="en">
    <?php include_once __DIR__ . "/../Templates/link.php";?>
<head>
    <?php include_once __DIR__ . "/../Templates/Partials/Head.php";?>
    <?php include_once __DIR__ . "/../Templates/Partials/Header.php";?>
</head>
<body>
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 px-2 ml-2">
                    <div class="list-group">
                        <div class="list-group-item"><a href="index.php?task=pageadidas"><img src="Image/adidas.png" width="15px" alt=""> Giày Adidas</a></div>
                        <div class="list-group-item"><a href="index.php?task=pagebalance"><img src="Image/balance.png" width="15px" alt=""> Giày Balance</a></div>
                        <div class="list-group-item"><a href="index.php?task=pagepuma"><img src="Image/puma.png" width="15px" alt=""> Giày Puma</a></div>
                        <div class="list-group-item"><a href="index.php?task=pageconverse"><img src="Image/converse.png" width="15px" alt=""> Giày Converse</a></div>
                        <div class="list-group-item"><a href="index.php?task=pagebalenciaga"><img src="Image/balenciaga.png" width="15px" alt=""> Giày Balenciaga</a></div>
                        <div class="list-group-item"><a href="index.php?task=pagevans"><img src="Image/vans.png" width="15px" alt=""> Giày Vans</a></div>
                    </div>
                </div>
                <div id="banner" class="col-lg-8 ml-3">
                    <div><img src="Image/banner1.jpg" height="350px" alt=""></div>
                    <div><img src="Image/banner2.jpg" width="700px" height="350px"alt=""></div>
                    <div><img src="Image/banner3.jpg" height="350px" alt=""></div>
                    <div><img src="Image/banner4.jpg" width="700px" height="350px" alt=""></div>
                    <div><img src="Image/banner5.jpg" width="730px" height="350px" alt=""></div>
                    <div><img src="Image/banner6.jpg" width="700px" height="350px" alt=""></div>
                    <div><img src="Image/banner7.jpg" width="700px" height="350px" alt=""></div>
                </div>
            </div>
        </div>
        <div class="bg-white mb-4 mt-4">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="p-2 flex-fill">
                        <i class="icon-fake fas fa-car-side"></i> <span>Giao hàng toàn quốc</span>
                    </div>
                    <div class="p-2 flex-fill"><i class="icon-fake far fa-clock"></i> Bảo hành 1 đổi 1</div>
                    <div class="p-2 flex-fill"><i class="icon-fake fas fa-headphones-alt"></i> Tư vấn 24/7</div>
                    <div class="p-2 flex-fill"><i class="icon-fake far fa-gem"></i> Chất lượng đảm bảo</div>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="" method="POST">
                <h4 class="rounded" style="border-bottom: solid 3px #F18620; color: #E8E8E8;">
                    <div class="mt-2 p-1 bg-main rounded" style="width: 280px;">DANH SÁCH SẢN PHẨM</div>
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
                <div>
                    <!--hiển thị phân trang-->
                    <?php
                        foreach ($arr as $temp){
                            // nếu trang hiện tại lớn hơn 1 và tổng trang  lớn hơn 1 mới hiển thị nút prev
                            if ($temp['current_page'] > 1 && $temp['total_page'] > 1){
                                echo '<a href="index.php?page='.($temp['current_page']-1).'">Prev</a> | ';
                            }
                            //
                            for ($i = 1; $i <= $temp['total_page']; $i++){
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $temp['current_page']){
                                    echo '<span>'.$i.'</span> | ';
                                }
                                else{
                                    echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
                                }
                            }
                            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút next
                            if ($temp['current_page'] < $temp['total_page'] && $temp['total_page'] > 1){
                                echo '<a href="index.php?page='.($temp['current_page']+1).'">Next</a> | ';
                            }
                        }
                    ?>
                </div>
            </form>
        </div>
    </div>
<footer>
    <?php include_once __DIR__ . "/../Templates/Partials/Footer.php";?>
</footer>
    <script src="Js/jquery-3.3.1.min.js"></script>
    <script src="slick/slick-1.8.1/slick/slick.js"></script>
    <script>
        $(document).ready(function(){
            $('#banner').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
        });
    </script>
</body>
</html>