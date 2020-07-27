<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($className) {
    require './app/models/' . $className . '.php';
});
$path = explode('-', $_SERVER['REQUEST_URI']);
$catId = $path[count($path) - 1];
$productModel = new ProductModel();

$productList = $productModel->getProductByCategory($catId);

$categoryModel = new CategoryModel();
$categoryList = $categoryModel->getCategoryList();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/<?php echo BASE_URL; ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/<?php echo BASE_URL; ?>/public/fontawesome/css/all.css">
    <link rel="stylesheet" href="/<?php echo BASE_URL; ?>/public/css/style_index.css">
</head>

<body>
    <header class="top_header">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/<?php echo BASE_URL; ?>/index.php"><i class="fas fa-home"></i></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <?php
                        foreach ($categoryList as $cat) {
                            $catName = strtolower(str_replace(' ', '-', $cat['category_name']));
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/<?php echo BASE_URL; ?>/category.php/<?php echo $catName . '-' . $cat['category_id'] ?>">
                                    <?php echo $cat['category_name'] ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" method="get" action="/<?php echo BASE_URL ?>/result.php">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" name="keyword">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
            </div>
        </nav>
    </header>

    <!-- Hiển thị danh sách sản phẩm (Giống nhau ở các trang) -->
    <div class="container">
        <div class="product-items">
            <div class="row">
                <?php
                foreach ($productList as $item) {
                    $pName = strtolower(str_replace(' ', '-', $item['product_name']));
                    ?>
                    <div class="col-md-4 col-12 mb-lg-5 mb-4">
                        <div class="product-item">
                            <div class="product-image">
                                <?php
                                    $img = explode("/", $item['product_image']);
                                    ?>
                                <img src="/<?php echo BASE_URL; ?>/public/images/<?php echo $img[0] ?> " alt="" class="img-fluid">
                            </div>
                            <div class="product-name">
                                <h6>
                                    <a href="/<?php echo BASE_URL; ?>/product.php/<?php echo $pName . '-' . $item['product_id']; ?>">
                                        <?php echo $item['product_name']; ?>
                                    </a>
                                </h6>
                            </div>
                            <label>Giá: &nbsp </label><span class="product-price"><?= number_format($item['product_price'], 0, ",", ".") ?> VNĐ</span><br />
                            <!-- <p class="desc">
                                    <?php echo substr($item['product_description'], 0, 35); ?>
                                    <a href="/<?php echo BASE_URL; ?>/product.php/<?php echo $pName . '-' . $item['product_id']; ?> ">
                                        <?php echo "[...]"; ?> </a>
                                </p> -->
                            <div class="buy-button">
                                <a href="#">Mua sản phẩm</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer_pd">
                    <div class="footer_item">
                        <ul class="form_text">
                            <h3>Liên kết nhanh</h3>
                            <?php
                            foreach ($categoryList as $cat) {
                                $catName = strtolower(str_replace(' ', '-', $cat['category_name']));
                                ?>
                                <li>
                                    <a href="/<?php echo BASE_URL; ?>/category.php/<?php echo $catName . '-' . $cat['category_id'] ?>">ĐỒNG HỒ <?php echo $cat['category_name'] ?></a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 footer_pd">
                    <div class="footer_item">
                        <ul class="form_text">
                            <h3>Dành cho người dùng</h3>
                            <li><a href="#" title="Hướng dẫn thanh toán" class="smooth hvnau fs16">Hướng dẫn thanh toán</a></li>
                            <li><a href="#" title="Chính sách bảo mật thông tin" class="smooth hvnau fs16">Chính sách bảo mật thông tin</a></li>
                            <li><a href="#" title="Chính sách đổi trả" class="smooth hvnau fs16">Chính sách đổi trả</a></li>
                            <li><a href="#" title="Chính sách vận chuyển" class="smooth hvnau fs16">Chính sách vận chuyển</a></li>
                            <li><a href="#" title="Chính sách bảo hành sản phẩm" class="smooth hvnau fs16">Chính sách bảo hành sản phẩm</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 footer_pd">
                    <div class="footer_item">
                        <form action="#" method="POST">
                            <h3>Newsletter</h3>
                            <p class="form_text">Receive a 10% discount code via email when you sign up for our Store offers &amp; updates.</p>
                            <p><input type="email" name="Email" placeholder="Enter your email"></p>
                            <p><button type="submit" class="btn">Subscribe</button></p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer_last">
                <div class="row">
                    <div class="col-md-6">
                        © 2019.<a href="#">POWERED BY SHOP</a>
                    </div>
                    <div class="col-md-6">
                        <ul class="footer_payments">

                            <li><i class="fab fa-cc-mastercard" aria-hidden="true"></i></li>

                            <li><i class="fab fa-cc-paypal" aria-hidden="true"></i></li>

                            <li><i class="fab fa-cc-visa" aria-hidden="true"></i></li>

                        </ul>
                    </div>
                </div>
                <div class="to-top">
                    <a id="back_top" href="#">
                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>