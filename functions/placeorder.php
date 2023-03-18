<?php 
session_start();
include('../config/connection.php');
// require 'userfunctions.php';
if(isset($_SESSION['auth'])){
if(isset($_POST['placeOrderBtn'])){

    $name=mysqli_escape_string($con,$_POST['firstname']." ".$_POST['lastname']);
    $email=mysqli_escape_string($con,$_POST['email']);
    $phone=mysqli_escape_string($con,$_POST['phone']);
    $address=mysqli_escape_string($con,$_POST['address']);
    $pincode=mysqli_escape_string($con,$_POST['pincode']);

    $payment_mode=mysqli_escape_string($con,$_POST['payment_mode']);
    $payment_id=mysqli_escape_string($con,$_POST['payment_id']);

    $userId=$_SESSION['auth_user']['user_id'];
    $query=$con->query("SELECT c.id as cid,c.prod_id,c.prod_qty,p.id as pid,p.name,p.image,p.selling_price
          FROM carts c, product p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC");
     
    $totalPrice=0;
    while($cart=$query->fetch_assoc() ){
        $totalPrice+=$cart['selling_price']*$cart['prod_qty']; 
    }
// echo $totalPrice;
    $user_id=$_SESSION['auth_user']['user_id'];
    $tracking_no="Your ShopHouse".rand(1111,9999).substr($phone,2);
   

    $insert_query=$con->query("INSERT INTO 
    orders (
    tracking_no,
    user_id,
    name,
    email,
    phone,
    address,
    pincode,
    total_price,
    payment_mode,
    payment_id	
    ) 
    VALUES 
    (
        '$tracking_no',
        '$userId',
        '$name',
        '$email',
        '$phone',
        '$address',
        '$pincode',
        '$totalPrice',
        '$payment_mode',
        '$payment_id'
    )");
   if($insert_query){
    $order_id=mysqli_insert_id($con);
    foreach($query as $citem){
       $prod_id = $citem['prod_id'];
       $prod_qty = $citem['prod_qty'];
       $price = $citem['selling_price'];
    $insert_items_query = $con->query("INSERT INTO order_items (order_id,prod_id,qty,price) 
    VALUES('$order_id','$prod_id','$prod_qty','$price')");

    $product_query = $con->query("SELECT * FROM product WHERE id='$prod_id' LIMIT 1");
    $productData=mysqli_fetch_array($product_query);
    $current_qty=$productData['qty'];
    $new_qty=$current_qty-$prod_qty;
    $update_query=$con->query("UPDATE product SET qty='$new_qty' WHERE id='$prod_id'");
   }

   $deleteCart_query=$con->query("DELETE FROM carts WHERE user_id='$userId'");

   $_SESSION['message']="Order Placed";
   header('Location:../my-orders.php');
   die(); 
}   
}
}

?>