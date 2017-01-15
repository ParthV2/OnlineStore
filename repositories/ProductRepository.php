<?php
  class ProductRepository {
    public static function getProductsByCategory($category_id) {
        $products = array();
        
        $where = '';
        if($category_id != null){
         $where = " WHERE PRODUCT.category_id = ?";
        } 
        
        $conn = Database::getConnection();
        if ($stmt = $conn->prepare("SELECT * FROM PRODUCT INNER JOIN CATEGORY ON PRODUCT.category_id = CATEGORY.category_id$where;")) {

            if($category_id != null){
                $stmt->bind_param("i", $category_id);
            }
            
            $stmt->execute();

            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                array_push($products, ProductRepository::bindProduct($row));
            }

            $stmt->free_result();
            $stmt->close();
        }
        
        return $products;
    }
    
    public static function getProductById($id) {
        $conn = Database::getConnection();
        if ($stmt = $conn->prepare("SELECT * FROM PRODUCT INNER JOIN CATEGORY ON PRODUCT.category_id = CATEGORY.category_id WHERE PRODUCT.product_id = ?;")) {

            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                $product = ProductRepository::bindProduct($row);
            }

            $stmt->free_result();
            $stmt->close();
        }
        
        return $product;
    }
    
    public static function getProductsByIds($product_ids) {
        $products = array();
        
        $conn = Database::getConnection();
        
        $ids = '';
        
        foreach($product_ids as $key=>$value){
            $ids = "$ids $value";
            if($key != count($product_ids) - 1){
                $ids = "$ids,";
            }
        }
        
        if ($stmt = $conn->prepare("SELECT * FROM PRODUCT INNER JOIN CATEGORY ON PRODUCT.category_id = CATEGORY.category_id WHERE PRODUCT.product_id IN ($ids);")) {
            $stmt->execute();
            
            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                array_push($products, ProductRepository::bindProduct($row));
            }

            $stmt->free_result();
            $stmt->close();
        }
        
        return $products;
    }
    
    public static function addProduct($product){
        $conn = Database::getConnection();
        if ($stmt = $conn->prepare("INSERT INTO PRODUCT
            (product_name, category_id, product_short_description, product_price, product_image_name, product_long_description, product_stock, user_id)
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?);")) {
            $stmt->bind_param("sisdssii", $product->name, $product->category->id, $product->short_description, $product->price, $product->image, $product->long_description, $product->stock, $product->user->id);
            $stmt->execute();
            $stmt->close();
        }
    }
    
    public static function updateStock($product){
        $conn = Database::getConnection();
        if($smst = $conn->prepare("UPDATE PRODUCT SET product_stock=? WHERE product_id=?;")){
            $smst->bind_param("ii", $product->stock, $product->id);
            $smst->execute();
            $smst->close();
        }

    }
    
    public static function updateProduct($product){
        $conn = Database::getConnection();
        if($smst = $conn->prepare("UPDATE PRODUCT SET product_name=?, category_id=?, product_short_description=?, product_price=?, product_image_name=?, product_long_description=?, product_stock=? WHERE product_id=?;")){
            $smst->bind_param("sisdssii", $product->name, $product->category->id, $product->short_description, $product->price, $product->image, $product->long_description, $product->stock, $product->id);
            $smst->execute();
            $smst->close();
        }
    }
    
    public static function deleteProduct($product){
        $conn = Database::getConnection();
        if($smst = $conn->prepare("DELETE FROM PRODUCT WHERE product_id=?;")){
            $smst->bind_param("s", $product->id);
            $smst->execute();
            $smst->close();
        }
    }
    
    public static function getProductsByUserId($user_id){
        $products = array();
        
        $conn = Database::getConnection();
        if ($stmt = $conn->prepare("SELECT * FROM PRODUCT INNER JOIN CATEGORY ON PRODUCT.category_id = CATEGORY.category_id WHERE PRODUCT.user_id=?;")) {
            
            $stmt->bind_param("i", $user_id);
            $stmt->execute();

            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                array_push($products, ProductRepository::bindProduct($row));
            }

            $stmt->free_result();
            $stmt->close();
        }
        
        return $products;
    }
    
    public static function bindProduct($row){
        $product = new Product();
        $product->id = $row['product_id'];
        $product->name = $row['product_name'];
        $product->category = CategoryRepository::bindCategory($row);
        $product->short_description = $row['product_short_description'];
        $product->long_description = $row['product_long_description'];
        $product->price = $row['product_price'];
        $product->image = $row['product_image_name'];
        $product->stock = $row['product_stock'];
        $product->user = $row['user_id'];
        return $product;
    }
  }
?>