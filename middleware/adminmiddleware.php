<?php 
include('../functions/myfunction.php');
if(isset($_SESSION['auth'])){
if($_SESSION['role_as']!=1){
    redirect("../index.php","You Are Not Authorized to this page");
}
}   
else{
    redirect("../register-login.php","Login To Continue");

}
?>