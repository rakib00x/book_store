<style>
    .form-control{
        padding:4px;
        height:35px;
    }
</style>
<?php include_once 'dbfun.php'; ?>
<div class="row">
    <div class="col-sm-12">
        <h4 class="text-center mb-2 border-bottom pb-2">Add New Book</h4>
        <form method="post" enctype="multipart/form-data" action="addpro.php">
            <div class="form-row">
                <div class="col-sm-4"> 
                    <div class="form-group">
                        <label>Book Name</label>   
                        <input type="text" name="pname" class="form-control" placeholder="Product Name">
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
                        <input type="text" list="author" name="author" class="form-control">
                        <datalist id="author">
                            <?php foreach(alldatasql("select distinct author from products") as $a) { ?>
                            <option><?= $a["author"] ?></option>
                            <?php } ?>
                        </datalist>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Book Publisher</label>   
                        <input type="text" name="publisher" list="pubs" class="form-control">
                        <datalist id="pubs">
                            <?php foreach(alldatasql("select distinct publisher from products") as $a) { ?>
                            <option><?= $a["publisher"] ?></option>
                            <?php } ?>
                        </datalist>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Published Year</label>   
                        <input type="text" name="year" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Book ISBN</label>   
                        <input type="text" placeholder="13digit number" maxlength="13" name="isbn" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Book Price</label>   
                        <input type="text" name="price" class="form-control" placeholder="Product Price">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Discount Price</label>   
                        <input type="text" name="disc_price" class="form-control" placeholder="Discount Price">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Cover Photo</label>   
                        <input type="file" name="pic" accept=".jpg" class="custom-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Book PDF</label>   
                        <input type="file" name="pdf" accept=".pdf" class="custom-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" class="form-control" style="resize: none" name="descr"></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" value="Save Book" class="btn btn--primary btn-sm">
        </form>
    </div>
</div>