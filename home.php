<style>
    /* Split the screen in half */
.split {
  height: 100%;
  width: 40%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 100px;
  padding-left: 70px
}

/* Control the left side */
.left {
    width: 80%;
  left: 0;
  background-color: white;
}

/* Control the right side */
.right {
    width: 40%;
  right: 0;
  background-color: #eeeeee;
}
</style>


<div class="card card-outline rounded-5 card-secondary shadow">
<div class="card-body">
<div class="col-lg-12 py-4">
<div class="contain-fluid">
        <div class="clear-fix mb-3"></div>
        <h3 class="text-center"><b>Top Menu</b></h3>
        <center><hr class="w-25"></center>
        <div class="row" id="product_list">
            <?php 
            $products = $conn->query("SELECT p.*, v.canteen_name as canteen, c.name as `category` FROM `product_list` p inner join canteen_list v on p.canteen_id = v.id inner join category_list c on p.category_id = c.id where p.delete_flag = 0 and p.`status` =1 order by RAND() limit 12");
            while($row = $products->fetch_assoc()):
            ?>
                <div class="col-lg-3 col-md-8 col-sm-10 product-item">
                <a href="./?page=products/view_product&id=<?= $row['id'] ?>" class="card shadow rounded-0 text-reset text-decoration-none">
                <div class="product-img-holder position-relative">
                    <img src="<?= validate_image($row['image_path']) ?>" alt="Product-image" class="img-top product-img bg-gradient-gray">
                </div>
                    <div class="card-body border-top border-gray">
                        <h5 class="card-title text-truncate w-100"><?= $row['name'] ?></h5>
                        <div class="d-flex w-100">
                            <div class="col-auto px-0"><small class="text-muted">Canteen: </small></div>
                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="text-truncate m-0"><small class="text-muted"><?= $row['canteen'] ?></small></p></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-auto px-0"><small class="text-muted">Category: </small></div>
                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="text-truncate m-0"><small class="text-muted"><?= $row['category'] ?></small></p></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-auto px-0"><small class="text-muted">Price: </small></div>
                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="m-0 pl-3"><small class="text-primary"><?= format_num($row['price']) ?></small></p></div>
                        </div>
                        <p class="card-text truncate-3 w-100"><?= strip_tags(html_entity_decode($row['description'])) ?></p>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="clear-fix mb-2"></div>
        <div class="text-center">
            <a href="./?page=products" class="btn btn-large btn-primary rounded-pill col-lg-3 col-md-5 col-sm-12">Explore More</a>
        </div>
    </div>
</div>
</div>
</div>
