<?php
  class UserController {
    public function register() {
      $user = new User();
      $user->first_name = $_POST['firstName'];
      $user->last_name = $_POST['lastName'];
      $user->email = $_POST['email'];
      $user->password =md5($_POST['password']);
      $passwordConfirmation = md5($_POST['passwordConfirmation']);
      $user->address = $_POST['address'];
      $user->city = $_POST['city'];
      $user->state = $_POST['state'];
      $user->zip = $_POST['zip'];
      $user->is_vendor = (isset($_POST['isSeller'])) ? 1 : 0;;
      
      if($user->password != $passwordConfirmation){
        $password_error = true;
        require_once('views/main/register.php');
        return;
      }
      
      $existing_user = UserRepository::getUserByEmail($user->email);
      
      if($existing_user != null){
        $email_error = true;
        require_once('views/main/register.php');
        return;
      }
      
      UserRepository::register($user);
       
      redirect('Main', 'login');
    }
    
    public function login(){
      $email =  $_POST['email'];
      $password = md5($_POST['password']);
      
      $user = UserRepository::login($email, $password);
      
      if($user != null){
        $user->password = null;
        $_SESSION['logged_in_user'] = serialize($user);
        redirect('Main', 'home');
      } else {
        $login_error = true; 
        require_once('views/main/login.php');
      }
    }
  }
?>