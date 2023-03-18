<?php 
include('includes/header.php');
include('includes/carousel.php'); 
 ?> 

 <head>
    <style>
        #img{
            height: 50%;
            width: 50%;
        }
    </style>
 </head>
   <!-- Featured Start -->
   <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-1">
          <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Trending Products</span></h2>
              <div class="row px-xl-0 " >
    <?php 
    $trendingProducts=getAllTranding();
    if(mysqli_num_rows($trendingProducts)>0){ 
        while($row=$trendingProducts->fetch_assoc()){
            ?>
    
    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" id="img" height="500" height="500" src="uploads/<?=$row['image'];?>" alt="">
                        <div class="product-action cart_data">
                            <input type="hidden" name="addCart" value="<?=$row['id']?>" class="cartId">
                            <a class="btn btn-outline-dark btn-square cart_btn" href="view-product.php?product=<?=$row['slug']?>"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="view-product.php?product=<?=$row['slug']?>"><?=$row['name']?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                           <h5>₹<?=$row['selling_price']?></h5> <h6>&nbsp;&nbsp;&nbsp;₹<del> <?=$row['orignal_price']?></del>&nbsp;&nbsp;</h6>
                        </div>
                    </div>
                </div>
        </div>
            <?php
        }
    }
    ?>
                <!-- </div> -->
        </div>
    </div>
    <!-- Products End -->


<?php include('includes/footer.php')?>