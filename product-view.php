<?php include_once 'dbfun.php';
$data=single("products","prodid='{$_GET["prodid"]}'");
?>
<style>
   .ratings-submit-form {
  position: relative;
  z-index: 1; }
  .ratings-submit-form textarea.form-control {
    height: 80px;
    font-size: 14px; }
  .ratings-submit-form .stars {
    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAABaCAYAAACv+ebYAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNXG14zYAAAAWdEVYdENyZWF0aW9uIFRpbWUAMDcvMDMvMTNJ3Rb7AAACnklEQVRoge2XwW3bMBSGPxa9NxtIGzTAW8DdRL7o3A0qb+BrdNIm9QAm0G7gbJBMwB5MoVJNUSRFIXGqHwhkmXr68hOPNH9ljOEt9OlNqBs4RlrrSmtdpdZ/Ti0EGnvtUoqTHFunBVCkuk6d6mbi83rggdteSa5THDeB3+UDO9z2inatXFum1roESuAReAB29vp15n2/gRfgZK+/gIuIXLxgrfUO+Bnzn0fom4ic+pvRVNuB/QrQ/RB6A7bwLjN8b985krO5MsKd0ElwJvgk1AteCPdCYWI5/SutddQxRUTU3DOzG4hd01EKqQnZuaLBITUh4F0CeLYm5CDw6PjuFTjaz9+BLwE1I8VO9StwAEoRaUSkseMHO+aqcWq2qwcdfQCOIvIy8dwDV/c/YL6zvWDbnQ3QuH5hltQEreM1dH/n6g28gT8eWLVUqqVKrb+vtGidFkCR6vp+0uLAba8k1/eRFh1ue0W7dv4sqpaSjGnR1Fy8YNWyY8W0aGpO/c1oqu3AKmlxCL0BW3iXGb637xzJ2VwZ4U7oJDgTfBLqBS+Ee6EQeMpULVFHUVOzPC3aNR2lkJotLbr0vtKiqWlMTcNaaXHQ0QfgaGqcaVG1jNLibGcbYyb/eDIlT6bjyZS+51JqtrS4gTfw/wzWqkKrKrU8fQPR6gKAmDKlPM3x1WkBFKmu0xxf3fZR5jnFdbzjv257JbmOdzx22yvadZzjW7e9ol27HWtVkjEtIubiB2u1Y8W0iJhTfzOe6uvAKmlxCL0FX+FdZvjevnMkd3Plgzuh0+A88EmoH7wM7oVC6AaiVdwuI2Z5WrRrOk4BNVtadOl9pUXENIhpWCstDjr6ABwR40yLaDVKi7Od7U1/Z0pzpjNngtNiaM2WFj8++A+motm0NTqjmwAAAABJRU5ErkJggg==") repeat-x 0 0;
    width: 150px; }
    .ratings-submit-form .stars:before, .ratings-submit-form .stars:after {
      display: table;
      content: ""; }
    .ratings-submit-form .stars:after {
      clear: both; }
    .ratings-submit-form .stars input[type="radio"] {
      position: absolute;
      opacity: 0; }
      .ratings-submit-form .stars input[type="radio"].star-5:checked ~ span {
        width: 100%; }
      .ratings-submit-form .stars input[type="radio"].star-4:checked ~ span {
        width: 80%; }
      .ratings-submit-form .stars input[type="radio"].star-3:checked ~ span {
        width: 60%; }
      .ratings-submit-form .stars input[type="radio"].star-2:checked ~ span {
        width: 40%; }
      .ratings-submit-form .stars input[type="radio"].star-1:checked ~ span {
        width: 20%; }
    .ratings-submit-form .stars label {
      display: block;
      width: 30px;
      height: 30px;
      margin: 0 !important;
      padding: 0 !important;
      text-indent: -99999rem;
      float: left;
      position: relative;
      z-index: 10;
      background: transparent !important;
      cursor: pointer; }
      .ratings-submit-form .stars label:hover ~ span {
        background-position: 0 -30px; }
      .ratings-submit-form .stars label.star-5:hover ~ span {
        width: 100% !important; }
      .ratings-submit-form .stars label.star-4:hover ~ span {
        width: 80% !important; }
      .ratings-submit-form .stars label.star-3:hover ~ span {
        width: 60% !important; }
      .ratings-submit-form .stars label.star-2:hover ~ span {
        width: 40% !important; }
      .ratings-submit-form .stars label.star-2:hover ~ span {
        width: 20% !important; }
    .ratings-submit-form .stars span {
      display: block;
      width: 0;
      position: relative;
      top: 0;
      left: 0;
      height: 30px;
      background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAABaCAYAAACv+ebYAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNXG14zYAAAAWdEVYdENyZWF0aW9uIFRpbWUAMDcvMDMvMTNJ3Rb7AAACnklEQVRoge2XwW3bMBSGPxa9NxtIGzTAW8DdRL7o3A0qb+BrdNIm9QAm0G7gbJBMwB5MoVJNUSRFIXGqHwhkmXr68hOPNH9ljOEt9OlNqBs4RlrrSmtdpdZ/Ti0EGnvtUoqTHFunBVCkuk6d6mbi83rggdteSa5THDeB3+UDO9z2inatXFum1roESuAReAB29vp15n2/gRfgZK+/gIuIXLxgrfUO+Bnzn0fom4ic+pvRVNuB/QrQ/RB6A7bwLjN8b985krO5MsKd0ElwJvgk1AteCPdCYWI5/SutddQxRUTU3DOzG4hd01EKqQnZuaLBITUh4F0CeLYm5CDw6PjuFTjaz9+BLwE1I8VO9StwAEoRaUSkseMHO+aqcWq2qwcdfQCOIvIy8dwDV/c/YL6zvWDbnQ3QuH5hltQEreM1dH/n6g28gT8eWLVUqqVKrb+vtGidFkCR6vp+0uLAba8k1/eRFh1ue0W7dv4sqpaSjGnR1Fy8YNWyY8W0aGpO/c1oqu3AKmlxCL0BW3iXGb637xzJ2VwZ4U7oJDgTfBLqBS+Ee6EQeMpULVFHUVOzPC3aNR2lkJotLbr0vtKiqWlMTcNaaXHQ0QfgaGqcaVG1jNLibGcbYyb/eDIlT6bjyZS+51JqtrS4gTfw/wzWqkKrKrU8fQPR6gKAmDKlPM3x1WkBFKmu0xxf3fZR5jnFdbzjv257JbmOdzx22yvadZzjW7e9ol27HWtVkjEtIubiB2u1Y8W0iJhTfzOe6uvAKmlxCL0FX+FdZvjevnMkd3Plgzuh0+A88EmoH7wM7oVC6AaiVdwuI2Z5WrRrOk4BNVtadOl9pUXENIhpWCstDjr6ABwR40yLaDVKi7Od7U1/Z0pzpjNngtNiaM2WFj8++A+motm0NTqjmwAAAABJRU5ErkJggg==") repeat-x 0 -60px;
      -webkit-transition: width 0.5s;
      transition: width 0.5s; } 


