<?php 

include('../middleware/adminmiddleware.php');
include('includes/header.php'); 
?>
<div class="container">
    <div class="row">
     <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Category</h4>
            </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data">
                     <div class="row">
                     <div class="col-md-6">
                        <label for="">For</label>
                        <input type="text" name="for" placeholder="Male,Female And Others" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Enter Category Name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" name="slug" placeholder="Enter Slug" class="form-control"required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea name="description" placeholder="Enter Description" rows="3" class="form-control"required></textarea>
                        </div>
                        
                        <div class="col-md-12">
                            <label for="">Upload Image</label>
                            <input type="file" name="image" class="form-control"required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" placeholder="Enter Meta Titel" class="form-control"required></input>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" placeholder="Enter Meta Description" rows="3" class="form-control"required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" placeholder="Enter Meta KeyWord" rows="3" class="form-control"required></textarea>
                        </div>
                      <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" >
                      </div>
                      <div class="col-md-6">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular" >
                      </div>
                      <div class="col-md-12">
                        <button class="btn btn-primary" name="ad_category_btn" type="submit" >save</button>
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