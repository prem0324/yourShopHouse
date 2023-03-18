<?php 
include('includes/header.php');
if(isset($_GET['product'])){
$product_slug = $_GET['product'];
$product_data= getSlugActive("product",$product_slug);
$product=mysqli_fetch_array($product_data);
$cate_data=getCate("categories");
$cate=mysqli_fetch_array($cate_data);
if($product){
?>

<div class="container-fluid pb-5">
        <div class="row px-xl-5 product_data">
            <div class="col-lg-5 mb-30">
            <div class="carousel-item active">
                            <img class="w-100 h-100" src="uploads/<?=$product['image'];?>" alt="Image">
                        </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <span class="float-end text-danger"><?php if($product['trending']){echo "Trending";}?></span>
                    <h3><?=$product['name'];?></h3>
                   <h5>₹<del><?=$product['orignal_price'];?></del></h5> 
                    <h3 class="font-weight-semi-bold mb-4">₹ <?=$product['selling_price'];?></h3>
                    <p class="mb-4"><?=$product['small_description'];?></p>

                        <div class="d-flex mb-3">
                            <strong class="text-dark mr-3">Size:</strong>
                            <?=$product['size']?>
                        </div>

                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Color:</strong>
                         <?=$product['color']?>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center qty" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                       
                        <button class="btn btn-primary px-3 addToCartBtn" value="<?=$product['id'];?>"><i class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="facebook.com">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="twitter.com">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p><?=$product['description']?></p>
                           
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Information</h4>
                            <p><?=$product['description']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php 
}
else {
    echo "Product Not Found";
}
?>
<!-- <div class="container-fluid pt-5 pb-3">
<h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also LIke</span></h2>
<div class="row px-xl-5 " >
            <?php 
             $products = getProductByCategory($cid);
            if(mysqli_num_rows($products)>0){
                while($row=$products->fetch_assoc()){
             ?>
              <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="uploads/<?=$row['image']?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="view-product.php?product=<?=$row['slug']?>"><?=$row['name']?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h6>₹&nbsp;<del> <?=$row['orignal_price']?></del>&nbsp;&nbsp;</h6><h5><?=$row['selling_price']?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
               } 
        ?>
     </div>
    </div>
    <?php
   }
   ?> -->
<?php
}
else {
    echo "somthing went wrong";
}
include('includes/footer.php');
?>