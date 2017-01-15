<div class="container">

<div class="panel-heading">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#accountOverview" data-toggle="tab">Account Overview</a></li>
    <?php
      $user = unserialize($_SESSION['logged_in_user']);
        if($user->is_vendor){
          echo '<li><a href="#productList" data-toggle="tab">Your Products</a></li>';
        }
    ?>
  </ul>
</div>
<div class="panel-body">
  <div class="tab-content">
    <div class="tab-pane fade in active" id="accountOverview">
      <form class="form-horizontal">
      <div class="form-group">
         <!-- Name -->
        <label class="col-md-4 control-label" for="textinput">Name</label>  
        <div class="col-md-4" style="padding-top: 7px;">
        <?php
          if(isset($_SESSION['logged_in_user'])){
            $user = unserialize($_SESSION['logged_in_user']);
            echo '<span id="user_name">' . $user->first_name . ' ' . $user->last_name . '</span>';
          }
          else{
            echo '<span>Your name</span>';
          }
        ?>
        </div>
      </div>
      
      <!-- Email -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Email</label>  
        <div class="col-md-4" style="padding-top: 7px;">
        <?php
          if(isset($_SESSION['logged_in_user'])){
            $user = unserialize($_SESSION['logged_in_user']);
            echo '<span>' . $user->email . '</span>';
          }
          else{
            echo '<span>Your email</span>';
          }
        ?>
        </div>
      </div>

      <!-- Address -->
      <div class="form-group">
          <label class="col-md-4 control-label" for="passwordinput">Address</label>
           <div class="col-md-6" style="padding-top: 7px;">
              <?php
                if(isset($_SESSION['logged_in_user'])){
                  $user = unserialize($_SESSION['logged_in_user']);
                  echo '<span>' . $user->address . '</span> <br>
                        <span>' . $user->city . ', ' . $user->state . ' ' . $user->zip . ' </span>';
                }
                else{
                  echo '<span>Your address</span>';
                }
              ?>
      	    </div>
        </div>
      </form>
  </div>
  
    <div class="tab-pane fade" id="productList">
      <div class="col-md-12"> <br>
    <table id="cart" class="table table-hover table-condensed">
    	<thead>
    		<tr>
    			<th style="width:80%">Product</th>
    			<th style="width:10%">Stock</th>
    			<th style="width:10%">Price</th>
    			<th style="width:5%"></th>
    			<th style="width:5%"></th>
    		</tr>
    	</thead>
    	<tbody>
    	    <?php
    	        if($user->is_vendor){
                  $products = ProductRepository::getProductsByUserId($user->id);
      
              foreach($products as $product){
    	            echo '<tr>
                  			<td data-th="Product">
                  				<div class="row">
                  					<div class="col-sm-2 hidden-xs"><img src="' . $product->image . '" alt="..." class="img-responsive" style="width: 100px; height: 100px;"/></div>
                  					<div class="col-sm-10">
                  						<h4 class="nomargin"><a href="/?controller=Main&action=product&id=' . $product->id . '">' . $product->name . '</a></h4>
                  						<p>' . $product->short_description . '</p>
                  					</div>
                  				</div>
                  			</td>
                  			<td data-th="Stock">' . $product->stock . '</td>
                  			<td data-th="Price">$ ' . number_format($product->price, 2) . '</td>
                  			<td class="actions" data-th="">
                  			  <a href="/?controller=Main&action=editproduct&id=' . $product->id . '" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                  			</td>
                  			<td class="actions" data-th="">
                  			    <form method="POST" action="/?controller=Product&action=remove">
                  					  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                  					  <input type="hidden" name="product_id" value="' . $product->id . '">
              					    </form>
                  			</td>
                  		</tr>';
    	            }
    	        }
    	    ?>
    	</tbody>
    </table>
</div>
    </div>
  </div>
</div>
</div>