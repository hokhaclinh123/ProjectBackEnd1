<?php
session_start();

require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($className) {
    require './app/models/' . $className . '.php';
});
$productModel = new ProductModel();
$perPage = 9;
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
//Xoa Sp
$notification = "";
$note = "";
$productId = "";
if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    $productModel = new ProductModel();
    if ($productModel->DeleteProductById($productId)) {
        $notification = "Delete sucessfully";
        $note = "alert-success";
    } else {
        $notification = "Delete failed";
        $note = "alert-success";
    }
}
$totalRow = $productModel->getTotalProduct();

$productList = $productModel->getPageProductList($perPage, $page);
$pagination = new Pagination();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/<?php echo BASE_URL; ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/<?php echo BASE_URL; ?>/public/css/style_manageproduct.css">
</head>
<script>
    function deleteProduct() {
        //xac nhan xoa
        return confirm("Do you want delete Product ?");
    }
</script>

<body>
    <?php
    if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
    ?>
    <p class="alert <?php echo $note ?>"><?php echo $notification ?></p>
    <div class="row">
        <div class="col-md-6"> <a href="addproducts.php" class="btn btn-primary">Add product</a>
        </div>
        <div class="col-md-6"> <a href="logout.php" class="btn btn-primary" style="margin-left: 10rem; background:slateblue;border-radius: 10px;" ;>Logout</a>
        </div>
    </div>
    <table class="table">
        <tr>
            <td class="name_table" ;>Product name</td>
            <td class="name_table" ;>Action</td>
        </tr>

        <?php
        foreach ($productList as $item) {
            ?>
            <tr>
                <td><?php echo $item['product_name']; ?></td>
                <td>
                    <!-- Update -->
                    <a href="updateproducts.php?id=<?php echo $item['product_id']; ?>" class="btn btn-primary">Update</a>
                    <!-- Delete -->
                    <form action="manageproduct.php" method="post" onsubmit="return deleteProduct();">
                        <input type="hidden" name="productId" value="<?php echo $item['product_id']; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>
    <div class="page">
        <?php
        echo $pagination->createPageLinks('manageproduct.php', $totalRow, $perPage, $page);
        ?>
    </div>

    <?php
    } else {
        header('location:index.php');
    }
    ?>
</body>

</html>