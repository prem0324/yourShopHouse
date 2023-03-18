
<head>
    <meta charset="utf-8">
    <title>Your ShopHouse</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
           <?php 
           if(isset($_SESSION['auth'])){
                
            ?>
             <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['auth_user']['name'];?></button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <!-- <a href="register-login.php" class="dropdown-item">Account  </a>
                        <a href="register-login.php" class="dropdown-item">Logout</a> -->
                       <a href="logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                    </div>
                </div> 
           <?php 
           }
           else{
            ?>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><img src="https://icons8.com/icon/5tsTtEE1S9CP/person" alt=""></button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a href="register-login.php" class="dropdown-item">Login</a>
                        <a href="register-login.php" class="dropdown-item">Sign-in</a>
                        </div>
                    </div>
                    </div>
                </div> 
                        <?php
           }
           ?>
               