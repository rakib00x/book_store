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
                <h4 class="p-2" style="border-bottom: 2px solid #62ab00;color:#62ab00;">Customers</h4>
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
                                        <th></th>
                                        <th class="pro-title">Customer Name</th>
                                        <th class="pro-title">Email Id</th>                                        
                                        <th class="pro-title">Password</th> 
                                        <th class="pro-title">Token</th>                                                                               
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product Row -->
                                    <?php
                                     $count=1;
                                    foreach(allrecords("users") as $r) {                                        
                                        ?>
                                    <tr>    
                                        <td><?= $count++ ?></td>
                                        <td class="text-left"><?= $r["fname"] ?></td>
                                        <td class="text-left"><?= $r["userid"] ?></td>
                                        <td class="text-left"><?= $r["pwd"] ?></td>
                                        <td><button class="editbtn" data-href="tokenassgin.php?userid=<?= $r["id"] ?>"><i class="far fa-edit"></i></button></td>
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
        $(".editbtn").click(function () {
            var dataURL = $(this).attr("data-href");
            console.log(dataURL);
            $('.product-details-modal').load(dataURL, function () {
                $('#quickModal').modal({show: true});
            });
        });
    });
</script>

<?php include_once 'afooter.php'; ?>
