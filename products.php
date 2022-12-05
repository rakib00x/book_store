<?php include_once 'aheader.php'; ?>
<style>
    .table thead tr th,.table tbody tr td{
        padding:7px !important;
    }
    .modal-dialog{
        margin:20px auto!important;
    }
</style>
<main class="cart-page-main-block inner-page-sec-padding-bottom">
    <div class="cart_area cart-area-padding  ">
        <div class="container-fluid">
            <div class="page-section-title">
                <button data-href="addpro-view.php" class="float-right addbtn btn btn--primary">Add Book</button>
                <h4 class="p-2" style="border-bottom: 2px solid #62ab00;color:#62ab00;">Products</h4>
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
                                        <th>Operation</th>
                                        <th>Product Id</th>
                                        <th class="pro-title">Product Name</th>
                                        <th class="pro-title">Category</th>                                        
                                        <th class="pro-title">Price</th>                                        
                                        <th class="pro-title">Author</th>                                        
                                        <th class="pro-title">Publisher</th>                                        
                                        <th class="pro-title">Year</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product Row -->
                                    <?php
                                    $userid = $_SESSION["userid"];
                                    foreach (allrecords("products") as $r) {
                                        $cat = single("category", "catid='{$r["pcat"]}'")["category"];
                                        ?>
                                        <tr>
                                            <td style="width:90px!important;">
                                                <a onclick="return confirm('Are you sure to delete this category ?')" 
                                                   href="delprod.php?prodid=<?= $r["prodid"] ?>"><i class="far fa-trash-alt"></i></a>
                                                <button class="editbtn"
                                                   data-href="editpro-view.php?prodid=<?= $r["prodid"] ?>"><i class="far fa-edit"></i></button>
                                            </td>                                        
                                            <td><?= $r["prodid"] ?></td>
                                            <td class="text-left"><?= $r["pname"] ?></td>
                                            <td class="text-left"><?= $cat ?></td>
                                            <td class="text-left"><?= money($r["disc_price"]) ?></td>
                                            <td class="text-left"><?= $r["author"] ?></td>
                                            <td class="text-left"><?= $r["publisher"] ?></td>
                                            <td class="text-left"><?= $r["year"] ?></td>

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
       $(".addbtn").click(function () {
            var dataURL = $(this).attr("data-href");
            console.log(dataURL);
            $('.product-details-modal').load(dataURL, function () {
                $('#quickModal').modal({show: true});
            });
        });
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
