<!DOCTYPE html>
<!-- saved from url=(0051)http://demo.harnishdesign.net/html/koice/index.html -->
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="image/logo.png" rel="icon">
        <title>Invoice - Book Store</title>
        <link rel="stylesheet" type="text/css" href="css/plugins.css">
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    </head>
    <body>
        <?php
        include_once 'dbfun.php';
        $orderid=$_GET["orderid"]; 
        $order=single('orders',"order_id=$orderid");
        extract($order);
        $addressinfo=single('cust_address',"id=$addressid");
        extract($addressinfo);       
        ?>
        <!-- Container -->
        <div class="container-fluid invoice-container">
            <!-- Header -->
            <header>
                <div class="row align-items-center">
                    <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
                        <img id="logo" src="image/logo.png" style="width:120px;" title="Koice" alt="Koice">
                    </div>
                    <div class="col-sm-5 text-center text-sm-right">
                        <h4 class="text-7 mb-0">Invoice</h4>
                    </div>
                </div>
                <hr>
            </header>

            <!-- Main Content -->
            <main>
                <div class="row">
                    <div class="col-sm-6"><strong>Date:</strong> 05/12/2020</div>
                    <div class="col-sm-6 text-sm-right"> <strong>Invoice No:</strong> 16835</div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6 text-sm-right order-sm-1"> <strong>Pay To:</strong>
                        <address>
                            Apna Pustak Bhandar<br>
                            New Friends Club<br>
                            New Delhi<br>
                            India
                        </address>
                    </div>
                    <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                        <address>
                            <?= $_SESSION["uname"] ?><br>
                            <?= $address ?><br>
                            <?= $city?>, <?= $state ?> <?= $pin ?><br>
                            India
                        </address>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="card-header">
                                    <tr>
                                        <td class="border-0"><strong>Product #</strong></td>
                                        <td class="border-0"><strong>Product Name</strong></td>
                                        <td class="text-center border-0"><strong>Rate</strong></td>
                                        <td class="text-center border-0"><strong>QTY</strong></td>
                                        <td class="text-right border-0"><strong>Amount</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total=0;
                                    foreach(alldatasql("select * from order_details od join products p on p.prodid=od.prodid where order_id='$orderid'") as $r) { 
                                        $total+=($r["qty"]*$r["disc_price"]);
                                        ?>
                                    <tr>
                                        <td class="border-0"><?= $r["prodid"] ?></td>
                                        <td class="border-0"><?= $r["pname"] ?></td>
                                        <td class="border-0"><?= money($r["disc_price"]) ?></td>
                                        <td class="border-0"><?= $r["qty"] ?></td>
                                        <td class="border-0"><?= money($r["qty"]*$r["disc_price"]) ?></td>                                        
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot class="card-footer">
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Sub Total:</strong></td>
                                        <td class="text-right"><?= money($total) ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Tax:</strong></td>
                                        <td class="text-right"><?= money($total*.10) ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                        <td class="text-right"><?= money($total+($total*.10)) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Footer -->
            <footer class="text-center mt-4">
                <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
                <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> 
                    </div>
            </footer>
        </div>

    </body>
</html>