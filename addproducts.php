<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($className) {
    require './app/models/' . $className . '.php';
});
$productName="";
$productPrice=0.00;
$productDescription="";
$productImage="";
$notification="";
$categoryModel = new CategoryModel();
$categoryList = $categoryModel->getCategoryList();
    //thuc hien Submit
if (!empty($_POST['productName'])&&!empty($_POST['productPrice'])&&!empty($_POST['productDescription'])) {
    $productName=$_POST['productName'];
    $productPrice=$_POST['productPrice'];
    $productDescription=$_POST['productDescription'];
    $productModel = new ProductModel();
    if (!empty($_FILES['productImages']['name'])) {
        //basemane tra ve ten file
        //chuan bi duong dan luu tru tren sever
        $productImage ='public/images/'. basename($_FILES['productImages']['name']);
        //thuc hien uploaded len sevver thi khong con ten goc 
            if (is_uploaded_file($_FILES['productImages']['tmp_name'])&&
            move_uploaded_file($_FILES['productImages']['tmp_name'],$productImage))
            {
            //kt xem them thanh cong hay that bai
                if($productModel->Addproduct($productName,$productPrice,$productDescription,basename($productImage)))
                {
                    $notification="Added sucessfully";
                }
                else{
                    $notification="Added failed";
                }
            }
         }
}   
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="/<?php echo BASE_URL; ?>/public/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <form action="addproducts.php" method="post" enctype="multipart/form-data">
                        <p>
                            <?php echo $notification ?>
                        </p>
                        <h6>THÊM SẢN PHẨM:</h6>
                        <table>
                            <tr>
                                <td><label for="productName">Product Name</label></td>
                                <td><input type="text" name="productName" id="productName" value="<?php echo $productName;?>"></td>
                            </tr>
                            <tr>
                                <td><label for="productPrice">Product Price</label></td>
                                <td><input type="text" name="productPrice" id="productPrice" value="<?php echo $productPrice;?>"></td>
                            </tr>
                            <tr>
                                <td><label for="productDescription">Product Description</label></td>
                                <td><textarea name="productDescription" id="productDescription"><?php echo $productDescription;?></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="productImage">Product Image</label></td>
                                <td><input type="file" name="productImages" id="productImage"> </td>
                            </tr>
                            <tr>
                                <td><button type="submit">Submit</button></td>
                            </tr>
                        </table>
            </form>
        </div>
    </body>

    </html>