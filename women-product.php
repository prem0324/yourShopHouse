
<?php 
include('includes/header.php');
if(isset($_GET['category'])){
$category_slug=$_GET['category'];
$category_data= getSlugActive("categories",$category_slug);
$category=mysqli_fetch_array($category_data);

if($category){
$cid=$category['id'];

?>

 <div class="container-fluid pt-5 pb-3">
<h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"><?=$category['name']?></span></h2>
<div class="row px-xl-5 " >
            <?php 
             $products = getProductByCategory($cid);
            if(mysqli_num_rows($products)>0){

             ?>
                  <?php 
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
else{
    echo "No Products Available";
}

?>
<?php 
}
else{
    echo "NO PRODUCTS AVAILABLE";
}
}
else{
    echo "Something Went Wrong";
}
include('includes/footer.php');
?>
