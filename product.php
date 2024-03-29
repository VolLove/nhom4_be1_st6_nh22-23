<?php
include 'head.php';
?>

<body>
    <?php include "header.php"; ?>
    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <!-- <li><a href="#">Hot Deals</a></li> -->
                    <?php
                    $getallType = $gettype->getAlltype();
                    if (isset($_GET['id'])) :
                        $id = $_GET['id'];
                        $getProductById = $product->getProductByID($id);
                        echo "<li><a href='store.php'>Categories</a></li>";
                        foreach ($getallType as $value) :
                            foreach ($getProductById as $call) :
                                if ($value['type_id'] == $call['type_id']) :
                    ?>
                                    <li class='active'><a href="store.php?id=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a>
                                    </li>
                                <?php else : ?>
                                    <li><a href="store.php?id=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a>
                                    </li>
                    <?php
                                endif;
                            endforeach;
                        endforeach;
                    endif;
                    ?>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <?php
    if (isset($_GET['id'])) :
        $id = $_GET['id'];
        $getProductById = $product->getProductByID($id);
        foreach ($getProductById as $value) :
    ?>
            <div id="breadcrumb" class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb-tree">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="store.php">All Categories</a></li>
                                <li class="active"><a href="store.php">Categories</a></li>
                                <?php
                                foreach ($getallType as $typeValue) :
                                    foreach ($getProductById as $call) :
                                        if ($typeValue['type_id'] == $call['type_id']) :
                                ?>
                                            <li class='active'><a href="store.php?id=<?php echo $typeValue['type_id'] ?>"><?php echo $typeValue['type_name'] ?></a>
                                            </li>
                                <?php
                                        endif;
                                    endforeach;
                                endforeach;
                                ?>
                                <li class="active"><?php echo $value['name'] ?></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
    <?php endforeach;
    endif; ?>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <?php

                if (isset($_GET['id'])) :
                    $id = $_GET['id'];
                    $getProductById = $product->getProductByID($id);
                    $getImageById = $product->getImageById($id);
                    foreach ($getProductById as $value) :
                ?>
                        <!-- Product main img -->
                        <div class="col-md-5 col-md-push-2">
                            <div id="product-main-img">
                                <div class="product-preview">
                                    <img src="img/<?php echo $value['image'] ?>" alt="">
                                </div>
                                <?php
                                foreach ($getImageById as $linkImage) :
                                ?>
                                    <div class="product-preview">
                                        <img src="img/<?php echo $linkImage['image_name'] ?>" alt="">
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- /Product main img -->

                        <!-- Product thumb imgs -->
                        <div class="col-md-2  col-md-pull-5">
                            <div id="product-imgs">
                                <div class="product-preview">
                                    <img src="img/<?php echo $value['image'] ?>" alt="">
                                </div>
                                <?php
                                foreach ($getImageById as $linkImage) :
                                ?>
                                    <div class="produc~t-preview">
                                        <img src="img/<?php echo $linkImage['image_name'] ?>" alt="">
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- /Product thumb imgs -->

                        <!-- Product details -->

                        <div class="col-md-5">
                            <div class="product-details">
                                <h2 class="product-name"><?php echo $value['name'] ?></h2>
                                <!-- <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">10 Review(s) | Add your review</a>
                        </div> -->
                                <div>
                                    <h3 class="product-price"><?php echo number_format($value['price']) ?> VND</h3>
                                    <!-- <del class="product-old-price">price</del>
                            <span class="product-available">In Stock</span> -->
                                </div>
                                <p><?php echo $value['description'] ?></p>

                                <!-- <div class="product-options">
                            <label>
                                Size
                                <select class="input-select">
                                    <option value="0">X</option>
                                </select>
                            </label>
                            <label>
                                Color
                                <select class="input-select">
                                    <option value="0">Red</option>
                                </select>
                            </label>
                        </div> -->

                                <div class="add-to-cart">
                                    <form action="cart.php?" method="GET">
                                        <div class="qty-label">
                                            Qty
                                            <div class="input-number">
                                                <input name="number" type="number" value="1">
                                                <span class="qty-up">+</span>
                                                <span class="qty-down">-</span>
                                                <input type="hidden" name="id" value="<?php echo $value['id'] ?>">

                                            </div>
                                        </div>
                                        <button class="add-to-cart-btn">
                                            <i class="fa fa-shopping-cart"></i> add to cart
                                        </button>
                                    </form>

                                </div>

                                <ul class="product-btns">
                                    <?php
                                    if (isset($_SESSION['wish'][$value['id']])) :
                                    ?>
                                        <li><a href="cart.php?remove_id=<?php echo $value['id'] ?>"><i class="fa fa-heart"></i> add
                                                to wishlist</a></li>
                                    <?php else : ?>
                                        <li><a href="cart.php?add_id=<?php echo $value['id'] ?>"><i class="fa fa-heart-o"></i> add
                                                to wishlist</a></li>
                                    <?php endif; ?>
                                    <!-- <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li> -->
                                </ul>

                                <ul class="product-links">
                                    <li>Category:</li>
                                    <?php
                                    $getallType = $gettype->getAlltype();
                                    if (isset($_GET['id'])) :
                                        $id = $_GET['id'];
                                        $getProductById = $product->getProductByID($id);
                                        foreach ($getallType as $typeValue) :
                                            if ($value['type_id'] == $typeValue['type_id']) :
                                    ?>
                                                <li>
                                                    <a href="store.php?id=<?php echo $typeValue['type_id'] ?>">
                                                        <?php echo $typeValue['type_name'] ?>
                                                    </a>
                                                </li>
                                    <?php
                                            endif;
                                        endforeach;
                                    endif;
                                    ?>
                                </ul>

                                <ul class="product-links">
                                    <li>Share:</li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                </ul>

                            </div>
                        </div>
                        <!-- /Product details -->

                        <!-- Product tab -->
                        <div class="col-md-12">
                            <div id="product-tab">
                                <!-- product tab nav -->
                                <ul class="tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Details</a></li>
                                    <!-- <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li> -->
                                </ul>
                                <!-- /product tab nav -->

                                <!-- product tab content -->
                                <div class="tab-content">

                                    <!-- tab1  -->
                                    <div id="tab1" class="tab-pane fade in active">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><?php echo $value['description'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /tab1  -->

                                    <!-- tab2  -->
                                    <div id="tab2" class="tab-pane fade in">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><?php echo $value['details'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /tab2  -->

                                    <!-- tab3  -->
                                    <!-- <div id="tab3" class="tab-pane fade in">
                                <div class="row"> -->
                                    <!-- Rating -->
                                    <!-- <div class="col-md-3">
                                        <div id="rating">
                                            <div class="rating-avg">
                                                <span>4.5</span>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                              `                      <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 80%;"></div>
                                                    </div>
                                                    <span class="sum">3</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 60%;"></div>
                                                    </div>
                                                    <span class="sum">2</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <!-- /Rating -->

                                    <!-- Reviews -->
                                    <!-- <div class="col-md-6">
                                        <div id="reviews">
                                            <ul class="reviews">
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">John</h5>
                                                        <p class="date">27 DEC 2018, 8:0 PM</p>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">John</h5>
                                                        <p class="date">27 DEC 2018, 8:0 PM</p>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">John</h5>
                                                        <p class="date">27 DEC 2018, 8:0 PM</p>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="reviews-pagination">
                                                <li class="active">1</li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <!-- <div class="col-md-3">
                                        <div id="review-form">
                                            <form class="review-form">
                                                <input class="input" type="text" placeholder="Your Name">
                                                <input class="input" type="email" placeholder="Your Email">
                                                <textarea class="input" placeholder="Your Review"></textarea>
                                                <div class="input-rating">
                                                    <span>Your Rating: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="rating" value="5" type="radio"><label
                                                            for="star5"></label>
                                                        <input id="star4" name="rating" value="4" type="radio"><label
                                                            for="star4"></label>
                                                        <input id="star3" name="rating" value="3" type="radio"><label
                                                            for="star3"></label>
                                                        <input id="star2" name="rating" value="2" type="radio"><label
                                                            for="star2"></label>
                                                        <input id="star1" name="rating" value="1" type="radio"><label
                                                            for="star1"></label>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Submit</button>
                                            </form>
                                        </div>
                                    </div> -->
                                    <!-- /Review Form -->
                                    <!-- </div>
                            </div> -->
                                    <!-- /tab3  -->
                                </div>
                                <!-- /product tab content  -->
                            </div>
                        </div>
                <?php endforeach;
                endif; ?>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>

                <?php
                if (isset($_GET['id'])) :
                    $id = $_GET['id'];
                    $countNumber = 0;
                    $getProductById = $product->getProductByID($id);
                    $getAllProduct = $product->getAllProducts();
                    foreach ($getAllProduct as $value) :
                        foreach ($getProductById as $getValue) :
                            if ($countNumber < 4) :
                                if ($value['type_id'] == $getValue['type_id'] && $value['id'] != $getValue['id']) :
                                    $countNumber++;

                ?>
                                    <!-- product -->
                                    <div class="col-md-3 col-xs-6">
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="img/<?php echo $value['image'] ?>" alt="">

                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="product.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
                                                </h3>
                                                <h4 class="product-price"><?php echo number_format($value['price']) ?></h4>
                                                <div class="product-btns">
                                                    <?php
                                                    if (isset($_SESSION['wish'][$value['id']])) :
                                                    ?>
                                                        <button class="remove-to-wishlist"><a href="cart.php?remove_id=<?php echo $value['id'] ?>"><i class="fa fa-heart"></i><span class="tooltipp">remove from
                                                                    wishlist</span></a></button>
                                                    <?php else : ?>
                                                        <button class="add-to-wishlist"><a href="cart.php?add_id=<?php echo $value['id'] ?>"> <i class="fa fa-heart-o"></i><span class="tooltipp">add to
                                                                    wishlist</span>
                                                            </a></button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /product -->
                <?php endif;
                            endif;
                        endforeach;
                    endforeach;
                endif; ?>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>53 Vo Van Ngan Street, Linh Chieu
                                        District, Thu Duc City, Ho Chi Minh City</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>daotanquocviet@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="#">Hot deals</a></li>
                                <li><a href="#">Laptops</a></li>
                                <li><a href="#">Smartphones</a></li>
                                <li><a href="#">Cameras</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>