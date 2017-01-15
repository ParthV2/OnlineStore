<DOCTYPE html>
<html>
  <head>
    <script src="scripts/jquery.js"></script>
    <link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <link href="styles/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="styles/core.css">
		<title>OU Store</title>
	</head>
  <body>
    <div id="mainContainerDiv" class="container-fluid">
      <header>
        <!-- HEADER -->
        <div class="row header">
                  <div class="col-md-8">
                    <a href="/?controller=Main&action=home">
                      <img src="images/logo.png" style="width: 20%; float: left">
                    </a>
                  </div>
                  <div class="col-md-4">
                      <div class="row">
                          <ul class="row pull-right userLinks">
                              <?php
                                if(isset($_SESSION['logged_in_user'])){
                                  $user = unserialize($_SESSION['logged_in_user']);
                                  echo '<a id="user_name" href="/?controller=Main&action=account">' . $user->first_name . ' ' . $user->last_name . '</a>';
                                  
                                  if($user->is_vendor){
                                    echo '<a href="/?controller=Main&action=sell">Sell</a>';
                                  }
                                  
                                  echo '<a id="logout" href="/?controller=Main&action=logout">Logout</a>';
                                } else {
                                  echo '<a id="register" href="/?controller=Main&action=register">Register</a>';
                                  echo '<a id="sign_in" href="/?controller=Main&action=login">Sign in</a>';
                                }
                                
                              ?>
                              <a href="/?controller=Main&action=cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a>
                          </ul>
                      </div>
                      <!--div class="row searchForm">
                          <div class="input-group stylish-input-group">
                              <input type="text" placeholder="Search" class="form-control searchBox">
                              <span class="input-group-addon" style="padding: 0px">
                                  <button type="submit" class="btn btn-info searchButton">
                                      <i class="fa fa-search" aria-hidden="true" style="font-size: 20px; color: black"></i>
                                  </button>  
                              </span>
                          </div>
                      </div-->
                  </div>
              </div>
        
        <!-- NAV BAR -->
			  <!--div class="row">
				  <div class="collapse navbar-collapse" id="navbar">
			      <ul class="nav navbar-nav">
                      <li><a href="">Clothing & Accessories</a></li>
                      <li><a href="">Jewelry</a></li>
                      <li><a href="">Craft Supplies & Tools</a></li>
                      <li><a href="">Weddings</a></li>
                      <li><a href="">Entertainment</a></li>
                      <li><a href="">Home & Living</a></li>
                      <li><a href="">Kids & Baby</a></li>
                      <li><a href="">Vintage</a></li>
			      </ul>
			    </div>
			</div-->
			
      </header>
  
      <?php require_once('routes.php'); ?>
  
      <footer>
        <div class="row footer">
          CSE 335 - Database Design and Implementation <br>
          Mark Easterly, Michael Looka, Parth Patel
        </div>
      </footer>
    </div>
    
  <body>
</html>