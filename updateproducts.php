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
$note="";
$id="";
$idUrl="";
//lay  chi tiet sp can sua
if(isset($_GET['id'])){
       $id=$_GET['id'];
       $idUrl="?id=$id";
       $productModel = new ProductModel();
       $item = $productModel->getProductById($id);
       $productName= $item['product_name'];
       $productPrice=$item['product_price'];
       $productDescription=$item['product_description'];
       $productImage=$item['product_image'];
    }
    //thuc hien Submit
if (!empty($_POST['productName'])&&!empty($_POST['productPrice'])&&!empty($_POST['productDescription'])) {
    $productName=$_POST['productName'];
    $productPrice=$_POST['productPrice'];
    $productDescription=$_POST['productDescription'];
    $productModel = new ProductModel();
    if (isset($_GET['id'])) {
      //Update sp
      if (!empty($_FILES['productImages']['name'])) {
        //basemane tra ve ten file
        //chuan bi duong dan luu tru tren sever
        $productImage ='public/images/'. basename($_FILES['productImages']['name']);
      
        //thuc hien uploaded len sevver thi khong con ten goc 
            if (is_uploaded_file($_FILES['productImages']['tmp_name'])&&
            move_uploaded_file($_FILES['productImages']['tmp_name'],$productImage))
            {
            //kt xem them thanh cong hay that bai
            if($productModel->Updateproduct($productName,$productPrice,$productDescription,basename($productImage),$id)){
                $notification="Update sucessfully";
            }
            else{
                $notification="Update failed";
            }
        }
    }
    else{
        $productImage = $_POST['oldProductImage'];
        if($productModel->Updateproduct($productName,$productPrice,$productDescription,basename($productImage),$id)){
            $notification="Update sucessfully";
        }
        else{
            $notification="Update failed";
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
        <p> <?php echo $notification ?></p>
            <form action="updateproducts.php<?php echo $idUrl?>" method="post" enctype="multipart/form-data">
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
                                <td>
                                    <input type="hidden" name="oldProductImage" value="<?php echo $productImage;?>">
                                    <input type="file" name="productImages" id="productImage">
                                 </td>

                            </tr>
                        </table>
                <button type="submit">Submit</button>
            </form>
        </div>
    </body>

    </html>