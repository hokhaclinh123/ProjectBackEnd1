<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($className) {
    require './app/models/' . $className . '.php';
});
session_start();
$path = explode('-', $_SERVER['REQUEST_URI']);
$id = $path[count($path) - 1];

$sessionView = "";
$productModel = new ProductModel();
if (isset($_SESSION["'Views_' . $id"])) {
    $sessionView = $_SESSION["'Views_' . $id"];
}
if (!$sessionView) { // nếu chưa có session
    $_SESSION["'Views_' . $id"] = 1; //set giá trị cho session
    $productModel->views($id);
}

$item = $productModel->getProductById($id);

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
    <link rel="stylesheet" href="/<?php echo BASE_URL; ?>/public/css/style_product.css">
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
        </nav>
    </header>
    <!-- Hiển thị chi tiết sản phẩm-->
    <div class="container">

        <div class="row">
            <?php
            $img = explode("/", $item['product_image']);
            ?>
            <div class="col-md-4 gallery">
                <img src="/<?php echo BASE_URL; ?>/public/images/<?php echo $img[0] ?> " alt="" class="img-fluid" id="main-photo">
                <div class="row mx-n1 thumbnails">
                    <div class="col-4 px-1 pt-2"><img src="/<?php echo BASE_URL; ?>/public/images/<?php echo $img[1] ?> " alt="" class="img-fluid"></div>
                    <div class="col-4 px-1 pt-2"><img src="/<?php echo BASE_URL; ?>/public/images/<?php echo $img[2] ?> " alt="" class="img-fluid"></div>
                    <div class="col-4 px-1 pt-2"><img src="/<?php echo BASE_URL; ?>/public/images/<?php echo $img[3] ?> " alt="" class="img-fluid"></div>
                </div>
            </div>
            <div class="col-md-8">
                <h3><?php echo $item['product_name']; ?></h3>
                <label>Giá: &nbsp </label><span class="product-price"><?= number_format($item['product_price'], 0, ",", ".") ?> VNĐ</span><br />
                <div class="soluong">
                    <h4><?php
                        if ($item['product_quantity'] > 0) {
                            echo "Còn hàng";
                        } else {
                            echo "Hết hàng";
                        }
                        ?></h4>
                </div>
                <div class="luotxem">
                    <i class="fas fa-eye"></i>
                    <?php echo $item['product_views']; ?>
                    <label> lượt xem

                    </label>
                </div>
                <h4>THÔNG SỐ KỸ THUẬT</h4>
                <table>

                    <?php
                    $arrDes = explode(';', $item['product_description']);
                    foreach ($arrDes as $value) {
                        echo "<tr>";
                        $arr = explode('/', $value);
                        foreach ($arr as $Des) {
                            ?>
                            <?php echo "<td>" . $Des . "</td>" ?>
                    <?php
                        }
                        echo "</tr>";
                    }
                    ?>
                </table>
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
    <script src="/<?php echo BASE_URL; ?>/public/js/jquery-3.4.1.min.js"></script>
    <script src="/<?php echo BASE_URL; ?>/public/js/jav.js"></script>
</body>

</html>