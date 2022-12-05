<?php include_once "header.php"; ?>
<style>
    .modal-dialog{
        margin:auto!important;
    }
</style>
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">My Account</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="active" data-toggle="tab"><i
                                    class="fas fa-tachometer-alt"></i> Dashboard</a> <a href="#orders"
                                                                                data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                Orders</a> <a href="#download" data-toggle="tab"><i
                                    class="fas fa-download"></i> Download</a> 
                             <a
                               href="#account-info" data-toggle="tab"><i
                                    class="fa fa-user"></i> Account Details</a>
                                 <a
                               href="#wallet" data-toggle="tab"><i
                                    class="fa fa-user"></i> Wallet</a>
                                     <a
                                href="logout.php"><i class="fas fa-sign-out-alt"></i>
                                Logout</a>
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->
                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade active show" id="dashboad" role="tabpanel">
                                <div class="myaccount-content show">
                                    <h3>Dashboard</h3>
                                    <div class="welcome mb-20">
                                        <p>
                                            Hello, <strong><?= $_SESSION["uname"] ?></strong>
                                        </p>
                                    </div>
                                    <p class="mb-0">From your account dashboard. you can easily
                                        check &amp; view your recent orders, manage your shipping and
                                        billing addresses and edit your password and account details.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Order #</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 1;
                                                foreach (findall("orders", "userid='{$_SESSION["userid"]}' order by order_id desc") as $r) {
                                                    $total= singledata("select sum(disc_price*qty) as amount from order_details od join products p on od.prodid=p.prodid where order_id='{$r["order_id"]}'")["amount"];
                                                    ?>
                                                    <tr>
                                                        <td><?= $count++ ?></td>
                                                        <td><?= $r["order_id"] ?></td>
                                                        <td><?= pretty_date($r["orderdate"]) ?></td>
                                                        <td><?= $r["order_status"] ?></td>
                                                        <td><?= money($total) ?></td>
                                                        <td><button data-href="order-details.php?orderid=<?= $r["order_id"] ?>" class="btn p-2 btn--primary details">View</button></td>
                                                    </tr>
                                                <?php } ?>                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="download" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Downloads</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Product ID</th>
                                                    <th>Product Name</th>
                                                    <th>Photo</th>
                                                    <th>Download/View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach (findall("mybooks", "userid='{$_SESSION["userid"]}'") as $r) { ?>
                                                    <tr>
                                                        <td><?= $r["prodid"] ?></td>
                                                        <td><?= $r["pname"] ?></td>
                                                        <td><img src="books/<?= $r["photo"] ?>" style="width:70px;"></td>
                                                        <td>
                                                            <a href="PDFs/<?= $r["pdf"] ?>" download class="btn btn--primary" style="padding: 0 12px;"><i class="fa fa-download"></i></a>
                                                            <button class="btn btn-dark viewbook" data-href="pdfview.php?prodid=<?= $r["prodid"] ?>" style="padding: 0 12px;"><i class="fa fa-eye"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Billing Address</h3>
                                    <address>
                                        <p>
                                            <strong>Alex Tuntuni</strong>
                                        </p>
                                        <p>
                                            1355 Market St, Suite 900 <br> San Francisco, CA 94103
                                        </p>
                                        <p>Mobile: (123) 456-7890</p>
                                    </address>
                                    <a href="#" class="btn btn--primary"><i class="fa fa-edit"></i>Edit
                                        Address</a>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="wallet"
                                 role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Online Wallet</h3>

                                    <?php 
                                    $hpp= $_SESSION["userid"];
                                    $result=single("users","userid='$hpp' limit 1");
                                    $ids= $result['id'];
                                    if($ids){
                                       $blance=single("token","id='$ids' limit 1");
                                    }
                                    ?>
                                    <div class="account-details-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-12  mb--30">
                                                    <label for="">Amount</label>
                                                    <input id="display-name" placeholder="Your Name"
                                                           type="text" value="<?= $blance['amount'] ?>">
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <label>Token Number</label>
                                                    <input id="email" value="<?= $blance["number"] ?>" readonly placeholder="Email Address" type="email">
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Billing Address</h3>
                                    <address>
                                        <p>
                                            <strong>Alex Tuntuni</strong>
                                        </p>
                                        <p>
                                            1355 Market St, Suite 900 <br> San Francisco, CA 94103
                                        </p>
                                        <p>Mobile: (123) 456-7890</p>
                                    </address>
                                    <a href="#" class="btn btn--primary"><i class="fa fa-edit"></i>Edit
                                        Address</a>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info"
                                 role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>
                                    <div class="account-details-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-12  mb--30">
                                                    <input id="display-name" placeholder="Your Name"
                                                           type="text" value="<?= $_SESSION["uname"] ?>">
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <input id="email" value="<?= $_SESSION["userid"] ?>" readonly placeholder="Email Address" type="email">
                                                </div>
                                                <div class="col-12 mb--20">
                                                    <button class="btn btn--primary">Update Details</button>
                                                </div>

                                                <div class="col-12  mb--30">
                                                    <h4>Password change</h4>
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <input id="current-pwd" placeholder="Current Password"
                                                           type="password">
                                                </div>
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input id="new-pwd" placeholder="New Password"
                                                           type="password">
                                                </div>
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input id="confirm-pwd" placeholder="Confirm Password"
                                                           type="password">
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn--primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<script>
    $(function () {
        $(".viewbook").click(function () {
            var dataURL = $(this).attr("data-href");
            console.log(dataURL);
            $('.product-details-modal').load(dataURL, function () {
                $('#quickModal').modal({show: true});
            });
        });
        $(".details").click(function () {
            var dataURL = $(this).attr("data-href");
            console.log(dataURL);
            $('.product-details-modal').load(dataURL, function () {
                $('#quickModal').modal({show: true});
            });
        });
    });
</script>
<?php include_once "footer.php"; ?>