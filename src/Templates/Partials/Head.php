<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<div class="bg-main">
    <div class="container">
        <nav class="navbar navbar-light">
            <div class="col-2"><a href="index.php?task=pagehome"><img width="100px"  src="Image/logo.png"></a></div>
            <div class="col-5">
                <form class="form-inline my-2 my-lg-0" method="POST">
                    <input style="min-width: 250px;" class="form-control mr-sm-0" type="search" name="text_search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                    <button class="btn btn-outline-light menu my-2 my-sm-0" type="submit" name="search"><i class="fas fa-search"></i> Tìm kiếm</button>
                </form>
            </div>
            <div class="navbar">
                <div>
                    <?php if (isset($_SESSION['username'])){
                            if ($_SESSION['level'] ==2){ ?>
                            <a href="index.php?task=pageuser" class="btn btn-outline-light menu"><?php echo $_SESSION['username']?></a>
                            <a href="index.php?task=logout" class="btn btn-outline-light menu">Đăng xuất</a>
                    <?php }elseif ($_SESSION['level']==1){ ?>
                            <a href="" class="btn btn-outline-light menu"><?php echo $_SESSION['username']?></a>
                            <a href="index.php?task=logout" class="btn btn-outline-light menu">Đăng xuất</a>
                    <?php }?>
                    <?php }else{ ?>
                    <a href="index.php?task=pagelogin" class="btn btn-outline-light menu">
                        <i class="fas fa-user"></i>Tài khoản
                    </a>
                    <?php } ?>
                </div>
                <div>
                    <a href="index.php?task=cart" class="btn btn-outline-light menu">
                        <i class="fas fa-shopping-cart"></i>
                        <label class="label-cart">
                            <?php
                                echo count($_SESSION['cart']);
                            ?>
                        </label>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
