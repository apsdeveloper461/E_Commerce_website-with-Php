<div class="card_Con">
    <!-- card 1 -->
    <a href="./category.php" class="card-a">
      <div class="card " style="background: linear-gradient(270deg,#822000,red);">
        <div class="card-body">
          <h5 class="card-title " ><i class="fa fa-users"></i> All Categories</h5>
          <hr>
          <div class="card-text">
            <b><div id="CategoryCount"><?php echo getRecordCount('categories'); ?></div></b>
          </div>
        </div>
      </div>
    </a>
    <!-- card 02 -->
    <a href="./Brand.php" class="card-a">
      <div class="card bg-info ">
        <div class="card-body">
          <h5 class="card-title "><i class="fa fa-users"></i> All Brands</h5>
          <hr>
          <div class="card-text">
            <b><div id="BrandCount"><?php echo getRecordCount('brands'); ?></div></b>
          </div>
        </div>
      </div>
    </a>
    <!-- card 03 -->
    <a href="./Product.php" class="card-a">
      <div class="card bg-dark ">
        <div class="card-body">
          <h5 class="card-title "><i class="fa fa-users"></i> All Products</h5>
          <hr>
          <div class="card-text">
            <b><div id="ProductCount"><?php echo getRecordCount('products_table'); ?></div></b>
          </div>
        </div>
      </div>
    </a>
    <a href="#" class="card-a">
      <div class="card bg-warning ">
        <div class="card-body">
          <h5 class="card-title "><i class="fa fa-users"></i> All Category</h5>
          <hr>
          <div class="card-text">
            <b>10</b>
          </div>
        </div>
      </div>
    </a>
    <!-- card 02 -->
    <a href="#" class="card-a">
      <div class="card bg-danger ">
        <div class="card-body">
          <h5 class="card-title "><i class="fa fa-users"></i> All Orders</h5>
          <hr>
          <div class="card-text">
            <b>15</b>
          </div>
        </div>
      </div>
    </a>
    <!-- card 03 -->
    <a href="#" class="card-a">
      <div class="card bg-primary ">
        <div class="card-body">
          <h5 class="card-title "><i class="fa fa-users"></i> All Users</h5>
          <hr>
          <div class="card-text">
            <b>1123</b>
          </div>
        </div>
      </div>
    </a>
  </div>