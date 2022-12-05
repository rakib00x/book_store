<?php include_once 'aheader.php'; ?>
<style>
    .table thead tr th,.table tbody tr td{
        padding:7px !important;
    }
</style>
<main class="cart-page-main-block">
    <div class="cart_area cart-area-padding">
        <div class="container">
            <div class="account-details-form">
                <form method="post" action="changeprocess.php">
                    <div class="row">
                        <div class="col-12  mb--30"> 
                            <h4>Password change</h4>
                        </div>
                        <div class="col-12  mb--30">
                            <input id="current-pwd" name="opwd" placeholder="Current Password"
                                   type="password">
                        </div>
                        <div class="col-lg-6 col-12  mb--30">
                            <input id="new-pwd" name="pwd" placeholder="New Password"
                                   type="password">
                        </div>
                        <div class="col-lg-6 col-12  mb--30">
                            <input id="confirm-pwd" name="cpwd" placeholder="Confirm Password"
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
</main>

<?php include_once 'afooter.php'; ?>