<link href="styles/registration.css" rel="stylesheet">
<div class="row centered-form">
	<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">
	    		<h3 class="panel-title">Welcome!</h3>
 			</div>
 			<div class="panel-body">
 				<?php
 					if($login_error){
 						echo 'Invalid username and password';
 					}
 				?>
    			<form role="form" method="POST" action="/?controller=User&action=login">
    				<div class="form-group">
    					<input type="email" name="email" id="email" class="form-control input-md" placeholder="Email Address">
    				</div>
    				<div class="form-group">
    					<input type="password" name="password" id="password" class="form-control input-md" placeholder="Password">
    				</div>
    				<input type="submit" value="Log in" class="btn btn-info btn-block">
    			</form>
    		</div>
		</div>
	</div>
</div>
