<style>
    .form-control{
        padding:4px;
        height:35px;
    }
</style>
<?php
include_once 'dbfun.php';
$userid = $_GET["userid"];
$p = single("users", "id=$userid");
extract($p);
?>
<div class="row">
    <div class="col-sm-12">
        <h4 class="text-center mb-2 border-bottom pb-2">Update Information</h4>
        <form method="post" enctype="multipart/form-data" action="updatetokenuser.php">
            <div class="form-row">
                <div class="col-9">
                    <div class="form-row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label> Name</label>
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="text" name="pname" value="<?= $fname ?>" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Token</label>   
                                <select name="tok" class="form-control">
                                    <?php
                                    foreach (allrecords("token") as $c) {
                                        ?>
                                        <option value="<?= $c["id"] ?>"><?= $c["number"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select> 
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <input type="submit" value="Assgin Book" class="btn btn--primary btn-sm">
        </form>
    </div>
</div>