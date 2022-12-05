<?php include_once "header.php"; ?>
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Checkout Form s-->
                <div class="checkout-form">
                    <form action="placeorder.php" method="post">
                        <div class="row row-40"> 
                            <div class="col-12">
                                <h1 class="quick-title">Checkout</h1>                           
                            </div>
                            <div class="col-lg-7 mb--20">
                                <!-- Billing Address -->
                                <div id="billing-form" class="mb-40">
                                    <h4 class="checkout-title">Shipping Address</h4>
                                    <div class="row">
                                        <div class="col-12 mb--20">
                                            <label>Full Name*</label>
                                            <input type="text" name="name" required placeholder="First Name" value="<?= $_SESSION["uname"] ?>">
                                        </div>                                                                                                                        
                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Email Address*</label>
                                            <input type="email" name="userid" required placeholder="Email Address" value="<?= $_SESSION["userid"] ?>">
                                        </div>
                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Phone no*</label>
                                            <input type="text" name="mobile" required maxlength="10" placeholder="Phone number">
                                        </div>
                                        <div class="col-12 mb--20">
                                            <label>Address*</label>
                                            <input type="text" name="address" required placeholder="Address ">                                            
                                        </div>
                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Town/City*</label>
                                            <input type="text" name="city" required placeholder="Town/City">
                                        </div>
                                        <div class="col-md-6 col-12 mb--20">
                                            <label>State*</label>
                                            <input type="text" name="state" required placeholder="State">
                                        </div>
                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Zip Code*</label>
                                            <input type="text" name="pin" required placeholder="Zip Code">
                                        </div>                                        
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-lg-5">
                                <div class="row">                                    
                                    <div class="col-12">
                                        <div class="checkout-cart-total bg-warning row">
                                            <h2 class="checkout-title">Payment Details</h2>                                            
                                            <div class="col-12 mb--20">
                                            <label>TOKEN*</label>
                                            <input type="text" name="token" maxlength="16" required placeholder="Enter token number ">                                            
                                        </div>
                                        <div class="col-6">
                                            <label>TVV</label>
                                            <input type="text" name="cardno" maxlength="3"  placeholder="Token verification value ">                                            
                                        </div>
                                        <div class="col-6">
                                            <label>Expiry Date</label>
                                            <input type="month" name="cardno" maxlength="16">                                            
                                        </div>                                            
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div class="checkout-cart-total bg-warning">
                                            <h2 class="checkout-title">YOUR ORDER</h2>
                                            <h4>Product <span>Total</span></h4>
                                            <ul>
                                                <?php
                                                $total = 0;
                                                foreach (alldatasql("select * from cart c left join products p on p.prodid=c.prodid where userid='$userid'") as $r) {
                                                    $total += $r["qty"] * $r["disc_price"];
                                                    ?>
                                                    <li><span class="left"><?= $r["pname"] ?> X <?= $r["qty"] ?></span> <span class="right"><?= money($r["qty"] * $r["disc_price"]) ?></span></li>
                                                <?php }
                                                ?>
                                            </ul>
                                            <p>Sub Total <span><?= money($total) ?></span></p>
                                            <p>Shipping Fee <span><?= money(100) ?></span></p>
                                            <h4>Grand Total <input name="totalamount" value="<?= money($total + 100) ?>" readonly></h4>

                                            <div class="term-block">
                                                <input type="checkbox" required id="accept_terms2">
                                                <label for="accept_terms2">I’ve read and accept the terms &amp;
                                                    conditions</label>
                                            </div>
                                            <button class="place-order w-100">Place order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once "footer.php"; ?>