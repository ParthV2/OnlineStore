<div class="col-md-8 col-md-offset-2"> <br>
    <table id="cart" class="table table-hover table-condensed">
    	<thead>
    		<tr>
    			<th style="width:80%">Product</th>
    			<th style="width:10%">Stock</th>
    			<th style="width:10%">Price</th>
    			<th style="width:10%"></th>
    		</tr>
    	</thead>
    	<tbody>
    	    <?php
    	        $cart = unserialize($_SESSION['shopping_cart']);
    	        
    	        $checkout_disabled = '';
    	        if(count($cart) == 0){
    	            $checkout_disabled = ' disabled';
    	        }
    	        
    	        $total_price = 0;
    	        foreach($cart as $product_id){
    	            $product = ProductRepository::getProductById($product_id);
    	            $total_price = $total_price + $product->price;
    	            if($product->image != null){
                        $image = $product->image;
                    } else {
                        $image = 'http://placehold.it/100x100';
                    }
                    
    	            echo '<tr>
    			<td data-th="Product">
    				<div class="row">
    					<div class="col-sm-2 hidden-xs"><img src="' . $image . '" alt="..." class="img-responsive" style="max-width: 100px; height: 100px;"/></div>
    					<div class="col-sm-10">
    						<h4 class="nomargin"><a href="/?controller=Main&action=product&id=' . $product->id . '">' . $product->name . '</a></h4>
    						<p>' . $product->short_description . '</p>
    					</div>
    				</div>
    			</td>
    				<td data-th="Stock">' . $product->stock . '</td>
    			<td data-th="Price">$ ' . number_format($product->price, 2) . '</td>
    			<td class="actions" data-th="">
    			    <form method="POST" action="/?controller=Cart&action=remove">
    					<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
    					<input type="hidden" name="product_id" value="' . $product->id . '">
					</form>
    			</td>
    		</tr>';
    	        }
    	    ?>
    	</tbody>
    	<tfoot>
    		<tr>
    			<td><a href="/?controller=Main&action=home" class="btn btn-info"><i class="fa fa-angle-left"></i> Continue Shopping</a></td> <td></td>
    			<td class="text-center"><strong>Total $<?php echo number_format($total_price, 2); ?></strong></td>
    			<td> 
    			    <form method="POST" action="/?controller=Cart&action=checkout">
    					<button type="submit" class="btn btn-info<?php echo $checkout_disabled; ?>">Checkout Items In Stock <i class="fa fa-angle-right"></i></button>
					</form>
			       </td>
    		</tr>
    	</tfoot>
    </table>
</div>