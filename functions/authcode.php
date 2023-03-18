<?php 
session_start(); 

include('myfunction.php');
include('../config/connection.php');


if(isset($_POST['sign-up'])){
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $number=mysqli_real_escape_string($con,$_POST['number']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $pswd=mysqli_real_escape_string($con,$_POST['pswd']);
    $Cpswd=mysqli_real_escape_string($con,$_POST['Cpswd']);

    //if user is registerd
    $check_email_query=$con->query("SELECT email FROM `site-user` WHERE email='$email'");
    // $check_email_query_run=mysqli_query($con,$check_email_query);
   if($check_email_query->num_rows){
    redirect("../register-login.php","Email Already registered");
   }
    if($pswd == $Cpswd){
            //insert user data
            $insert_query="INSERT INTO `site-user` (name,phone,email,password) VALUES('$name','$number','$email','$pswd')";
            $insert_query_run=mysqli_query($con,$insert_query);


            if( $insert_query){
                redirect("../register-login.php","Register SuccessFull Login Now");
            }
            else{
                redirect("../register-login.php","Somthing Went Wrong");
            }
    }
    else{
        redirect("../register-login.php","Passwords do not match");
    }
}
else if(isset($_POST['login'])){
    // $_SESSION['auth']=true;
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['pswd']);

    $login_query="SELECT * FROM `site-user` WHERE email='$email' AND password='$password'";
    $login_query_run=mysqli_query($con,$login_query);
    if(mysqli_num_rows($login_query_run)>0){
        $_SESSION['auth']=true;

        $userdata=mysqli_fetch_array($login_query_run);
        $userid=$userdata['id'];
        $username=$userdata['name'];
        $useremail=$userdata['email'];
        $role_as=$userdata['role_as'];


        $_SESSION['auth_user']=[
            'user_id'=>$userid,
            'name'=>$username,
            'email'=>$username];

            $_SESSION['role_as']=$role_as;
            if($role_as==1){
                redirect("../admin/index.php","Welcome To DashBoard");
            }
           else{
            redirect("../index.php","LoggedIn Successfully");
           }
    }
    else{
        redirect("../register-login.php","Invalid Email Or Password ");
    }
    }

?>