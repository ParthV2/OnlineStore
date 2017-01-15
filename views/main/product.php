<link rel="stylesheet" type="text/css" href="styles/product.css">
<div class="content-wrapper"> <br>	
	<div class="item-container">	
		<div class="container">	
			<div class="col-md-6">
				<div class="product row service-image-left">
					<center>
						<?php
							if($product->image != null){
		                        $image = $product->image;
		                    } else {
		                        $image = 'http://placehold.it/320x150';
		                    }
							
							echo '<img id="item-display" src="' . $image . '" alt="">';
						?>
					</center>
				</div>
			</div>
				
			<div class="col-md-6">
				<div class="product-title"><?php echo $product->name; ?></div>
				<div class="product-desc"><?php echo $product->short_description; ?></div>
				<hr>
				<div class="product-price">$<?php echo number_format($product->price, 2); ?></div>
				<?php
					if($product->stock > 0){
						echo '<div class="product-in-stock">In Stock: ' . $product->stock . '</div>';
					} else {
						echo '<div class="product-out-stock">Out of Stock</div>';
					}
				?>
				
				<hr>
				<div class="btn-group cart">
					<?php
						if($product->stock > 0){
							$add_to_cart_class = 'btn btn-success';
							$type = 'submit';
						} else {
							$add_to_cart_class = 'btn btn-danger disabled';
							$type = 'button';
						}
					?>
					<form method="POST" action="/?controller=Cart&action=add">
    					<input type="<?php echo $type; ?>" class="<?php echo $add_to_cart_class; ?>" value="Add to Cart" />
    					<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
					</form>
				</div>
			</div>
		</div> 
	</div>
	<div class="container-fluid">		
		<div class="col-md-12 product-info">
				<ul id="myTab" class="nav nav-tabs nav_tabs">
					<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
				</ul>
			<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="service-one">
					 
						<section class="container product-info">
							<?php
								echo nl2br($product->long_description);
							?>
						</section>
									  
					</div>
				<div class="tab-pane fade" id="service-two">
					
					<section class="container">
							
					</section>
					
				</div>
				<div class="tab-pane fade" id="service-three">
											
				</div>
			</div>
			<hr>
		</div>
	</div>
</div>