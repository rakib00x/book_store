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
                <h4 class="p-2" style="border-bottom: 2px solid #62ab00;color:#62ab00;">Categories</h4>
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
                                        <th class="pro-thumbnail">Category Id</th>
                                        <th class="pro-title">Category Name</th>
                                        <th class="pro-title">No. of Books</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product Row -->
                                    <?php 
                                    $userid=$_SESSION["userid"];
                                    foreach(allrecords("category") as $r) { ?>
                                    <tr>
                                        <td class="pro-remove"><a onclick="return confirm('Are you sure to delete this category ?')" href="delcat.php?catid=<?= $r["catid"] ?>"><i class="far fa-trash-alt"></i></a>
                                        </td>                                        
                                        <td class="pro-title"><?= $r["catid"] ?></td>
                                        <td class="pro-price"><?= $r["category"] ?></td>
                                        <td class="pro-quantity"><?= countifrecords("products", "pcat='{$r["catid"]}'") ?></td>                                        
                                    </tr>
                                    <!-- Product Row -->
                                    <?php } ?>
                                                                        
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="col-4">
                    <form action="addcat.php" method="post">
                    <div class="login-form pt-2">
                        <h4>Add Category</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="cat">Category Name</label> <input
                                    class="mb-0 form-control" type="text" id="cat" name="catname"
                                    placeholder="Category Name">
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn--primary">Add Category</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
 
</main>

<?php include_once 'afooter.php'; ?>
