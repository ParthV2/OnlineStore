<?php
  class CartController {
    
    public function add() {
        $cart = unserialize($_SESSION['shopping_cart']);
        
        $current_product = ProductRepository::getProductById($_POST['product_id']);
        if($current_product->stock > 0){
            array_push($cart, $_POST['product_id']);
            $_SESSION['shopping_cart'] = serialize($cart);
            redirect('Main', "cart");
        } else{
            redirect('Main', "error");
        }

    }
    
    public function checkout() {
            
        $cart = unserialize($_SESSION['shopping_cart']);
        
        $cartNotEmptied = [];
        
        foreach($cart as $key => $item){
            $current_product = ProductRepository::getProductById($item);
            if($current_product->stock > 0){
                $current_product->stock = $current_product->stock - 1;
                $update = ProductRepository::updateStock($current_product);
                unset($cart[$key]);
            } else{
                $cartNotEmptied[] = $item;
            }
        }

        $_SESSION['shopping_cart'] = serialize($cart);
        
        redirect('Main', "cart");
    }
    
    public function remove() {
        $cart = unserialize($_SESSION['shopping_cart']);
        
        if (($key = array_search($_POST['product_id'], $cart)) !== false) {
            unset($cart[$key]);
        }
        
        $_SESSION['shopping_cart'] = serialize($cart);
        
        redirect('Main', "cart");
    }
  }
  
?>