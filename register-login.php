<?php 
session_start();
if(isset($_SESSION['auth'])){
	$_SESSION['message']="You Are Already Login";
	header('location:index.php');
	exit();
}
include('includes/topbar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<link href="css/register-login.css" rel="stylesheet">
<script src="assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php 
    if(isset($_SESSION['message'])){ ?>
     <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hey</strong> <?php echo $_SESSION['message'];?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>	
		<?php 
    unset($_SESSION['message']);
}?>
    
   <div class="body">
   
	<div class="main"> 
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post" action="functions/authcode.php">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="Name" required="">
                    <input type="number" name="number" placeholder="Phone Number" required="">
					<input type="email" name="email" placeholder="Email Address" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
                    <input type="password" name="Cpswd" placeholder="Confirm Password" required="">
					<button name="sign-up">Sign up</button>
                   
				</form>
			</div>

			<div class="login">
				<form method="post" action="functions/authcode.php">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button name="login">Login</button>
				</form>
			</div>
	</div>
    </div>

<?php include('includes/footer.php');