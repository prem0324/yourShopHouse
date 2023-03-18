<?php

include('../middleware/adminmiddleware.php');
include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Products</h4>
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
                                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
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
                                <input type="text" name="name" placeholder="Enter Category Name" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" name="slug" placeholder="Enter Slug" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-12">
                                    <label class="mb-0">Small Description</label>
                                <textarea name="small_description" placeholder="Enter Small Description" rows="3" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="col-md-12">
                                    <label class="mb-0">Description</label>
                                <textarea name="description" placeholder="Enter Small Description" rows="3" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Size</label>
                                <input type="text" name="size" placeholder="Enter Size" rows="3" class="form-control mb-2" required></input>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Color</label>
                                <input type="text" name="color" placeholder="Enter Color" rows="3" class="form-control mb-2" required></input>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Original Price</label>
                                <input type="text" name="original_price" placeholder="Enter Original Price" rows="3" class="form-control mb-2" required></input>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Selling Price</label>
                                <input type="text" name="selling_price" placeholder="Enter Selling Price" rows="3" class="form-control mb-2" required></input>
                            </div>
                            <div class="col-md-12" id="image_box">
                           
                                <label class="mb-0">Upload Image</label>
                                <input type="file" name="image" class="form-control mb-2" required>
                                <div class="col-md-12">
                                <!-- <button class="btn btn-primary" type="button" id="" onclick="add_more_images()"><span id="payment-button-amount">Add More Images</span></button> -->
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="mb-0">Quentity</label>
                                    <input type="number" name="qty" placeholder="Enter Quentity" rows="3" class="form-control mb-2" required></input>
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Status</label>
                                    <input type="checkbox" name="status" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Trending</label>
                                    <input type="checkbox" name="trending" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Title</label>
                                <input type="text" name="meta_title" placeholder="Enter Meta Titel" class="form-control mb-2" required></input>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label>
                                <textarea name="meta_description" placeholder="Enter Meta Description" rows="3" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea name="meta_keywords" placeholder="Enter Meta KeyWord" rows="3" class="form-control mb-2" required></textarea>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-primary" name="ad_product_btn" type="submit">save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
?>