</style>
<div class="row">
    <div class="col-lg-5">
        <!-- Product Details Slider Big Image-->
        <div class="product-details-slider">
            <div>
                <div class="single-slide" style="width:300px;height:350px; display: inline-block;">
                    <img src="books/<?= $data["photo"] ?>" height="100%" alt="">
                </div>
            </div>
        </div>


    </div>
    <div class="col-lg-7 mt--30 mt-lg--30">
        <div class="product-details-info pl-lg--30 ">                                            
            <h3 class="product-title"><?= $data["pname"] ?></h3>
            <ul class="list-unstyled">
                <li>Author: <span class="list-value"><?= $data["author"] ?></span></li>
                <li>Publisher: <a href="#" class="list-value font-weight-bold">
                        <?= $data["publisher"] ?> <?= $data["year"] ?></a></li>
                <li>Product Code: <span class="list-value"><?= $data["prodid"] ?></span></li>                                                
                <li>Availability: <span class="list-value"> In Stock</span></li>
            </ul>
            <div class="price-block">
                <span class="price-new"><?= $data["disc_price"] ?></span>
                <del class="price-old"><?= $data["price"] ?></del>
            </div>
            <div class="rating-widget">
                <div class="rating-block">
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star "></span>
                </div>
                <div class="review-widget">
                    <a href="">(1 Reviews)</a> <span>|</span>
                    <a href="" data-toggle="modal" data-target="#exampleModal">Write a review</a>
                </div>
            </div>
            <article class="product-details-article">
                <h4 class="sr-only">Product Summery</h4>
                <p>Long printed dress with thin adjustable straps. V-neckline
                    and wiring under the Dust with ruffles at the bottom
                    of the
                    dress.</p>
            </article>
            <form action="addtocart.php">
                <div class="add-to-cart-row">
                    <div class="count-input-block">
                        <span class="widget-label">Qty</span>
                        <input type="hidden" name="prodid" value="<?= $data["prodid"] ?>">
                        <input type="number" name="qty" class="form-control text-center" value="1">
                    </div>
                    <div class="add-cart-btn">
                        <button class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to Cart</button>
                    </div>
                </div>
            </form>
            <div class="compare-wishlist-row">
                <a href="wishlist.php" class="add-link"><i class="fas fa-heart"></i>Add to
                    Wish List</a>                                                
            </div>
        </div>
    </div>
