<?php
  function call($controller, $action) {
      
    require_once('controllers/' . $controller . 'Controller.php');

    // create a new instance of the needed controller
    switch($controller) {
      case 'Main':
        $controller = new MainController();
        break;
      case 'User':
        $controller = new UserController();
        break;
      case 'Product':
        $controller = new ProductController();
        break;
      case 'Cart':
        $controller = new CartController();
        break;
    }

    $controller->{ $action }();
  }
  
  function redirect($controller, $action, $query=''){
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '?controller=' . $controller . '&action=' . $action . $query;
    header("location: $uri/$extra");
    exit;
  }

//List of All Controllers and Actions

  $controllers = array(
    'Main' => ['home', 'error', 'register', 'login', 'cart', 'product', 'logout', 'sell', 'account', 'editproduct'],
    'User' => ['register', 'login', 'cart'],
    'Product' => ['view', 'add', 'edit', 'remove'],
    'Cart' => ['add', 'remove', 'checkout']
  );


  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('Main', 'error');
    }
  } else {
    call('Main', 'error');
  }
?>