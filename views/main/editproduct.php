<div class="container">
<form method="POST" action="/?controller=Product&action=edit" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Edit Product</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Product Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" value="<?php echo $product->name; ?>">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="short_description">Short Description</label>  
  <div class="col-md-4">
    <input id="short_description" name="short_description" type="text" placeholder="" class="form-control input-md" value="<?php echo $product->short_description; ?>">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="long_description">Long Description</label>
  <div class="col-md-4">                         <textarea class="form-control" id="long_description" name="long_description"><?php echo $product->long_description; ?></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price</label>  
  <div class="col-md-4">
  <input id="price" name="price" type="text" placeholder="" class="form-control input-md" value="<?php echo $product->price; ?>">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="stock">Stock</label>  
  <div class="col-md-4">
  <input id="stock" name="stock" type="text" placeholder="" class="form-control input-md" value="<?php echo $product->stock; ?>">
    
  </div>
</div>

<!-- Select Category -->
<div class="form-group">
  <label class="col-md-4 control-label" for="category">Category</label>
  <div class="col-md-4">
    <select id="category" name="category" class="form-control">
      <?php
        $categories = CategoryRepository::getCategories();
        foreach($categories as $category){
            $selected = '';
            if($category->id == $product->category->id){
                $selected = ' selected';
            }
          echo '<option value="' . $category->id . '"' . $selected . '>' . $category->name . '</option>';
        }
      ?>
    </select>
  </div>
</div>


<!-- Image --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="image">Image URL</label>
  <div class="col-md-4">
    <input id="image" name="image" type="text" placeholder="" class="form-control input-md" value="<?php echo $product->image; ?>">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="edit"></label>
  <div class="col-md-4">
      <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
    <button id="edit" name="edit" class="btn btn-warning">Edit</button>
  </div>
</div>

</fieldset>
</form>

</div>