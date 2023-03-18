<?php
if(isset($_GET['id'])){
?>
<?php 
include('functions/userfunctions.php');
include('includes/topbar.php');
$user=UserDeatail();
$data=mysqli_fetch_array($user);
?>
<form action="admin/code.php" method="post" class="col-md-12">
<div class="container rounded bg-white mt-5 mb-5">
     <div class="row">
          <div class="col-md-3 border-right"> 
             <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                 <!-- <img src="uploads/<?=$data['images']?>" class="img-circle"  width="90" height="100"  alt="Your Profile">  -->
                 <div class="mb-3">
                     <!-- <input type="hidden" name="old_image" value="<?=$data['images']?>">
                     <input type="file" name="image" class="form-control mb-2" >
                     <label for="formFile" class="form-label">Change Profile</label> -->
                </div>
             </div> 
          </div>
    <div class="col-md-5 border-right">
     <div class="p-3 py-5">
         <div class="d-flex justify-content-between align-items-center mb-3"> 
            <h4 class="text-right">Profile</h4> 
        </div>
         <div class="row mt-2"> 
            <div class="col-md-6">
                <label class="labels col-md-12">Full Name</label>
                <input type="text" class="form-control" placeholder="first name" value="<?=$data['name']?>" name="fullname">
            </div>
           <input type="hidden" name="id" value="<?=$data['id']?>">
        </div>
         <div class="row mt-3"> 
            <div class="col-md-12">
                <label class="labels">PhoneNumber</label>
                <input type="text" class="form-control" placeholder="enter phone number" value="<?=$data['phone']?>" name="phone">
            </div>
              <div class="col-md-12"><label class="labels">Email ID</label>
            <input type="text" class="form-control" placeholder="enter email id" value="<?=$data['email']?>" name="email" disabled>
        </div>  
    </div> 
<br>
<button class="btn btn-primary profile-button" type="submit" name="update">Update Profile</button>

         <div class="mt-5 text-center">
    <a href="index.php" class="btn btn-primary profile-button">Home</a>

        </div> 
        
    </div>
 </div> 
   </div>
</div>
</form>
<?php 
}
else{
    header("location:index.php");
}
include('includes/footer.php')
?>