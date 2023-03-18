<?php 
include('../config/connection.php');
include('../functions/myfunction.php');
if(isset($_POST['ad_category_btn'])){
      $for=$_POST['for'];
      $name=$_POST['name'];
      $slug=$_POST['slug'];
      $description=$_POST['description'];


      $meta_title=$_POST['meta_title'];
      $meta_description=$_POST['meta_description'];
     


      $meta_keywords=$_POST['meta_keyword'];
      $status=isset($_POST['status'])?'1':'0';
      $popular=isset($_POST['popular'])?'1':'0';

      $image =$_FILES['image']['name'];

      $image_ext=pathinfo($image,PATHINFO_EXTENSION);
      
    if($image_ext=="jpg"||$image_ext=="jpeg"||$image_ext=="png"||$image_ext=="gif"){

        

    $file_name=$image;
   
    $cate_query=$con->query("INSERT INTO categories 
    (_for_,name,slug,description,meta_title,meta_description,meta_keyword,status,popular,image)
    VALUES('$for','$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status','$popular','$file_name')");

    // $cate_query_run=mysqli_query($con,$cate_query);

    if($cate_query){
        move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/'.$file_name);
        redirect("add-category.php","Category Added Successfully");
    }
    else
    {
            redirect("add-category.php","Somthing Went Wrong");
    }
    }
    else{
    redirect("add-category.php","Invalid File Type");
    }

}
else if(isset($_POST['update_category_btn'])){
    $category_id=$_POST['$category_id'];
    $name=$_POST['name'];
    $slug=$_POST['slug'];
    $description=$_POST['description'];
    $meta_title=$_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keyword=$_POST['meta_keyword'];   
    $status=isset($_POST['status'])?'1':'0';
    $popular=isset($_POST['popular'])?'1':'0';

    $for=$_POST['for'];

    $new_image =$_FILES['image']['name'];

    $old_image=$_POST['old_image'];

    if($new_image!=""){
        
        $update_filename=$new_image;    
    }
    else{
        $update_filename=$old_image;
    }
    $update_query="UPDATE categories SET
    _for_='$for',
     name='$name',
     slug='$slug',
     description='$description',
     meta_title='$meta_title',
     meta_description='$meta_description',
     meta_keyword='$meta_keyword',
     status='$status',
     popular='$popular',
     image='$update_filename' WHERE id='$category_id'";


     $update_query_run=mysqli_query($con,$update_query);


     if($update_query_run){
        if($_FILES['image']['name']!=""){
            move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/".$update_filename);
            if(file_exists("../uploads/".$old_image)){
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-category.php?id=$category_id","Category Updated Successfully");
     }
     else{
        redirect("edit-category.php?id=$category_id","Something Went Wrong");
     }
}
else if(isset($_POST['delete_category_btn'])){

   
    $category_id=mysqli_real_escape_string($con,$_POST['category_id']);

    $cate_query=$con->query("SELECT * FROM categories WHERE id='$category_id'");

    $category_data=mysqli_fetch_array($cate_query);
    $image="../uploads/".$category_data['image'];

    $delete_query=$con->query("DELETE FROM categories WHERE id='$category_id'");
    if($delete_query){
        if(file_exists($image)){
            unlink($image);
        }
        // redirect("category.php","Category Deleted Successfully");
        echo 200;
    }
    else{
        echo 500;
        // redirect("category.php","Somthing Went Wrong");
    }
}
else if(isset($_POST['ad_product_btn'])){


    $category_id=$_POST['category_id'];
    $name=$_POST['name'];
    $slug=$_POST['slug'];
    $small_description=$_POST['small_description'];
    $description=$_POST['description'];

    
    $size=$_POST['size'];
    $color=$_POST['color'];



    $original_price=$_POST['original_price'];
    $selling_price=$_POST['selling_price'];
    $qty=$_POST['qty'];
    $meta_title=$_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keywords=$_POST['meta_keywords'];

    $status=isset($_POST['status'])?'1':'0';
    $trending=isset($_POST['trending'])?'1':'0';

    $image =$_FILES['image']['name'];

    $image_ext=pathinfo($image,PATHINFO_EXTENSION);
    
  $file_name=$image;

  $product_query=$con->query("INSERT INTO product (category_id,
  name,
  slug,
  small_description,
  description,
  size,
  color,
  orignal_price,
  selling_price,
  qty,
  meta_title,
  meta_description,
  meta_keywords,
  status,
  trending,
  image)
   VALUES ('$category_id',
   '$name',
   '$slug',
   '$small_description',
   '$description',
   '$size',
   '$color',
   '$original_price',
   '$selling_price',
   '$qty',
   '$meta_title',
   '$meta_description',
   '$meta_keywords',
   '$status',
   '$trending',
   '$file_name')");

   if($product_query){
    move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/'.$file_name);
    redirect("add-products.php","Product Added Successfully");
   }
   else
   {
    redirect("add-products.php","Somthing Went Wrong");
   }
}
else if(isset($_POST['update_product_btn'])){

    $product_id=$_POST['product_id'];
    $category_id=$_POST['category_id'];
    $name=$_POST['name'];
    $slug=$_POST['slug'];
    $small_description=$_POST['small_description'];
    $description=$_POST['description'];
    $original_price=$_POST['original_price'];
    $selling_price=$_POST['selling_price'];
    $qty=$_POST['qty'];
    $meta_title=$_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keywords=$_POST['meta_keywords'];

    $size=$_POST['size'];
    $color=$_POST['color'];

    $status=isset($_POST['status'])?'1':'0';
    $trending=isset($_POST['trending'])?'1':'0';

    

    $new_image =$_FILES['image']['name'];
    $old_image=$_POST['old_image'];
    if($new_image!=""){
        $update_filename=$new_image;    
    }
    else{
        $update_filename=$old_image;
    }

    $product_query=$con->query("UPDATE product SET 
   category_id= '$category_id',
   name='$name',
   slug='$slug',
   small_description='$small_description',
   description='$description',
   size='$size',
   color='$color',
   orignal_price='$original_price',
   selling_price='$selling_price',  
   qty='$qty',
   meta_title='$meta_title',
   meta_description='$meta_description',
   meta_keywords='$meta_keywords',
   status='$status',
   trending='$trending',
   image='$update_filename' WHERE id='$product_id'");
    if($product_query){
        if($_FILES['image']['name']!=""){
            move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/".$update_filename);
            if(file_exists("../uploads/".$old_image)){
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-product.php?id=$product_id","Product Updated Successfully");
     }
     else{
        redirect("edit-product.php?id=$product_id","Something Went Wrong");
     }
}
else if(isset($_POST['delete_product_btn'])){
    
    $product_id=mysqli_real_escape_string($con,$_POST['product_id']);

    $product_query=$con->query("SELECT * FROM product WHERE id='$product_id'");

    $product_data=mysqli_fetch_array($product_query);
    $image="../uploads/".$product_data['image'];

    $delete_query=$con->query("DELETE FROM product WHERE id='$product_id'");

        if($delete_query){
            if(file_exists($image)){
                unlink($image);
            }
            // redirect("product.php","Product_Deleted_Successfully");
            echo 200;
        }
        else{
            // redirect("product.php","Somthing Went Wrong");
            echo 500;
        }  
}
else if(isset($_POST['order_update_btn'])){
    $tracking_no=$_POST['tracking_no'];
    $order_status=$_POST['order_status'];
    $update_query=$con->query("UPDATE orders SET status='$order_status' WHERE tracking_no='$tracking_no'");
    if($update_query){
        redirect("view-order.php?t=$tracking_no","Status Updated");
    }
}
else if(isset($_POST['update'])){
    $name=$_POST['fullname'];
    $num=$_POST['phone'];
    // $email=$_POST['email'];
    $id=$_POST['id'];
   

    $profile_query=$con->query("UPDATE `site-user` SET name='$name',phone='$num' WHERE id='$id'");

if($profile_query){
    redirect("../profile.php?id=$id","Updated");
}
else{
    redirect("../profile.php?id=$id","Somthing Went Wrong");
}
}
else{
    header('location:index.php');
}
?>