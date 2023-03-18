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
           $category= getById("categories",$id);
           if(mysqli_num_rows($category)>0){
            $data=mysqli_fetch_array($category);
        ?>
        <div class="card">
            <div class="card-header">
                <h4>Edit Category
                  <a href="category.php" class="btn btn-primary float-end">Back</a>

                </h4>
            </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data">
                     <div class="row">
                     <div class="col-md-6">
                     <label for="">For</label>
                        <input type="text" name="for" placeholder="Male,Female And Others" value="<?=$data['_for_'];?>" class="form-control" >
                        </div>
                        <div class="col-md-6">
                          <input type="hidden" name="$category_id" value="<?= $data['id']?>">
                        <label for="">Name</label>
                        <input type="text" name="name" value="<?= $data['name']?>" placeholder="Enter Category Name" class="form-control">
                        </div>
                        <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="<?= $data['slug']?>" placeholder="Enter Slug" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea name="description"  placeholder="Enter Description" rows="3" class="form-control"><?= $data['description']?></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Upload Image</label>
                            <input type="hidden" name="old_image" value="<?=$data['image'];?>">
                            <input type="file" name="image" class="form-control">
                            <label for="">Current Image</label>                            <!-- <img src="../uploads/shopping-bag.png" alt=""> -->
                            <img src="../uploads/<?=$data['image'];?>" height="50px" width="50px" alt="<?= $data['name']?>">
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" value="<?= $data['meta_title']?>" placeholder="Enter Meta Titel" class="form-control"></input>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" placeholder="Enter Meta Description" rows="3" class="form-control"><?= $data['meta_description']?></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" placeholder="Enter Meta KeyWord" rows="3" class="form-control"><?= $data['meta_keyword']?></textarea>
                        </div>
                      <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" <?= $data['status']?"Checked":""?> >
                      </div>
                      <div class="col-md-6">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular" <?= $data['popular']?"Checked":""?>>
                      </div>
                      <div class="col-md-12">
                        <button class="btn btn-primary" name="update_category_btn" type="submit" >Update</button>
                      </div>
                        </div>
                      </form>
                </div>
        </div>
        <?php
         } 
        else{
           echo "Category Not Found"; 
        }
        ?>
        <?php 
        }
        else{
            echo "Id Missing From Url";
        }
        ?>
     </div>
  </div>
    </div>

   
<?php
include('includes/footer.php');
?>