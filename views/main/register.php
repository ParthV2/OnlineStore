<link href="styles/registration.css" rel="stylesheet">
<div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    	<div class="panel panel-default">
    		<div class="panel-heading">
		    		<h3 class="panel-title">Registration</h3>
		 		</div>
		 			<div class="panel-body">
		    		<form role="form" method="POST" action="/?controller=User&action=register">
		    			<div class="row">
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		                            <input type="text" name="firstName" id="firstName" class="form-control input-md" placeholder="First Name">
		    					</div>
		    				</div>
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		    						<input type="text" name="lastName" id="lastName" class="form-control input-md" placeholder="Last Name">
		    					</div>
		    				</div>
		    			</div>
		    			<div class="form-group">
		    				<input type="email" name="email" id="email" class="form-control input-md" placeholder="Email Address">
		    				<?php 
		    					if($email_error){
		    						echo 'Email already taken';
		    					}
		    				?>
		    			</div>

		    			<div class="row">
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		    						<input type="password" name="password" id="password" class="form-control input-md" placeholder="Password">
		    					</div>
		    				</div>
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		    						<input type="password" name="passwordConfirmation" id="passwordConfirmation" class="form-control input-md" placeholder="Confirm Password">
		    					</div>
		    				</div>
		    				<?php 
		    					if($password_error){
		    						echo 'Passwords do not match';
		    					}
		    				?>
		    			</div> <br>
		    			<!-- Address -->
		    			<div class="form-group">
		    			    <input type="text" name="address" id="address" class="form-control input-md" placeholder="Address">
		    			</div>
		    			<div class="row">
		    			    <div class="col-xs-4 col-sm-4 col-md-4">
		    					<div class="form-group">
		    						<input type="text" name="city" id="city" placeholder="City" class="form-control input-md"/>
		    					</div>
		    				</div>
		    				<div class="col-xs-4 col-sm-4 col-md-4">
		    					<div class="form-group">
		    						<select name="state" id="state" class="form-control input-md">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>
		    					</div>
		    				</div>
		    				<div class="col-xs-4 col-sm-4 col-md-4">
		    					<div class="form-group">
		    						<input type="text" name="zip" id="zip" placeholder="ZIP" class="form-control input-md"/>
		    					</div>
		    				</div>
		    			</div> <br>
		    			
		    			<div class="form-group">
		    			    Would you like to sell? <input type="checkbox" value="1" name="isSeller">
		    			</div>
		    			<!-- Bank -->
		    			<!--
		    			<div class="row">
		    			    <div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		    						<input type="text" name="bankName" id="bankName" placeholder="Bank Name" class="form-control input-md"/>
		    					</div>
		    				</div>
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		    						<input type="text" name="bankHolderName" id="bankHolderName" placeholder="Account Holder Name" class="form-control input-md"/>
		    					</div>
		    				</div>
		    			</div>
		    			<div class="row">
		    			    <div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		    						<input type="text" name="routingNum" id="routingNum" placeholder="Routing Number" class="form-control input-md"/>
		    					</div>
		    				</div>
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		    						<input type="text" name="accountNumber" id="accountNumber" placeholder="Account Number" class="form-control input-md"/>
		    					</div>
		    				</div>
		    			</div>
		    			-->
		    			<input type="submit" value="Register" class="btn btn-info btn-block">
		    		</form>
		    	</div>
    		</div>
		</div>
	</div>
