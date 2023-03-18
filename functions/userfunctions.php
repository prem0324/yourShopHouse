<?php 
session_start();
include('config/connection.php');

function getAllmale($table){
 global $con;
 $query=$con->query("SELECT * FROM $table WHERE _for_='male' AND status='1'");
 return $query;
}

function getAllTranding(){
    global $con;
    $query=$con->query("SELECT * FROM product WHERE  trending='1'");
    return $query;
   }
   

function redirect($url,$msg){
    $_SESSION['message']=$msg;
    header('location:'.$url);
    exit();
}

function getIdActive($table,$id){
global $con;
 $query=$con->query("SELECT * FROM $table WHERE id='$id'AND status='1'");
 return $query;
}

function getSlugActive($table,$slug){
    global $con;
     $query=$con->query("SELECT * FROM $table WHERE slug='$slug'AND status='1' LIMIT 1");
     return $query;
    }

    function getProductByCategory($category_id){
        global $con;
     $query=$con->query("SELECT * FROM product WHERE category_id='$category_id' ");
     return $query;
    }

    function getCartItems(){
        global $con;
        $userId=$_SESSION['auth_user']['user_id'];
        $query=$con->query("SELECT c.id as cid,c.prod_id,c.prod_qty,p.id as pid,p.name,p.image,p.selling_price
              FROM carts c, product p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC");
            return $query;
    } 

    function getCate($table){
        global $con;
        $query=$con->query("SELECT * FROM $table ");
        return $query;
       }
       
       function getOrders(){
        global $con;
        $userId=$_SESSION['auth_user']['user_id'];
        $query=$con->query("SELECT * FROM orders WHERE user_id='$userId' ORDER BY id DESC");
        return $query;
       }

       function checkTrackingNoValid($trackingNo){
        global $con;
        $userId=$_SESSION['auth_user']['user_id'];
        $query=$con->query("SELECT * FROM  orders WHERE tracking_no='$trackingNo' AND user_id='$userId'");
        return $query;
       }

       function getCartNum(){
        $userId=$_SESSION['auth_user']['user_id'];

        global $con;
        $query=$con->query("SELECT * FROM carts WHERE user_id='$userId'");
        return $query;
       }
       function getAllFemale($table){
        global $con;
        $query=$con->query("SELECT * FROM $table WHERE _for_='female' AND status='1'");
        return $query;
       }

       function getAllKids($table){
        global $con;
        $query=$con->query("SELECT * FROM $table WHERE _for_='kids' AND status='1'");
        return $query;
       }
       function UserDeatail(){
        global $con;
        $userId=$_SESSION['auth_user']['user_id'];
        $query=$con->query("SELECT * FROM `site-user` WHERE id='$userId'");
        return $query;
       }
       function getID(){
        global $con;
        $id =$_SESSION['auth_user']['user_id'];
        return $con->query("SELECT * FROM `site-user` WHERE id='$id'");
        
       }
?>