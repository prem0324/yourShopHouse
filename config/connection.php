<?php 
$con=new mysqli('localhost','root','','project');
if($con->errno){
    die("Connection Failed ". $con);
}

?>