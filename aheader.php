<!DOCTYPE html>
<html lang="zxx">
    <?php include_once 'dbfun.php'; ?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BOI GHOR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Use Minified Plugins Version For Fast Page Load -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
        <link href="css/simple-notify.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/x-icon" href="image/logo.png">
        <script src="js/plugins.js"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/simple-notify.min.js" type="text/javascript"></script>
    </head>

    <body>
        <?php include_once 'msg.php'; ?>
        <div class="site-wrapper" id="top">
            <div class="site-header header-3  d-none d-lg-block">                
                <div class="header-bottom">
                    <div class="container-fluid">
                        <div class="row align-items-center bg--primary">
                            <div class="col-lg-4">
                                <h5>Welcome Mahfuz</h5>
                            </div>
                            <div class="col-lg-8">
                                <div class="main-navigation flex-lg-right">
                                    <ul class="main-menu menu-right li-last-0">
                                        <li class="menu-item">
                                            <a href="adminhome.php">Dashboard</a>                                        
                                        </li>
                                        <li class="menu-item">
                                            <a href="categories.php">Categories</a>                                        
                                        </li>
                                        <li class="menu-item">
                                            <a href="products.php">Products</a>                                        
                                        </li>                                    
                                        <li class="menu-item">
                                            <a href="customers.php">Customers</a>                                        
                                        </li>
                                        <li class="menu-item">
                                            <a href="orders.php">Orders</a>                                        
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <!-- My Account Tab Menu Start -->
                                <div class="col-lg-2 col-12" style="">
                                    <div class="myaccount-tab-menu nav" style="border:1px solid black;height:83vh;">
                                        <a href="adminhome.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a> 
                                        <a href="categories.php"><i class="fas fa-sticky-note"></i> Category</a>
                                        <a href="products.php"><i class="fas fa-star"></i> Products</a>
                                        <a href="customers.php"><i class="fas fa-star"></i> Customers</a>
                                        <a href="orders.php"><i class="fas fa-cart-arrow-down"></i> Orders</a>
                                        
                                        <a href="changepwd.php"><i class="fas fa-user"></i> Change Password</a> 
                                        <a href="createtoken.php"><i class="fas fa-user"></i> Token</a> 
                                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> 
                                    </div>
                                </div>
                                <div class="col-lg-10 col-12 mt--30 mt-lg--0">
                                    <div class="tab-content" id="myaccountContent">
