<?php include_once "header.php"; ?>

<section class="hero-area hero-slider-3">
            <div class="sb-slick-slider" data-slick-setting='{
                                                        "autoplay": true,
                                                        "autoplaySpeed": 8000,
                                                        "slidesToShow": 1,
                                                        "dots":true
                                                        }'>
                <div class="single-slide bg-image  bg-overlay--dark" data-bg="image/slide1.jpg">
                    <div class="container">
                        <div class="home-content text-center">
                            
                        </div>
                    </div>
                </div>
                <div class="single-slide bg-image  bg-overlay--dark" data-bg="image/slide2.png">
                    <div class="container">
                        <div class="home-content pl--30">
                            
                        </div>
                    </div>
                </div>
                <div class="single-slide bg-image  bg-overlay--dark" data-bg="image/slide3.jpg">
                    <div class="container">
                        <div class="home-content pl--30">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

<section class="mb--30 space-dt--30" style="margin-top:10px;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="text">
                                <h5>Free Shipping Item</h5>
                                <p> Orders overs 500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-redo-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Money Back Guarantee</h5>
                                <p>100% money back</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-piggy-bank"></i>
                            </div>
                            <div class="text">
                                <h5>Cash On Delivery</h5>
                                <p>Lorem ipsum dolor amet</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-life-ring"></i>
                            </div>
                            <div class="text">
                                <h5>Help & Support</h5>
                                <p>Call us : + 0123.4567.89</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--=================================
    ARTS & PHOTOGRAPHY BOOKS
===================================== -->
        <?php foreach(alldatasql("select pcat,count(*) as count from products group by pcat") as $p) { ?>
        <section class="section-margin">
            <div class="container">
                <div class="section-title section-title--bordered m-3">
                    <h2><?= single("category","catid='{$p["pcat"]}'")["category"] ?> ( <?= $p["count"] ?> items)</h2>
                </div>
                <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 8000,
                        "slidesToShow": 5,
                        "dots":true
                    }' data-slick-responsive='[
                        {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>
                    <?php foreach(findall("products", "pcat='{$p["pcat"]}'") as $pp) { ?>
                    
                    <div class="single-slide">
                        <div class="product-card">
                            <div class="product-header">
                                <a href="" class="author">
                                    <?= $pp["author"] ?>
                                </a>
                                <h3><a href="product-details.html"><?= $pp["pname"] ?></a></h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image">
                                    <img src="books/<?= $pp["photo"] ?>" style="width:210px;height:220px;" alt="">
                                    <div class="hover-contents">
                                        <a href="product-details.html" class="hover-image">
                                            <img src="books/<?= $pp["photo"] ?>"  style="width:210px;height:220px;" alt="">
                                        </a>
                                        <div class="hover-btns">
                                            <a href="cart.php" class="single-btn">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                            <a href="wishlist.php" class="single-btn">
                                                <i class="fas fa-heart"></i>
                                            </a>                                           
                                            <a href="#" data-toggle="modal" data-target="#quickModal"
                                                class="single-btn">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-block">
                                    <span class="price"><?= money($pp["disc_price"]) ?></span>
                                    <del class="price-old"><?= money($pp["price"]) ?></del>
                                    <span class="price-discount"><?= money($pp["price"]-$pp["disc_price"]) ?> Off</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                    
                </div>
            </div>
        </section>
        
        <?php } ?>
        
  
        <!--=================================
        CLIENT TESTIMONIALS
    ===================================== -->
    
        <section class="section-margin">
            <div class="container">
                <div class="section-title section-title--bordered mb-lg--60">
                    <h2>CLIENT TESTIMONIALS</h2>
                </div>
                <div class="sb-slick-slider testimonial-slider" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow":3,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 2} },
                {"breakpoint":992, "settings": {"slidesToShow": 1} },
                {"breakpoint":768, "settings": {"slidesToShow": 1} },
                {"breakpoint":490, "settings": {"slidesToShow": 1} }
            ]'>
                    <div class="single-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-image">
                                <img src="image/others/client-1.png" alt="">
                            </div>
                            <div class="testimonial-body">
                                <article>
                                    <h2 class="sr-only">Testimonial Article</h2>
                                    <p>version This is Photoshops of Lorem Ipsum. Proin gravida nibh vel velit.Lorem
                                        ipsum dolor sit amet, consectetur
                                        adipiscing elit. In molestie augue magna. Pell..</p>
                                    <span class="d-block client-name">Rebecka Filson</span>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-image">
                                <img src="image/others/client-2.png" alt="">
                            </div>
                            <div class="testimonial-body">
                                <article>
                                    <h2 class="sr-only">Testimonial Article</h2>
                                    <p>In molestie augue magna.This is Photoshops version of Lorem Ipsum. Proin gravida
                                        nibh vel velit.Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Pell..</p>
                                    <span class="d-block client-name">Rebecka Filson</span>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-image">
                                <img src="image/others/client-3.png" alt="">
                            </div>
                            <div class="testimonial-body">
                                <article>
                                    <h2 class="sr-only">Testimonial Article</h2>
                                    <p>Lorem Ipsum This is Photoshops version of . Proin gravida nibh vel velit.Lorem
                                        ipsum dolor sit amet, consectetur
                                        adipiscing elit. In molestie augue magna. Pell..</p>
                                    <span class="d-block client-name">Rebecka Filson</span>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-image">
                                <img src="image/others/client-4.png" alt="">
                            </div>
                            <div class="testimonial-body">
                                <article>
                                    <h2 class="sr-only">Testimonial Article</h2>
                                    <p>elit. In molestie This is Photoshops version of Lorem Ipsum. Proin gravida nibh
                                        vel velit.Lorem ipsum dolor sit amet, consectetur
                                        adipiscing augue magna. Pell..</p>
                                    <span class="d-block client-name">Rebecka Filson</span>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-image">
                                <img src="image/others/client-5.png" alt="">
                            </div>
                            <div class="testimonial-body">
                                <article>
                                    <h2 class="sr-only">Testimonial Article</h2>
                                    <p>Pell Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit.Lorem ipsum
                                        dolor sit amet, consectetur
                                        adipiscing elit. In molestie augue magna. This is..</p>
                                    <span class="d-block client-name">Rebecka Filson</span>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include_once "footer.php"; ?>