</div>
<div>
    <h1>Review Section</h1>
     <?php
      $proid =$data["prodid"];
    foreach (alldatasql("select * from review where product_id='$proid'") as $r) { 
        $rat=$r['review_star'];
        ?>
         <div>
         <?php if($rat==4){?>
         
            <div class="rating-block">
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                </div>
            <?php }elseif ($rat==3) {?>
                <div class="rating-block">
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                </div>
           <?php }elseif ($rat==2) {?>
            <div class="rating-block">
               <span class="fas fa-star star_on"></span>
                <span class="fas fa-star star_on"></span>
            </div>
           <?php }elseif ($rat==2) {?>
               <div class="rating-block">
               <span class="fas fa-star star_on"></span>
                <span class="fas fa-star star_on"></span>
            </div>
           <?php }else{?>
            <div class="rating-block">
               <span class="fas fa-star star_on"></span>
                <span class="fas fa-star star_on"></span>
                <span class="fas fa-star star_on"></span>
                <span class="fas fa-star star_on"></span>
                <span class="fas fa-star star_on"></span>
            </div>
           <?php }?>
             <h4><?= $r['name'];?></h4>
             <p><?= $r['review_details'];?></p>
         </div>


    <?php }?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="reviewsave.php">
       <div class="ratings-submit-form">
        
        <!-- <div class="rating-block">
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star "></span>
                </div> -->
                <div class="stars mb-3">
                <input class="star-1" type="radio" name="rating" value="1" id="star1">
                <label class="star-1" for="star1"></label>
                <input class="star-2" type="radio" name="rating" value="2" id="star2">
                <label class="star-2" for="star2"></label>
                <input class="star-3" type="radio" name="rating" value="3" id="star3">
                <label class="star-3" for="star3"></label>
                <input class="star-4" type="radio" name="rating" value="4" id="star4">
                <label class="star-4" for="star4"></label>
                <input class="star-5" type="radio" value="5" name="rating" id="star5">
                <label class="star-5" for="star5"></label><span></span>
              </div>
              </div>

                
                  <textarea class="form-control" name="review_message" cols="30" rows="8" data-max-length="200" placeholder="Write your review..."></textarea>
                  <input type="hidden" name="prodid" value="<?= $data["prodid"] ?>">

                  
                <input type="hidden" name="username" value="<?php echo $_SESSION["uname"]; ?>">

                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </div>
      
      </form>
    </div>
  </div>
</div>