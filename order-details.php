<?php
include_once 'dbfun.php';

$orderid = $_GET["orderid"];
$order=single('orders',"order_id=$orderid");
extract($order);
$addressinfo=single('cust_address',"id=$addressid");
extract($addressinfo);
?>
<h4>Details of Order with Order Id <?= $orderid ?></h4>
<h5><?= $name ?></h5>
<h5>Phone: <?= $mobile ?></h5>
<h6>Address: <?= $address ?></h6>
<h6><?= $city ?>, <?= $state ?>, <?= $pin ?></h6>
<table class="table">
    <!-- Head Row -->
    <thead>
        <tr>
            <th class="pro-remove">Sr.No.</th>
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
        $count = 1;
        foreach (alldatasql("select * from order_details c left join products p on p.prodid=c.prodid where order_id='$orderid'") as $r) {
            ?>
            <tr>
                <td class="pro-remove">
                    <?= $count++ ?>
                </td>
                <td class="pro-thumbnail"><a href="#">
                        <img src="books/<?= $r["photo"] ?>" style="width:60px;" alt="Product"></a></td>
                <td class="pro-title"><a href="#"><?= $r["pname"] ?></a></td>
                <td class="pro-price"><span><?= money($r["disc_price"]) ?></span></td>
                <td class="pro-price"><?= $r["qty"] ?></td>                
                <td class="pro-subtotal"><span><?= money($r["disc_price"] * $r["qty"]) ?></span></td>
            </tr>
            <!-- Product Row -->
        <?php } ?>

    </tbody>
</table>
<h5>Status: <?= $order_status ?></h5>

<?php 
if($order_status=='Pending') { 
if ($_SESSION["role"] == "Admin") { ?>   
<a class="btn btn--primary float-right" href="change-order-status.php?oid=<?= $orderid ?>&st=y">Confirm Order</a>      
<?php } else { ?>
 <a class="btn btn-danger float-right mr-2" href="change-order-status.php?oid=<?= $orderid ?>&st=x">Cancel Order</a> 
<?php } }?>

