<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "link.php"; ?>

</head>

<body>
    <?php include "head.php"; ?>
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
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        echo "<li><a href='store.php'>Categories</a></li>";
                        foreach ($getallType as $value) :
                            if ($value['type_id'] == $id) :
                    ?>
                    <li class='active'><a
                            href="store.php?id=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a>
                    </li><?php else : ?>
                    <li><a href="store.php?id=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a>
                    </li>
                    <?php
                                    endif;
                                endforeach;
                            } else {
                                echo "<li class='active'><a href='store.php'>Categories</a></li>";
                                foreach ($getallType as $value) : ?>
                    <li><a href="store.php?id=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a>
                    </li>
                    <?php
                                endforeach;
                            }

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
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="store.php">All Categories</a></li>
                        <?php
                        if (isset($_GET['id'])) :
                            $id = $_GET['id'];
                            $getTypeName = $product->getTypeName($id);
                            foreach ($getTypeName as $value) :
                        ?>
                        <li class="active"><?php echo $value['type_name'] ?></li>

                        <?php
                                break;
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-1">
                                <label for="category-1">
                                    <span></span>
                                    Laptops
                                    <small>(120)</small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <!-- <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <div class="price-filter">
                            <div id="price-slider"></div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div> -->
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <!-- <div class="aside">
                        <h3 class="aside-title">Brand</h3>
                        <div class="checkbox-filter">
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-1">
                                <label for="brand-1">
                                    <span></span>
                                    SAMSUNG
                                    <small>(578)</small>
                                </label>
                            </div>
                        </div>
                    </div> -->
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <!-- <div class="aside">
                        <h3 class="aside-title">Top selling</h3>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product01.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>
                    </div> -->
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <!-- <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div> -->
                    <!-- /store top filter -->


                    <!-- page value -->
                    <?php
                    $perPage = 6;
                    $page = 0;
                    if (!isset($_GET['page'])) {

                        $page = 1;
                    } else {

                        $page = $_GET['page'];
                    }
                    ?>
                    <!-- page value -->
                    <!-- store products -->
                    <?php
                    if (isset($_GET['id'])) : ?>
                    <div class="row">

                        <?php
                            $type_id = $_GET['id'];
                            $getByTypeId = $product->getProductByType($type_id);
                            $total = count($getByTypeId);
                            $countPage = ceil($total / $perPage);
                            foreach ($getByTypeId as $value) :
                            ?>
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="./img/<?php echo $value['image'] ?>" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name">
                                        <a href='product.php?id=<?php echo $value['id'] ?>'>
                                            <?php echo $value['name'] ?>
                                        </a>
                                    </h3>
                                    <h4 class="product-price">
                                        <?php echo number_format($value['price']) ?> VND
                                    </h4>
                                    <div class="product-btns">
                                        <?php
                                                if (isset($_SESSION['wish'][$value['id']])) :
                                                ?>
                                        <button class="remove-to-wishlist">
                                            <a href="cart.php?remove_id=<?php echo $value['id']; ?>">
                                                <i class="fa fa-heart"></i>
                                                <span class="tooltipp">remove from wishlist</span>
                                            </a>
                                        </button>
                                        <?php else : ?>
                                        <button class="add-to-wishlist">
                                            <a href="cart.php?add_id=<?php echo $value['id']; ?>">
                                                <i class="fa fa-heart-o"></i>
                                                <span class="tooltipp">add to wishlist</span>
                                            </a>
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /product -->
                        <?php
                            endforeach; ?>
                    </div>

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <ul class="store-pagination">
                            <?php
                                for ($i = 1; $i <= $countPage; $i++) :
                                    if ($i == $page) :
                                ?>
                            <li class="active">
                                <a href="store.php?page=<?php echo $i ?>">
                                    <?php echo $i ?>
                                </a>
                            </li>
                            <?php else : ?>
                            <li>
                                <a href="store.php?page=<?php echo $i ?>">
                                    <?php echo $i ?>
                                </a>
                            </li>

                            <?php endif;
                                endfor;
                                $pagenext = $page + 1;
                                if ($pagenext <= $countPage) :
                                    ?>
                            <li>
                                <a href="store.php?page=<?php echo $pagenext; ?>">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                    <!-- /store bottom filter -->

                    <!-- product seach -->
                    <?php elseif (isset($_GET['searchtxt'])) : ?>
                    <!-- store products -->
                    <div class="row">
                        <?php
                            $type_id;
                            $keyword = $_GET['searchtxt'];
                            $getbysearch = $product->search($keyword);
                            $total = count($getbysearch);
                            $countPage = ceil($total / $perPage);
                            $getPage = $product->getPage($page, $perPage);
                            if (isset($_GET['searchtype'])) :
                                $type_id = $_GET['searchtype'];
                                if ($type_id == -1) :
                                    foreach ($getbysearch as $value) :  ?>
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="./img/<?php echo $value['image'] ?>" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name">
                                        <a href='product.php?id=<?php echo $value['id'] ?>'>
                                            <?php echo $value['name'] ?>
                                        </a>
                                    </h3>
                                    <h4 class="product-price">
                                        <?php echo number_format($value['price']) ?> VND
                                    </h4>
                                    <div class="product-btns">
                                        <?php
                                                        if (isset($_SESSION['wish'][$value['id']])) :
                                                        ?>
                                        <button class="remove-to-wishlist">
                                            <a href="cart.php?remove_id=<?php echo $value['id'] ?>">
                                                <i class="fa fa-heart"></i>
                                                <span class="tooltipp">remove from wishlist</span>
                                            </a>
                                        </button>
                                        <?php else : ?>
                                        <button class="add-to-wishlist">
                                            <a href="cart.php?add_id=<?php echo $value['id'] ?>">
                                                <i class="fa fa-heart-o"></i>
                                                <span class="tooltipp">add to wishlist</span>
                                            </a>
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /product -->
                        <?php endforeach; ?>
                        <!-- store products -->
                    </div>
                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">

                        <ul class="store-pagination">
                            <?php for ($i = 1; $i <= $countPage; $i++) :
                                        if ($i == $page) :
                                ?>
                            <li class="active">
                                <a href="store.php?page=<?php echo $i ?>">
                                    <?php echo $i ?>
                                </a>
                            </li>
                            <?php else : ?>
                            <li>
                                <a href="store.php?page=<?php echo $i ?>">
                                    <?php echo $i ?>
                                </a>
                            </li>

                            <?php endif;
                                    endfor;

                                    $pagenext = $page + 1;
                                    if ($pagenext <= $countPage) :
                                    ?>
                            <li>
                                <a href="store.php?page=<?php echo $pagenext; ?>">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                    <!-- product seach -->


                    <?php else :
                    ?>
                    <!-- store products -->
                    <div class="row">
                        <?php
                                    foreach ($getbysearch as $value) :
                                        if ($value['type_id'] == $type_id) : ?>
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="./img/<?php echo $value['image'] ?>" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name">
                                        <a href='product.php?id=<?php echo $value['id'] ?>'>
                                            <?php echo $value['name'] ?>
                                        </a>
                                    </h3>
                                    <h4 class="product-price">
                                        <?php echo number_format($value['price']) ?> VND
                                    </h4>
                                    <div class="product-btns">
                                        <?php
                                                    if (isset($_SESSION['wish'][$value['id']])) :
                                                    ?>
                                        <button class="remove-to-wishlist"><a
                                                href="cart.php?remove_id=<?php echo $value['id'] ?>">
                                                <i class="fa fa-heart"></i>
                                                <span class="tooltipp">remove from wishlist</span>
                                            </a>
                                        </button>
                                        <?php else : ?>
                                        <button class="add-to-wishlist">
                                            <a href="cart.php?add_id=<?php echo $value['id'] ?>">
                                                <i class="fa fa-heart-o"></i>
                                                <span class="tooltipp">add to wishlist</span>
                                            </a>
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /product -->
                        <?php
                                        endif;
                                    endforeach;
                            ?>
                    </div>
                    <!-- store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">

                        <ul class="store-pagination">
                            <?php for ($i = 1; $i <= $countPage; $i++) :
                                        if ($i == $page) :
                                ?>
                            <li class="active">
                                <a href="store.php?page=<?php echo $i ?>">
                                    <?php echo $i ?>
                                </a>
                            </li>
                            <?php else : ?>
                            <li>
                                <a href="store.php?page=<?php echo $i ?>">
                                    <?php echo $i ?>
                                </a>
                            </li>

                            <?php endif;
                                    endfor;
                                    $pagenext = $page + 1;
                                    if ($pagenext <= $countPage) :
                                    ?>
                            <li>
                                <a href="store.php?page=<?php echo $pagenext; ?>">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                    <?php
                                endif;
                            endif;
                        else : ?>

                    <!-- store products -->
                    <div class="row">
                        <?php
                            $getAllProducts = $product->getAllProducts();
                            $total = count($product->getAllProducts());
                            $perPage = 6;
                            $page = 0;

                            if (!isset($_GET['page'])) {

                                $page = 1;
                            } else {

                                $page = $_GET['page'];
                            }
                            $countPage = ceil($total / $perPage);
                            $getPage = $product->getPage($page, $perPage);
                            foreach ($getPage as $value) : ?>
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="./img/<?php echo $value['image'] ?>" alt="">
                                    <!-- <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div> -->
                                </div>
                                <div class="product-body">
                                    <!-- <p class="product-category">Category</p> -->
                                    <h3 class="product-name"><a
                                            href='product.php?id=<?php echo $value['id'] ?>'><?php echo $value['name'] ?>
                                        </a>
                                    </h3>
                                    <h4 class="product-price"> <?php echo number_format($value['price']) ?> VND</h4>

                                    <div class="product-btns">
                                        <?php
                                        if (isset($_SESSION['wish'][$value['id']])) :
                                        ?>
                                        <button class="remove-to-wishlist"><a
                                                href="cart.php?remove_id=<?php echo $value['id'] ?>"><i
                                                    class="fa fa-heart"></i><span class="tooltipp">remove from
                                                    wishlist</span></a></button>
                                        <?php else : ?>
                                        <button class="add-to-wishlist"><a
                                                href="cart.php?add_id=<?php echo $value['id'] ?>"> <i
                                                    class="fa fa-heart-o"></i><span class="tooltipp">add to
                                                    wishlist</span>
                                            </a></button>

                                        <?php
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /product -->
                        <?php
                            endforeach; ?>
                    </div>

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <ul class="store-pagination">
                            <?php
                            for ($i = 1; $i <= $countPage; $i++) :
                                if ($i == $page) :
                        ?>
                            <li class="active"><a href="store.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php else : ?>
                            <li><a href="store.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>

                            <?php
                                endif;
                            endfor;
                            $pagenext = $page + 1;
                            if ($pagenext <= $countPage) :
                            ?>
                            <li>
                                <a href="store.php?page=<?php echo $pagenext; ?>">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                    <?php
                        endif; ?>


                    <!-- /store products -->


                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

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
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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