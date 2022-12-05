<?php include_once "header.php"; ?>
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">View Cart</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<main class="cart-page-main-block inner-page-sec-padding-bottom">
    <div class="cart_area cart-area-padding  ">
        <div class="container">
            <div class="page-section-title">
                <h1>Shopping Cart</h1>
            </div>
            <div class="row">
                <div class="col-8">
                    <form action="#" class="">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb--40">
                            <table class="table">
                                <!-- Head Row -->
                                <thead>
                                    <tr>
                                        <th class="pro-remove"></th>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <!-- Product Row -->
                                    <?php 
                                    $userid=$_SESSION["userid"];
                                    $total=0;
                                    foreach(alldatasql("select * from cart c left join products p on p.prodid=c.prodid where userid='$userid'") as $r) { 
                                        $total+=($r["disc_price"]*$r["qty"]);
                                        ?>
                                    <tr>
                                        <td class="pro-remove">
                                            <a onclick="return confirm('Are you sure to remove this item from cart ?')"
                                                href="delcartpro.php?prodid=<?= $r["prodid"]?>"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        <td class="pro-thumbnail"><a href="#">
                                                <img src="books/<?= $r["photo"] ?>" alt="Product"></a></td>
                                        <td class="pro-title"><a href="#"><?= $r["pname"] ?></a></td>
                                        <td class="pro-price"><span><?= money($r["disc_price"]) ?></span></td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty">
                                                <div class="count-input-block">
                                                    <input type="number" class="form-control text-center" value="<?= $r["qty"] ?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span><?= money($r["disc_price"]*$r["qty"]) ?></span></td>
                                    </tr>
                                    <!-- Product Row -->
                                    <?php } ?>
                                                                        
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="col-4">
                    <div class="cart-summary">
                        <div class="cart-summary-wrap">
                            <h4><span>Cart Summary</span></h4>
                            <p>Sub Total <span class="text-primary"><?= money($total) ?></span></p>
                            <p>Shipping Cost <span class="text-primary"><?= money(100) ?></span></p>
                            <h2>Grand Total <span class="text-primary"><?= money($total+100) ?></span></h2>
                        </div>
                        <div class="cart-summary-button">
                            <a href="checkout.php" class="checkout-btn c-btn btn--primary">Checkout</a>
                            <button class="update-btn c-btn btn-outlined">Update Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-section-2">
        <div class="container">
            <div class="row">             
                <!-- Cart Summary -->
                
            </div>
        </div>
    </div>
</main>

<?php include_once "footer.php"; ?>