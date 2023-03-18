<?php 
session_start();
include('../config/connection.php');

function getAll($table){
    global $con;
 $query=$con->query("SELECT * FROM $table");
 return $query;
}
function getById($table,$id){
    global $con;
 $query=$con->query("SELECT * FROM $table WHERE id='$id'");
 return $query;
}

function getAllActive($table){
    global $con;
 $query=$con->query("SELECT * FROM $table WHERE status='0'");
 return $query;
}

function redirect($url,$msg){
    $_SESSION['message']=$msg;
    header('location:'.$url);
    exit();
}
function getProdId($table){
 
    global $con;
 $cate_query=$con->query("SELECT * FROM $table");
 $category=mysqli_fetch_array($cate_query);
 $category_id=$category['id'];
 $query=$con->query("SELECT id FROM $table WHERE id='$category_id'");
 
 $prod_id=$query['id'];
 return $prod_id;
}
function getAllOrders(){
    global $con;
    $query=$con->query("SELECT * FROM orders WHERE status='0'");
    return $query;
}

function checkTrackingNoValid($trackingNo){
    global $con;
   
    $query=$con->query("SELECT * FROM  orders WHERE tracking_no='$trackingNo' ");
    return $query;
}

function getOrderHistory(){
    global $con;
    $query=$con->query("SELECT * FROM orders WHERE status !='0'");
    return $query;
}
?>