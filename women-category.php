
<?php 
include('includes/header.php');

?>
<div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">WomenMen's Category</span></h2>
        <div class="row px-xl-5 pb-3">
            <?php 
             $categories=getAllFemale("categories");
            if(mysqli_num_rows($categories)>0){
                    
             ?>
                  <?php 
                  while($row=$categories->fetch_assoc()){
                  
                     ?> 
                         <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="women-product.php?category=<?=$row['slug']?>">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="uploads/<?=$row['image']?>" alt="<?=$row['image']?>">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?=$row['name']?></h6>
                            <small class="text-body">  <?=$row['name']?> </small>
                        </div>
                    </div>
                </a>
            </div>  
                 <?php 
               }
        ?>
        </div>
    </div>
    <?php
   }
else{
    echo "No Category Available";
}

?>
<?php 
include('includes/footer.php');
?>
