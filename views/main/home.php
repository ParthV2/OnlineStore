<link rel="stylesheet" type="text/css" href="styles/home.css">
<div class="row">
    <div class="col-md-2">
        <p class="lead">Categories</p>
        <div class="list-group">
            <?php
                $categories = CategoryRepository::getCategories();
                
                function cmp($a, $b)
                {
                    return strcmp($a->name, $b->name);
                }

                usort($categories, "cmp");
                if(!isset($_GET["category"])){
                    echo '<a href="/?controller=Main&action=home" class="list-group-item active">All</a>';
                } else {
                    echo '<a href="/?controller=Main&action=home" class="list-group-item">All</a>';
                }
                
                foreach($categories as $category){
                    if(isset($_GET["category"]) && $_GET["category"] == $category->id){
                        $class = 'list-group-item active';
                    } else {
                        $class = 'list-group-item';
                    }
                    
                    echo '<a href="/?controller=Main&action=home&category=' . $category->id . '" class="' . $class . '">' . $category->name . '</a>';
                }
            ?>
            <!--
            <a href="#" class="list-group-item">Paper</a>
            <a href="#" class="list-group-item">Ink & Toner</a>
            <a href="#" class="list-group-item">Cleaning</a>
            <a href="#" class="list-group-item">Technology</a>
            <a href="#" class="list-group-item">Furniture</a>
            <a href="#" class="list-group-item">School Supplies</a>
            -->
        </div>
    </div>

    <div class="col-md-8 col-md-offset-1">
        <!--
        <div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="https://www.epressrelease.org/wp-content/uploads/2015/12/bookspublications.jpg" alt="oops">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="http://www.itsmycommunitystore.com/images/BK/office%20supplies.jpg" alt="oops">
                        </div>
                        <div class="item"> 
                            <img class="slide-image" src="http://www.printernet.co.uk/blog/wp-content/uploads/2015/10/hgtnhngtnntfnf.jpg" alt="oops">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        -->
        <div class="row productList">
            <?php
            
                $products = ProductRepository::getProductsByCategory($_GET['category']);
                
                usort($products, "cmp");
                
                foreach($products as $product){
                    if($product->image != null){
                        $image = $product->image;
                    } else {
                        $image = 'http://placehold.it/320x200';
                    }
                    
                    echo '<div class="col-sm-4 col-lg-4 col-md-4 product">
                            <div class="thumbnail">
                                <img src="' . $image . '" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$' . $product->price . '</h4>
                                    <h4><a href="/?controller=Main&action=product&id=' . $product->id . '">' . $product->name . '</a>
                                    </h4>
                                    <p>' . $product->short_description . '</p>
                                </div>
                            </div>
                        </div>';
                }
            
            ?>
        </div>
    </div>
</div>
