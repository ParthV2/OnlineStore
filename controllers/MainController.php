<?php
  class MainController {
    
    public function home() {
      require_once('views/main/home.php');
    }
    
    public function register() {
      if(!isset($_SESSION['logged_in_user'])){
        require_once('views/main/register.php');  
      } else {
        redirect('Main', 'home');
      }
    }
    
    public function login() {
      if(!isset($_SESSION['logged_in_user'])){
        require_once('views/main/login.php');  
      } else {
        redirect('Main', 'home');
      }
    }
    
    public function cart() {
      require_once('views/main/cart.php');
    }
    
    public function product() {
      $product = ProductRepository::getProductById($_GET['id']);
      require_once('views/main/product.php');
    }

    public function error() {
      require_once('views/main/error.php');
    }
    
    public function logout(){
      unset($_SESSION['logged_in_user']);
      redirect('Main', 'home');
    }
    
    public function sell() {
      if(isset($_SESSION['logged_in_user'])){
        $user = unserialize($_SESSION['logged_in_user']);
        if($user->is_vendor){
          require_once('views/main/sell.php');
        } else {
          redirect('Main', 'error');
        }
      } else {
        redirect('Main', 'error');
      }
    }
    
    public function account() {
      if(isset($_SESSION['logged_in_user'])){
        require_once('views/main/account.php');
      } else {
        redirect('Main', 'error');
      }
    }
    
    public function editproduct(){
      if(isset($_SESSION['logged_in_user'])){
        $user = unserialize($_SESSION['logged_in_user']);
        $product = ProductRepository::getProductById($_GET['id']);
        
        if($user->id == $product->user){
          require_once('views/main/editproduct.php');
        } else {
          redirect('Main', 'error');
        }
      } else {
        redirect('Main', 'error');
      }
    }
  }
?>