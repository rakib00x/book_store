<?php include_once 'aheader.php'; ?>
<h4 class="p-2" style="border-bottom: 2px solid #62ab00;color:#62ab00;">Admin Panel</h4>
<div class="row mt-2">
    <div class="col-sm-3">
        <div class="card border-success border text-center p-2">
            <h4>Products</h4>
            <h5><?= countrecords("products") ?></h5>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card border-primary border text-center p-2">
            <h4>Categories</h4>
            <h5><?= countrecords("category") ?></h5>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card border-dark border text-center p-2">
            <h4>Authors</h4>
            <h5><?= count(alldatasql("select distinct author from products")) ?></h5>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card border-dark border text-center p-2">
            <h4>Publishers</h4>
            <h5><?= count(alldatasql("select distinct publisher from products")) ?></h5>
        </div>
    </div>
    
</div>
<div class="row mt-2">
    
    <div class="col-sm-3">
        <div class="card border-info border text-center p-2">
            <h4>Today's Orders</h4>
            <h5><?= countrecords("orders where date(orderdate)=date(now())") ?></h5>
        </div>
    </div>
</div>
    <?php include_once 'afooter.php'; ?>
