<?php

include('../middleware/adminmiddleware.php');
include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $product=getById("product",$id);
            if(mysqli_num_rows( $product)>0){
                $data=mysqli_fetch_array($product)
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Products

                        <a href="products.php" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="mb-0">Select Category</label>
                                    <select name="category_id" class="form-select">
                                        <option selected>Select Category</option>
                                        <?php
    
                                        $categories = getAll("categories");
                                        if (mysqli_num_rows($categories) > 0) {
                                            foreach ($categories as $item) {
    
                                        ?>
                                                <option value="<?= $item['id'] ?>"<?=$data['category_id']==$item['id']?"Selected":""?>><?= $item['name'] ?></option>
                                        <?php
    
                                            }
                                        } else {
                                            echo "No Category Available";
                                        }
    
                                        ?>
    
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Name</label>
                                    <input type="text" name="name" value="<?=$data['name']?>" placeholder="Enter Category Name" class="form-control mb-2" >
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Slug</label>
                                    <input type="text" name="slug" value="<?=$data['slug']?>" placeholder="Enter Slug" class="form-control mb-2" >
                                </div>
                                <input type="hidden" name="product_id" value="<?=$data['id']?>">
                                <div class="col-md-12">
                                        <label class="mb-0">Small Description</label>
                                    <textarea name="small_description" placeholder="Enter Small Description" rows="3" class="form-control mb-2" ><?=$data['small_description']?></textarea>
                                </div>
                                <div class="col-md-12">
                                        <label class="mb-0">Description</label>
                                    <textarea name="description" placeholder="Enter Small Description" rows="3" class="form-control mb-2" ><?=$data['small_description']?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Size</label>
                                    <input type="text" name="size" value="<?=$data['size']?>" placeholder="Enter Size" rows="3" class="form-control mb-2" ></input>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Color</label>
                                    <input type="text" name="color" value="<?=$data['color']?>" placeholder="Enter Color" rows="3" class="form-control mb-2" ></input>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Original Price</label>
                                    <input type="text" name="original_price" value="<?=$data['orignal_price']?>" placeholder="Enter Original Price" rows="3" class="form-control mb-2" ></input>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Selling Price</label>
                                    <input type="text" name="selling_price" value="<?=$data['selling_price']?>" placeholder="Enter Selling Price" rows="3" class="form-control mb-2" ></input>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Upload Image</label>
                                    <input type="hidden" name="old_image" value="<?=$data['image']?>">
                                    <input type="file" name="image" class="form-control mb-2" >
                                    <label class="mb-0">Current Image</label>
                                    <img src="../uploads/<?=$data['image']?>" alt="" height="50px" width="50px">
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-0">Quentity</label>
                                        <input type="number" name="qty" placeholder="Enter Quentity" value="<?=$data['qty']?>" rows="3" class="form-control mb-2" ></input>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Status</label>
                                        <input type="checkbox" name="status" <?=$data['status']=='0'?'':'checked'?>>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Trending</label>
                                        <input type="checkbox" name="trending" value=""  <?=$data['trending']=='0'?'':'checked'?>>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Meta Title</label>
                                    <input type="text" name="meta_title" value="<?=$data['meta_title']?>" placeholder="Enter Meta Titel" class="form-control mb-2" ></input>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Meta Description</label>
                                    <textarea name="meta_description" placeholder="Enter Meta Description" rows="3" class="form-control mb-2" ><?=$data['meta_description']?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Meta Keywords</label>
                                    <textarea name="meta_keywords"  placeholder="Enter Meta KeyWord" rows="3" class="form-control mb-2" ><?=$data['meta_keywords']?></textarea>
                                </div>
    
                                <div class="col-md-12">
                                    <button class="btn btn-primary" name="update_product_btn" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }
            else{
                echo "Product Not Found";
            }
           
        }
        else{
            echo "Id missing From URL";
        }
        ?>
        
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
?>