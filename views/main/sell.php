<div class="container">
<form method="POST" action="/?controller=Product&action=add" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Add a product to sell!</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Product Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="short_description">Short Description</label>  
  <div class="col-md-4">
    <input id="short_description" name="short_description" type="text" placeholder="" class="form-control input-md">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="long_description">Long Description</label>
  <div class="col-md-4">                         <textarea class="form-control" id="long_description" name="long_description"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price</label>  
  <div class="col-md-4">
  <input id="price" name="price" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="stock">Stock</label>  
  <div class="col-md-4">
  <input id="stock" name="stock" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="category">Category</label>
  <div class="col-md-4">
    <select id="category" name="category" class="form-control">
      <?php
        $categories = CategoryRepository::getCategories();
        foreach($categories as $category){
          echo '<option value="' . $category->id . '">' . $category->name . '</option>';
        }
      ?>
    </select>
  </div>
</div>


<!-- Image --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="image">Image URL</label>
  <div class="col-md-4">
    <input id="image" name="image" type="text" placeholder="" class="form-control input-md">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="add"></label>
  <div class="col-md-4">
    <button id="add" name="add" class="btn btn-success">Add</button>
  </div>
</div>

</fieldset>
</form>

</div>