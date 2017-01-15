<?php
  session_start();
  require_once('config/dbconnect.php');

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'Main';
    $action     = 'home';
  }
  
  foreach (glob("models/*.php") as $filename)
  {
    include $filename;
  }
  
  foreach (glob("repositories/*.php") as $filename)
  {
    include $filename;
  }
  
  if(!isset($_SESSION['shopping_cart'])){
    $_SESSION['shopping_cart'] = serialize(array());
  }
  
  require_once('views/layout.php');
?>