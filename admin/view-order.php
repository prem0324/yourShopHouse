<?php 
include('../middleware/adminmiddleware.php');
include('includes/header.php'); 
if(isset($_SESSION['auth'])){
    if(isset($_GET['t'])){
        $trackin_no = $_GET['t'];

       $orderData= checkTrackingNoValid($trackin_no);
       if(mysqli_num_rows($orderData)<0){
        echo "<h4>SomeThing Went Wrong</h4>";
        die();
       }
    
    }
    else{
        echo "<h4>SomeThing Went </h4>";
        die();  
    }
   $data= mysqli_fetch_array($orderData);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="card"> 
                <div class="card-header bg-primary">
                    <h4 class="text-white">View Order </h4>
                    <a href="orders.php" class="btn btn-warning float-end bg-black"><i class="fa fa-reply">Back</i></a>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Delivery Details</h4>
                            <hr>    
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                <label class="fw-bold">Name</label>
                                     <div class="border p-1">
                                           <?=$data['name'];?>
                                      </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                <label class="fw-bold">Email</label>
                                     <div class="border p-1">
                                           <?=$data['email'];?>
                                      </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                <label class="fw-bold">Phone</label>
                                     <div class="border p-1">
                                           <?=$data['phone'];?>
                                      </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                <label class="fw-bold">Tracking No.</label>
                                     <div class="border p-1">
                                           <?=$data['tracking_no'];?>
                                      </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                <label class="fw-bold">Address</label>
                                     <div class="border p-1">
                                           <?=$data['address'];?>
                                      </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                <label class="fw-bold">PinCode</label>
                                     <div class="border p-1">
                                           <?=$data['pincode'];?>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            $userId=$_SESSION['auth_user']['user_id'];
                            $order_query=$con->query("SELECT o.id as oid,o.tracking_no,o.user_id,oi.*,oi.qty as orderqty,p.*
                             FROM  orders o,order_items oi,product p WHERE oi.order_id=o.id 
                             AND p.id=oi.prod_id AND o.tracking_no='$trackin_no'");
                             if(mysqli_num_rows($order_query)>0){
                                while($item=$order_query->fetch_assoc()){
                                    ?>
                                        <tr>
                                            <td class="align-middle">
                                                <img src="../uploads/<?=$item['image'];?>" alt="" height="50px" width="50px">
                                                <?=$item['name']?>
                                            </td>
                                            <td class="align-middle">
                                            ₹<?=$item['price']?>
                                            </td>
                                            <td class="align-middle">
                                                <?=$item['orderqty']?>
                                            </td>
                                        </tr>
                                    <?php
                                }
                             }
                            
                            ?>
                                 
                                 </tbody>
                            </table>
                            <hr>
                            <!-- <h4>Total Price : <span class="float-end"><?=$data['total_price']?></span></h4> -->
                                <div class="pt-2">
                                    <div class="d-flex justify-content-between mt-2">
                                        <h5>Total Price :</h5>
                                        <h5>₹<?=$data['total_price']?></h5>
                                    </div>
                                </div>
                                <hr>
                            <div class="d-flex justify-content-between mb-3">
                            <h6>Payment Mode</h6>
                            <h6><?=$data['payment_mode']?></h6>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                            <h6>Status</h6>
                          <div class="mb-3">
                         <form action="code.php" method="post">
                            <input type="hidden" name="tracking_no" value="<?=$data['tracking_no']?>">
                         <select name="order_status" id="" class="form select">

                                <option value="0" <?=$data['status']==0?"Selected":""?>>Under Process</option>
                                <option value="1" <?=$data['status']==1?"Selected":""?>>Completed</option>
                                <option value="2" <?=$data['status']==2?"Selected":""?>>Cancelled</option>
                            </select>
                           <button class="btn btn-danger" name="order_update_btn" type="submit">Update Status</button>
                           </form>
                          </div>
                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div>
    </div>
</div>                                        
<?php 
}
else{
    ?>
    <h1><?="You Must To Login";?></h1>
    <?php 
   
}
include('includes/footer.php')
?>