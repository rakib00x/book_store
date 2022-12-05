<?php include_once "header.php"; 
$orderid=$_GET["orderid"]; 
$order=single('orders',"order_id=$orderid");
extract($order);
$addressinfo=single('cust_address',"id=$addressid");
extract($addressinfo);
?>
<section class="order-complete inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="order-complete-message text-center">
                    <h1>Thank you !</h1>
                    <p>Your order has been received.</p>
                </div>
                <ul class="order-details-list">
                    <li>Order Number: <strong><?= $orderid ?></strong></li>
                    <li>Date: <strong><?= date('d M Y') ?></strong></li>                    
                </ul>
                <p>Pay with cash upon delivery.</p>
                <h3 class="order-table-title">Order Details</h3>
                <div class="table-responsive">
                    <table class="table order-details-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $total=0;
                                    foreach(alldatasql("select * from order_details od join products p on p.prodid=od.prodid where order_id='$orderid'") as $r) { 
                                        $total+=($r["qty"]*$r["disc_price"]);
                                        ?>
                            <tr>
                                <td><a href="single-product.html"><?= $r["pname"] ?></a> <strong>× <?= $r["qty"] ?></strong></td>
                                <td><span><?= money($r["qty"]*$r["disc_price"]) ?></span></td>
                            </tr>  
                            <?php } ?>                          
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Subtotal:</th>
                                <td><span><?= money($total+($total*.10)) ?></span></td>
                            </tr>
                            <tr>
                                <th>Tax:</th>
                                <td><?= money($total*.10) ?></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><span><?= money($total+($total*.10)) ?></span></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "footer.php"; ?>