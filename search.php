<?php include_once 'header.php'; ?>
<style>
    .modal{
        height:auto;
        top:-85px;
    }
</style>
<?php
 $keyword = trim($_POST['keyword']);

$query= "select * from products where pname like '%$keyword%'";
$min= singledata("select min(disc_price) as amt from products")["amt"];
$max= singledata("select max(disc_price) as amt from products")["amt"];
$mmin=$min;
$mmax=$max;
if(isset($_GET["pcat"]))
$query.=" and pcat=".$_GET["pcat"];

if(isset($_GET["author"]))
    $query.=" and author='".$_GET["author"]."'";

if(isset($_GET["pub"]))
    $query.=" and publisher='".$_GET["pub"]."'";

if(isset($_GET["min"])){
    $mmin=$_GET["min"];
    $mmax=$_GET["max"];
    
    $query.=" and disc_price between $mmin and $mmax";
}
$left="$mmin/$max";
$width="";
?>
<main class="inner-page-sec-padding-bottom mt-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-2">
                <div class="shop-toolbar with-sidebar mb--30">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2 col-sm-6">
                            <!-- Product View Mode -->
                            <div class="product-view-mode">
                                <a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
                                <a href="#" class="sorting-btn" data-target="grid-four">
                                    <span class="grid-four-icon">
                                        <i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
                                    </span>
                                </a>
                                <a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6  mt--10 mt-sm--0">
                            <span class="toolbar-status">
                                Showing 1 to 9 of 14 (2 Pages)
                            </span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
                            <div class="sorting-selection">
                                <span>Show:</span>
                                <select class="form-control nice-select sort-select" style="display: none;">
                                    <option value="" selected="selected">3</option>
                                    <option value="">9</option>
                                    <option value="">5</option>
                                    <option value="">10</option>
                                    <option value="">12</option>
                                </select><div class="nice-select form-control sort-select" tabindex="0"><span class="current">3</span><ul class="list"><li data-value="" class="option selected">3</li><li data-value="" class="option">9</li><li data-value="" class="option">5</li><li data-value="" class="option">10</li><li data-value="" class="option">12</li></ul></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                            <div class="sorting-selection">
                                <span>Sort By:</span>
                                <select class="form-control nice-select sort-select mr-0" style="display: none;">
                                    <option value="" selected="selected">Default Sorting</option>
                                    <option value="">Sort
                                        By:Name (A - Z)</option>
                                    <option value="">Sort
                                        By:Name (Z - A)</option>
                                    <option value="">Sort
                                        By:Price (Low &gt; High)</option>
                                    <option value="">Sort
                                        By:Price (High &gt; Low)</option>
                                    <option value="">Sort
                                        By:Rating (Highest)</option>
                                    <option value="">Sort
                                        By:Rating (Lowest)</option>
                                    <option value="">Sort
                                        By:Model (A - Z)</option>
                                    <option value="">Sort
                                        By:Model (Z - A)</option>
                                </select><div class="nice-select form-control sort-select mr-0" tabindex="0"><span class="current">Default Sorting</span><ul class="list"><li data-value="" class="option selected">Default Sorting</li><li data-value="" class="option">Sort
                                            By:Name (A - Z)</li><li data-value="" class="option">Sort
                                            By:Name (Z - A)</li><li data-value="" class="option">Sort
                                            By:Price (Low &gt; High)</li><li data-value="" class="option">Sort
                                            By:Price (High &gt; Low)</li><li data-value="" class="option">Sort
                                            By:Rating (Highest)</li><li data-value="" class="option">Sort
                                            By:Rating (Lowest)</li><li data-value="" class="option">Sort
                                            By:Model (A - Z)</li><li data-value="" class="option">Sort
                                            By:Model (Z - A)</li></ul></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-toolbar d-none">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2 col-sm-6">
                            <!-- Product View Mode -->
                            <div class="product-view-mode">
                                <a href="#" class="sorting-btn" data-target="grid"><i class="fas fa-th"></i></a>
                                <a href="#" class="sorting-btn" data-target="grid-four">
                                    <span class="grid-four-icon">
                                        <i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
                                    </span>
                                </a>
                                <a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
                            <span class="toolbar-status">
                                Showing 1 to 9 of 14 (2 Pages)
                            </span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
                            <div class="sorting-selection">
                                <span>Show:</span>
                                <select class="form-control nice-select sort-select" style="display: none;">
                                    <option value="" selected="selected">3</option>
                                    <option value="">9</option>
                                    <option value="">5</option>
                                    <option value="">10</option>
                                    <option value="">12</option>
                                </select><div class="nice-select form-control sort-select" tabindex="0"><span class="current">3</span><ul class="list"><li data-value="" class="option selected">3</li><li data-value="" class="option">9</li><li data-value="" class="option">5</li><li data-value="" class="option">10</li><li data-value="" class="option">12</li></ul></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                            <div class="sorting-selection">
                                <span>Sort By:</span>
                                <select class="form-control nice-select sort-select mr-0" style="display: none;">
                                    <option value="" selected="selected">Default Sorting</option>
                                    <option value="">Sort
                                        By:Name (A - Z)</option>
                                    <option value="">Sort
                                        By:Name (Z - A)</option>
                                    <option value="">Sort
                                        By:Price (Low &gt; High)</option>
                                    <option value="">Sort
                                        By:Price (High &gt; Low)</option>
                                    <option value="">Sort
                                        By:Rating (Highest)</option>
                                    <option value="">Sort
                                        By:Rating (Lowest)</option>
                                    <option value="">Sort
                                        By:Model (A - Z)</option>
                                    <option value="">Sort
                                        By:Model (Z - A)</option>
                                </select><div class="nice-select form-control sort-select mr-0" tabindex="0"><span class="current">Default Sorting</span><ul class="list"><li data-value="" class="option selected">Default Sorting</li><li data-value="" class="option">Sort
                                            By:Name (A - Z)</li><li data-value="" class="option">Sort
                                            By:Name (Z - A)</li><li data-value="" class="option">Sort
                                            By:Price (Low &gt; High)</li><li data-value="" class="option">Sort
                                            By:Price (High &gt; Low)</li><li data-value="" class="option">Sort
                                            By:Rating (Highest)</li><li data-value="" class="option">Sort
                                            By:Rating (Lowest)</li><li data-value="" class="option">Sort
                                            By:Model (A - Z)</li><li data-value="" class="option">Sort
                                            By:Model (Z - A)</li></ul></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-product-wrap with-pagination row space-db--30 shop-border grid">                    
                    <?php foreach (alldatasql($query) as $p) { ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-card">
                                <div class="product-grid-content">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            <?= $p["author"] ?>
                                        </a>
                                        <h3><a href="product-details.php"><?= $p["pname"] ?></a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="books/<?= $p["photo"] ?>" style="height:250px;" alt="">
                                            <div class="hover-contents">
                                                <a href="#" data-href="product-view.php?prodid=<?= $p["prodid"] ?>" class="hover-image single-btn">
                                                    <img src="books/<?= $p["photo"] ?>" style="height:250px;" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="addtocart.php?prodid=<?= $p["prodid"]?>&qty=1" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.php" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>                                                    
                                                    <a href="#" data-href="product-view.php?prodid=<?= $p["prodid"] ?>" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price"><?= money($p["disc_price"]) ?></span>
                                            <del class="price-old"><?= money($p["price"]) ?></del>
                                            <span class="price-discount"><?= money($p["price"] - $p["disc_price"]) ?> Off</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-list-content">
                                    <div class="card-image">
                                        <img src="books/<?= $p["photo"] ?>" style="height:250px;" alt="">
                                    </div>
                                    <div class="product-card--body">
                                        <div class="product-header">
                                            <a href="" class="author">
                                                <?= $p["author"] ?>
                                            </a>
                                            <h3><a href="product-details.html" tabindex="0"><?= $p["pname"] ?></a></h3>
                                        </div>
                                        <article>
                                            <h2 class="sr-only">Card List Article</h2>
                                            <p>More room to move. With 80GB or 160GB of storage and up to 40 hours
                                                of battery life, the new iPod classic lets you enjoy
                                                up to 40,000 songs or..</p>
                                        </article>
                                        <div class="price-block">
                                            <span class="price"><?= money($p["disc_price"]) ?></span>
                                            <del class="price-old"><?= money($p["price"]) ?></del>
                                            <span class="price-discount"><?= money($p["price"] - $p["disc_price"]) ?> Off</span>
                                        </div>
                                        <div class="rating-block">
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star "></span>
                                        </div>
                                        <div class="btn-block">
                                            <a href="addtocart.php?prodid=<?= $p["prodid"]?>&qty=1" class="btn btn-outlined">Add To Cart</a>
                                            <a href="wishlist.php" class="card-link"><i class="fas fa-heart"></i> Add To
                                                Wishlist</a>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Pagination Block -->
                <div class="row pt--30">
                    <div class="col-md-12">
                        <div class="pagination-block">
                            <ul class="pagination-btns flex-center">
                                <li><a href="" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i> </a></li>
                                <li><a href="" class="single-btn prev-btn "><i class="zmdi zmdi-chevron-left"></i> </a></li>
                                <li class="active"><a href="" class="single-btn">1</a></li>
                                <li><a href="" class="single-btn">2</a></li>
                                <li><a href="" class="single-btn">3</a></li>
                                <li><a href="" class="single-btn">4</a></li>
                                <li><a href="" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                <li><a href="" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i>|</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="product-details-modal">

                            </div>
                            <div class="modal-footer">
                                <div class="widget-social-share">
                                    <span class="widget-label">Share:</span>
                                    <div class="modal-social-share">
                                        <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                                        <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  mt--40 mt-lg--0">
                <div class="inner-page-sidebar">
                    <!-- Accordion -->
                    <div class="single-block">
                        <h3 class="sidebar-title">Categories</h3>
                        <ul class="sidebar-menu--shop">
                            <?php foreach (allrecords("category") as $c) { ?>
                            <li class="cat-item"><a href="filter-products.php?pcat=<?= $c["catid"]?>"><?= $c["category"] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- Price -->
                    <div class="single-block">
                        <h3 class="sidebar-title">Fillter By Price</h3>
                        <div class="range-slider pt--30">
                            <div class="sb-range-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: <?= $left?>%; width: <?= $width ?>%;"></div>                                
                            </div>
                            <div class="slider-price">
                                <p>
                                    <input type="text" id="amount" readonly="">
                                </p>
                            </div>
                            <button class="btn btn--primary apply">Apply Filter</button>
                        </div>
                    </div>
                    <!-- Size -->
                    <div class="single-block">
                        <h3 class="sidebar-title">Publisher</h3>
                        <ul class="sidebar-menu--shop menu-type-2">
                            <?php foreach(alldatasql("select publisher,count(publisher) as count from products group by publisher") as $a) { ?>
                            <li><a href="filter-products.php?pub=<?= $a["publisher"] ?>"><?= $a["publisher"] ?> <span>(<?= $a["count"] ?>)</span></a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="single-block">
                        <h3 class="sidebar-title">Author</h3>
                        <ul class="sidebar-menu--shop menu-type-2">                            
                            <?php foreach(alldatasql("select author,count(author) as count from products group by author") as $a) { ?>
                            <li><a href="filter-products.php?author=<?=$a["author"] ?>"><?= $a["author"] ?> <span>(<?= $a["count"] ?>)</span></a></li>
                            <?php } ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(function () {
        /*-------------------------------------
         --> Range Slider
         ---------------------------------------*/
        $(function () {
            $(".single-btn").click(function () {
                var dataURL = $(this).attr("data-href");
                console.log(dataURL);
                $('.product-details-modal').load(dataURL, function () {
                    $('#quickModal').modal({show: true});
                });
            });
            $(".sb-range-slider").slider({
                range: true,
                min: <?= $min ?>,
                step: 10,
                max: <?= $max ?>,
                values: [<?= $mmin ?>, <?= $mmax ?>],
                slide: function (event, ui) {
                    $("#amount").val("TK." + ui.values[0] + " - TK." + ui.values[1]);
                }
            });
            $("#amount").val("TK." + $(".sb-range-slider").slider("values", 0) +
                    " - TK." + $(".sb-range-slider").slider("values", 1));
            
            $(".apply").click(function(){
               let min=$(".sb-range-slider").slider("values",0); 
               let max=$(".sb-range-slider").slider("values",1); 
               location.href="filter-products.php?min="+min+"&max="+max;
            });
        });
    });
</script>
<?php include_once 'footer.php'; ?>