<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BOI_GHOR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Use Minified Plugins Version For Fast Page Load -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
        <link rel="shortcut icon" type="image/x-icon" href="image/boighor1.jpg">
        <link href="css/simple-notify.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/plugins.js"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/simple-notify.min.js" type="text/javascript"></script>
        <style>
            .menu-item a,.category-trigger{
                color:white !important;
            }
        </style>
    </head>
    <?php
    include_once 'dbfun.php';
    $userid = 'guest';
    if (isset($_SESSION["userid"])) {
        $userid = $_SESSION["userid"];
    }
    ?>
    <body>
        <?php include_once 'msg.php'; ?>
        <div class="site-wrapper" id="top">
            <div class="site-header header-3  d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 flex-lg-right">
                            <ul class="header-top-list">
                                <?php if(is_logged_in())  { ?>
                                <li class="dropdown-trigger language-dropdown"><a href="wishlist.php"><i
                                            class="icons-left fas fa-heart"></i>
                                        wishlist (0)</a> 
                                </li>
                                <li class="dropdown-trigger language-dropdown"><a href=""><i
                                            class="icons-left fas fa-user"></i>
                                        My Account</a><i class="fas fa-chevron-down dropdown-arrow"></i>
                                    <ul class="dropdown-box">
                                        <li> <a href="my-account.php">My Account</a></li>
                                        <li> <a href="my-account.php">Order History</a></li>
                                        <li> <a href="my-account.php">Downloads</a></li>
                                    </ul>
                                </li>
                                <li><a href="checkout.php"><i class="icons-left fas fa-share"></i> Checkout</a>
                                </li>
                                <?php } ?>
                                <li><a href="contact.php"><i class="icons-left fas fa-phone"></i> Contact</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-middle pt--10 pb--10">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <a href="index.php" class="site-brand">
                                    <!-- <img src="image/logo.png" alt="" style="width:100px;"> -->
                                    <img src="image/boighor1.jpg" alt="" style="width:100px;">
                                </a>
                            </div>
                            <div class="col-lg-5">
                                <div class="header-search-block">
                                    <form action="search.php" method="post">
                                    <input type="text" name="keyword" placeholder="Search entire store here">
                                    <button>Search</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="main-navigation flex-lg-right">
                                    <div class="cart-widget">
                                        <div class="login-block">
                                            <?php if (isset($_SESSION["userid"])) { ?>
                                                <a href="#" class="font-weight-bold">Hi! <?= $_SESSION["uname"] ?></a> <br>
                                                <span></span><a href="logout.php">Logout</a>
                                            <?php } else { ?>
                                                <a href="login.php" class="font-weight-bold">Login</a> <br>
                                                <span>or</span><a href="login.php">Register</a>
                                            <?php } ?>
                                        </div>
                                        <?php if (is_logged_in()) { ?>
                                            <div class="cart-block">
                                                <div class="cart-total">
                                                    <?php
                                                    $qty = singledata("select sum(qty) as qty from cart where userid='$userid'")["qty"];
                                                    ?>
                                                    <?php if ($qty > 0) { ?>
                                                        <span class="text-number">
                                                            <?= $qty ?>
                                                        </span>
                                                    <?php } ?>
                                                    <span class="text-item">
                                                        Shopping Cart
                                                    </span>
                                                    <?php
                                                    $total = singledata("select sum(qty*disc_price) as amount from cart c join products p on p.prodid=c.prodid where userid='$userid'")["amount"];
                                                    ?>
                                                    <span class="price pt-1">
                                                        <?= money($total) ?>
                                                        <i class="fas fa-chevron-down"></i>
                                                    </span>
                                                </div>
                                                <?php if ($qty > 0) { ?>
                                                    <div class="cart-dropdown-block">
                                                        <div class=" single-cart-block ">
                                                            <?php foreach (alldatasql("select * from cart c left join products p on p.prodid=c.prodid where userid='$userid'") as $r) { ?>
                                                                <div class="cart-product">
                                                                    <a href="#" class="image">
                                                                        <img src="books/<?= $r["photo"] ?>" style="width:70px;height:80px;" alt="">
                                                                    </a>
                                                                    <div class="content">
                                                                        <h3 class="title"><a href="product-details.php"><?= $r["pname"] ?></a></h3>
                                                                        <p class="price"><span class="qty"><?= $r["qty"] ?></span> <?= money($r["disc_price"]) ?></p>
                                                                        <a href="delcartpro.php?prodid=<?= $r["prodid"] ?>" class="cross-btn"><i class="fas fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class=" single-cart-block ">
                                                            <div class="btn-block">
                                                                <a href="cart.php" class="btn">View Cart <i
                                                                        class="fas fa-chevron-right"></i></a>
                                                                <a href="checkout.php" class="btn btn--primary">Check Out <i
                                                                        class="fas fa-chevron-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!-- @include('menu.htm') -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom bg-primary">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <nav class="category-nav">
                                    <div>
                                        <a href="javascript:void(0)" class="category-trigger"><i
                                                class="fa fa-bars"></i>Browse
                                            categories</a>                                    
                                        <ul class="category-menu">  
                                            <?php foreach (allrecords("category") as $c) { ?>
                                                <li class="cat-item"><a href="#"><?= $c["category"] ?></a></li>
                                            <?php } ?>
                                            <!-- <li class="cat-item has-children"><a href="#">Children's Books</a>
                                                 <ul class="sub-menu">
                                                     <li><a href="">Brake Tools</a></li>
                                                     <li><a href="">Driveshafts</a></li>
                                                     <li><a href="">Emergency Brake</a></li>
                                                     <li><a href="">Spools</a></li>
                                                 </ul>
                                             </li>                                                                                                                              -->
                                        </ul>
                                    </div>
                                </nav>
                            </div>                        
                            <div class="col-lg-9">
                                <div class="main-navigation flex-lg-right">
                                    <ul class="main-menu menu-right li-last-0">
                                        <li class="menu-item has-children">
                                            <a href="index.php">Home</a>                                        
                                        </li>                                        
                                        <li class="menu-item has-children">
                                            <a href="filter-products.php">Products</a>                                        
                                        </li> 
                                        <?php if (is_logged_in()) { ?>
                                            <li class="menu-item has-children">
                                                <a href="my-account.php">Dashboard</a>                                        
                                            </li>
                                        <?php } ?>
                                        <li class="menu-item has-children">
                                            <a href="contact.php">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
