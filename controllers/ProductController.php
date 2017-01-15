<?php
  class ProductController {
    
    public function view() {
      require_once('views/main/product.php');
    }
    
    public function add(){
      if(isset($_SESSION['logged_in_user'])){
        $user = unserialize($_SESSION['logged_in_user']);
        if($user->is_vendor){
          $product = new Product();
          $product->name = $_POST['name'];
          $product->short_description = $_POST['short_description'];
          $product->long_description = $_POST['long_description'];
          $product->price = $_POST['price'];
          $product->stock = $_POST['stock'];
          $product->category = new Category();
          $product->category->id = $_POST['category'];
          $product->image = $_POST['image'];
          $product->user = $user;
          
          ProductRepository::addProduct($product);
          redirect('Main', 'account');
        } else {
          redirect('Main', 'error');
        }
      } else {
        redirect('Main', 'error');
      }
    }
    
    public function edit(){
      if(isset($_SESSION['logged_in_user'])){
        $user = unserialize($_SESSION['logged_in_user']);
        $product = ProductRepository::getProductById($_POST['product_id']);
        
        $product->name = $_POST['name'];
        $product->short_description = $_POST['short_description'];
        $product->long_description = $_POST['long_description'];
        $product->price = $_POST['price'];
        $product->stock = $_POST['stock'];
        $product->category = new Category();
        $product->category->id = $_POST['category'];
        $product->image = $_POST['image'];
        
        if($user->id == $product->user){
          ProductRepository::updateProduct($product);
          redirect('Main', 'account');
        } else {
          redirect('Main', 'error');
        }
      } else {
        redirect('Main', 'error');
      }
    }
    
    public function remove(){
      if(isset($_SESSION['logged_in_user'])){
        $user = unserialize($_SESSION['logged_in_user']);
        $product = ProductRepository::getProductById($_POST['product_id']);
        
        if($user->id == $product->user){
          ProductRepository::deleteProduct($product);
          redirect('Main', 'account');
        } else {
          redirect('Main', 'error');
        }
      } else {
        redirect('Main', 'error');
      }
    }
  }
?>