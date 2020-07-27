<?php
class ProductModel extends Db
{
    // Lấy tất cả sản phẩm
    public function getPageProductList($perPage,$page)
    {
        // Bước 2: Tạo câu query
        $start=($page-1)*$perPage;
        $sql = parent::$connection->prepare("SELECT * FROM products LIMIT $start,$perPage");
        return parent::select($sql);
    }
//  // Lấy tất cả sản phẩm
//     public function getProductList()
//     {
//         // Bước 2: Tạo câu query
//         $sql = parent::$connection->prepare("SELECT * FROM products");
//         return parent::select($sql)[0];
//     }

    //Lấy tong so SP
    public function getTotalProduct()
    {
        // Bước 2: Tạo câu query
        $sql = parent::$connection->prepare('SELECT COUNT(product_id) FROM products');
        return parent::select($sql)[0]["COUNT(product_id)"];
    }

    //Lấy sp theo ID
    public function getProductById($id)
    {
        $sql = parent::$connection->prepare('SELECT * FROM products WHERE product_id=?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
    //Lấy Last ID SP
    public function getIdByProduct()
    {
        $sql = parent::$connection->prepare('SELECT MAX(`product_id`) FROM products');
        return $sql->execute();
    }
    //Lấy sp theo danh mục
    public function getProductByCategory($catId)
    {
        $sql = parent::$connection->prepare('SELECT * FROM products INNER JOIN product_category ON products.product_id = product_category.product_id WHERE product_category.category_id = ?');
        $sql->bind_param('i', $catId);
        return parent::select($sql);
    }

    //Lấy sp theo từ khóa
    public function searchProduct($keyword)
    {
        $search = "%{$keyword}%";
        $sql = parent::$connection->prepare('SELECT * FROM products WHERE product_name LIKE ?');
        $sql->bind_param('s', $search);
        return parent::select($sql);
    }
    //Them sp
    public function Addproduct($productName,$productPrice,$productDescription,$productImage)
    {
        $sql = parent::$connection->prepare('INSERT INTO `products` ( `product_name`, `product_price`, `product_description`, `product_image`) VALUES ( ?, ?, ?, ?);');
        $sql->bind_param('sdss',$productName,$productPrice,$productDescription,$productImage);
        return $sql->execute();
    }
    //Sua sp
    public function Updateproduct($productName,$productPrice,$productDescription,$productImage,$productId)
    {
        $sql = parent::$connection->prepare('UPDATE `products` SET `product_name` = ?, `product_price` = ?, `product_description` = ?, `product_image` = ? WHERE `products`.`product_id` = ?');
        $sql->bind_param('sdssi',$productName,$productPrice,$productDescription,$productImage,$productId);
        return $sql->execute();
    }
    //Delete Sp
    public function DeleteProductById($productId)
    {
        $sql = parent::$connection->prepare('DELETE FROM `products` WHERE `products`.`product_id` = ?');
        $sql->bind_param('i', $productId);
        return $sql->execute();
    }
    //Chèn sp theo danh mục
    public function insertProductByCategory($id,$catId)
    {
        $sql = parent::$connection->prepare('INSERT INTO `product_category` (`product_id`, `category_id`) VALUES ( ? , ?);');
        $sql->bind_param('ii',$id, $catId);
        return $sql->execute();
    }
    //lượt xem sản phẩm
    public function views($id)
    {
        $sql = parent::$connection->prepare(' UPDATE `products` SET `product_views`=`product_views` + 1 WHERE `product_id` = ?');
        $sql->bind_param('i',$id);
        return $sql->execute();
    }
   

}
