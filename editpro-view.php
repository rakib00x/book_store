<style>
    .form-control{
        padding:4px;
        height:35px;
    }
</style>
<?php
include_once 'dbfun.php';
$prodid = $_GET["prodid"];
$p = single("products", "prodid=$prodid");
extract($p);
?>
<div class="row">
    <div class="col-sm-12">
        <h4 class="text-center mb-2 border-bottom pb-2">Update Book Information</h4>
        <form method="post" enctype="multipart/form-data" action="updatepro.php">
            <div class="form-row">
                <div class="col-3">
                    <img src="books/<?= $photo ?>">
                </div>
                <div class="col-9">
                    <div class="form-row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Book Name</label>
                                <input type="hidden" name="prodid" value="<?= $prodid ?>">
                                <input type="text" name="pname" value="<?= $pname ?>" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Book Category</label>   
                                <select name="pcat" class="form-control">
                                    <?php
                                    foreach (allrecords("category") as $c) {
                                        ?>
                                        <option value="<?= $c["catid"] ?>"><?= $c["category"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select> 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Book Author</label>   
                                <input type="text" value="<?= $author ?>" name="author" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Book Publisher</label>   
                                <input type="text" value="<?= $publisher ?>" name="publisher" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Published Year</label>   
                                <input type="text" value="<?= $year ?>" name="year" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Book ISBN</label>   
                                <input type="text" value="<?= $ISBN ?>" placeholder="13digit number" maxlength="13" name="isbn" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Book Price</label>   
                                <input type="text" value="<?= $price ?>" name="price" class="form-control" placeholder="Product Price">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Discount Price</label>   
                                <input type="text" value="<?= $disc_price ?>" name="disc_price" class="form-control" placeholder="Discount Price">
                            </div>
                        </div>                                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea rows="4" class="form-control" style="resize: none" name="descr"><?= $descr ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" value="Save Book" class="btn btn--primary btn-sm">
        </form>
    </div>
</div>