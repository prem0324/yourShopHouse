<?php
session_start();
include('../config/connection.php');

if(isset($_SESSION['auth'])){
    if(isset($_POST['scope'])){
    $scope=$_POST['scope'];
        switch($scope){
                case "add":
                    $prod_id=$_POST['prod_id'];
                    $prod_qty=$_POST['prod_qty'];

                    $user_id=$_SESSION['auth_user']['user_id'];

                    $chk_existing_cart=$con->query("SELECT * FROM `carts` WHERE prod_id='$prod_id' AND user_id='$user_id'");
                    if(mysqli_num_rows($chk_existing_cart)>0){
                            echo "existing";
                    }
                    else {
                    $insert_query=$con->query("INSERT INTO `carts` (user_id,prod_id,prod_qty)
                     VALUES ('$user_id','$prod_id','$prod_qty')");

                     if($insert_query){
                        echo 201;
                     }
                     else{
                        echo 500;
                     }
                    }
                    break;
                case "update":
                    $prod_id=$_POST['prod_id'];
                    $prod_qty=$_POST['prod_qty'];
                    $user_id=$_SESSION['auth_user']['user_id'];
                    $chk_existing_cart=$con->query("SELECT * FROM `carts` WHERE prod_id='$prod_id' AND user_id='$user_id'");
                    if(mysqli_num_rows($chk_existing_cart)>0){
                           $update_query=$con->query("UPDATE carts SET 
                           prod_qty='$prod_qty' WHERE prod_id='$prod_id' AND user_id='$user_id'");
                           if($update_query){
                            echo 200;
                           }
                           else{
                            echo 500;
                           }
                    }
                    else {
                                echo "Something Went Wrong";
                    }
                    break;
                case "delete":
                    $cart_id=$_POST['cart_id'];
                    $user_id=$_SESSION['auth_user']['user_id'];
                    $chk_existing_cart=$con->query("SELECT * FROM `carts` WHERE id='$cart_id' AND user_id='$user_id'");
                    if(mysqli_num_rows($chk_existing_cart)>0){
                        $delete_query=$con->query("DELETE FROM carts WHERE id='$cart_id'");
                        if($delete_query){
                         echo 200;
                        }
                        else{
                         echo 500;
                        }
                 }
                 else {
                             echo "Something Went Wrong";
                      }
                    break;
                    // case "addToCart":
                    //             $id=$_POST['prod_id'];
                    //             $user_id=$_SESSION['auth_user']['user_id'];
                    //             $chk_existing_cart=$con->query("SELECT * FROM `carts` WHERE prod_id='$prod_id' AND user_id='$user_id'");
                    // if(mysqli_num_rows($chk_existing_cart)>0){
                    //         echo "existing";
                    // }
                    // else {
                    // $insert_query=$con->query("INSERT INTO `carts` (user_id,prod_id)
                    //  VALUES ('$user_id','$prod_id')");

                    //  if($insert_query){
                    //     echo 201;
                    //  }
                    //  else{
                    //     echo 500;
                    //  }
                    // }
                    //     break;
                    default:
                    echo 500;
        }
    }
}

else{
    echo 401;
}
?>