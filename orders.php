<?php include_once 'aheader.php'; ?>
<style>
    .table thead tr th,.table tbody tr td{
        padding:7px !important;
    }
</style>
<main class="cart-page-main-block inner-page-sec-padding-bottom">
    <div class="cart_area cart-area-padding  ">
        <div class="container-fluid">
            <div class="page-section-title">                
                <h4 class="p-2" style="border-bottom: 2px solid #62ab00;color:#62ab00;">Orders</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="#" class="">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb--40">
                            <table class="table">
                                <!-- Head Row -->
                                <thead>
                                    <tr>       
                                        <th>Order #</th>
                                        <th class="pro-title">Customer Name</th>
                                        <th class="pro-title">Email Id</th>                                        
                                        <th class="pro-title">Order Date</th>
                                        <th class="pro-title">Amount</th>
                                        <th class="pro-title">Status</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product Row -->
                                    <?php
                                    $count = 1;
                                    foreach (allrecords("orders order by order_id desc") as $r) {
                                        $uname = single("users", "userid='{$r["userid"]}'")["fname"];
                                        $orderid=$r["order_id"];
                                        $amount= singledata("select sum(disc_price*qty) amount from order_details od join products p on p.prodid=od.prodid where od.order_id=$orderid")["amount"];
                                        ?>
                                        <tr>    
                                            <td><?= $r["order_id"] ?></td>
                                            <td class="text-left"><?= $uname ?></td>
                                            <td class="text-left"><?= $r["userid"] ?></td>
                                            <td class="text-left"><?= pretty_date($r["orderdate"]) ?></td>
                                            <td class="text-left"><?= money($amount) ?></td>
                                            <td class="text-left"><?= $r["order_status"] ?></td>
                                            <td class="text-left"><button data-href="order-details.php?orderid=<?= $r["order_id"] ?>" style="padding:5px 6px!important;min-height: 25px;" class="btn btn--primary orderdetails">Select</button></td>
                                        </tr>
                                        <!-- Product Row -->
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
<script>
$(function(){
    $(".orderdetails").click(function () {
            var dataURL = $(this).attr("data-href");
            console.log(dataURL);
            $('.product-details-modal').load(dataURL, function () {
                $('#quickModal').modal({show: true});
            });
        });
});
</script>

<?php include_once 'afooter.php'; ?>
