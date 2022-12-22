<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <?php
                if (isset($_SESSION['login'])) :
                ?>
                <li><a href="account.php"><i class="fa fa-user-o"></i> My Account</a></li>
                <li><a href="handle.php?logout"><i class="fa fa-user-o"></i> Logout</a></li>
                <?php
                elseif (isset($_COOKIE['remember'])) :
                    $_SESSION['login'] = $_COOKIE['remember'];
                ?>
                <li><a href="account.php"><i class="fa fa-user-o"></i> My Account</a></li>
                <li><a href="handle.php?logout"><i class="fa fa-user-o"></i> Logout</a></li>
                <?php
                else :
                ?>
                <li><a href="./login/"><i class="fa fa-user-o"></i> Login</a></li>
                <?php
                endif;
                ?>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="index.php" class="logo">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="store.php?" method="GET">
                            <select name="searchtype" class=" input-select">
                                <option value="-1">All Categories</option>
                                <?php
                                $getAllType = $gettype->getallType();
                                foreach ($getAllType as $value) :
                                ?>
                                <option value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" name="searchtxt" class="input" placeholder="Search here">
                            <button type="submit" class="search-btn">Search
                            </button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="wishlist.php">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <!-- <div class="qty">2</div> -->
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <!-- <div class="qty">3</div> -->
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <?php
                                    $count = 0;
                                    $total = 0;
                                    $getAllProduct = $product->getAllProducts();
                                    if (isset($_SESSION['cart'])) :
                                        foreach ($_SESSION['cart'] as $key => $value) :
                                            foreach ($getAllProduct as $valuePro) :
                                                if ($key == $valuePro['id']) :
                                    ?>
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/<?php echo $valuePro['image'] ?>" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a
                                                    href='product.php?id=<?php echo $valuePro['id'] ?>'><?php echo $valuePro['name'] ?></a>
                                            </h3>
                                            <h4 class="product-price"><span class="qty"><?php echo $value ?>x
                                                </span><?php echo number_format($valuePro['price']) ?>
                                                VND</h4>
                                        </div>
                                        <a href="cart.php?cart_remove=<?php echo $key ?>"> <button class="delete"><i
                                                    class="fa fa-close"></i></button></a>

                                    </div>
                                    <?php
                                                    $total = $total + $valuePro['price'] * $value;
                                                    $count++;
                                                endif;
                                            endforeach;
                                        endforeach;
                                    endif;
                                    ?>


                                </div>
                                <div class="cart-summary">
                                    <small><?php echo $count ?> Item(s) selected</small>
                                    <h5>SUBTOTAL:<?php echo number_format($total) ?>
                                        VND</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="viewcart.php">View Cart</a>
                                    <a href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->