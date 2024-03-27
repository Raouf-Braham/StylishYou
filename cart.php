<?php
session_start();
include('Admin_dashbord/config/dbcon.php');
include('functions/getCartItems.php');
include('authenticate.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StylishYou | My Cart</title>

  <!-- Bootstrap Integration -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Products Slider Library -->
  <link rel="stylesheet" href="Glider/glider.css">

  <!-- Google Fonts Integration -->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

  <!-- Global StyleSheet -->
  <link rel="stylesheet" href="style.css">

  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/32d58e182d.js" crossorigin="anonymous"></script>

  <!-- Font awesome All Icons Library -->
  <link rel="stylesheet" href="v6.4.2/css/all-1.css">

  <!-- Font awesome 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />

  <!-- Scripts For The Integrated Libraries -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

  <script src="https://unpkg.com/scrollreveal"></script>

</head>


<body>

    <!-- Page Preloader Section Begin -->
    <div id="preloader">
    </div>
    <!-- Page Preloader Section End -->

    <!-- Page Header Section Begin -->
    <section id="header">
        <a href="index.php"><img src="img/winter_logo.png" class="logo" alt=""></a>
        <div>
        <ul id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a class="active-page" href="cart.php"><i class="fa-regular fa-cart-shopping-fast"></i></a></li>
        </ul>
        </div>

        <div>
        <?php if (isset($_SESSION['auth'])) { ?>
            <div class="action">
            <div class="profile" onclick="menuToggle();">
                <img src="./assets/icons/avatar.png" />
            </div>
            <div class="menu">
                <h4>Username : <?= $_SESSION['auth_user']['name']; ?><br /><span>User ID : #<?= $_SESSION['auth_user']['user_id']; ?></span></h4>
                <ul>
                <li>
                    <img src="./assets/icons/user.png" /><a href="#">My profile</a>
                </li>
                <li>
                    <img src="./assets/icons/edit.png" /><a href="#">Edit profile</a>
                </li>
                <li>
                    <img src="./assets/icons/wishlist.png" /><a href="#">Wishlist</a>
                </li>
                <li>
                    <img src="./assets/icons/envelope.png" /><a href="#">Inbox</a>
                </li>
                <li>
                    <img src="./assets/icons/settings.png" /><a href="#">Setting</a>
                </li>
                <li>
                    <img src="./assets/icons/question.png" /><a href="#">Help</a>
                </li>
                <li>
                    <img src="./assets/icons/log-out.png" /><a href="./Login_Form/logout.php">Logout</a>
                </li>
                </ul>
            </div>
            <?php } else { ?>
            <button id="LogIn" onclick="redirectToLoginPage()">Log In</button>
            <button id="SignUp" onclick="redirectToRegisterPage()">Sign Up</button>
            <?php } ?>
        </div>
    </section>
    <!-- Page Header Section End -->

    <!-- Top Page Section Begin -->
    <section id="page-header">
        <h2>#StayHome</h2>
        <p>Save more with coupons & up to 70% off!</p>
    </section>
    <!-- Top Page Section End -->

    <!-- Alert Section Begin -->
    <div class="wrapper-info" id="messageContainer" style="display: none;">
        <div class="card">
            <div class="icon"><i class="fas fa-info-circle"></i></div>
            <div class="subject">
            <h3>Info</h3>
            <p id="messageContent"></p>
            </div>
            <div class="icon-times"><i class="fas fa-times"></i></div>
        </div>
    </div>
    <!-- Alert Section End -->

    <!-- Cart Section Begin -->
    <section id="cart" class="section-p1">
        
        <table>

            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Size</td>
                    <td>Price</td>
                    <td>Qunatity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>

            <tbody>
        
                <?php 
                
                    $items = getCartItems();

                    foreach($items as $citem){
                        ?>
                    
                        <tr class="product_data">
                            <td><a href="#" class="deleteItem" data-value="<?= $citem['cid']; ?>"><i class="far fa-times-circle"></i></a></td>
                            <td><img src="uploads/<?= $citem['image']; ?>" alt=""></td>
                            <td><?= $citem['name']; ?></td>
                            <td><?= $citem['prod_size']; ?></td>
                            <td>$<?= $citem['selling_price']; ?></td>
                            
                            <td>
                                <input type="hidden" class="prodId" value="<?= $citem['prod_id'];?>">
                                <input type="number" class="input-qty" min="1" value="<?= $citem['prod_qty']; ?>" data-max="10" style="display: none;">
                                <div class="stepper">
                                    <span class="minus updateQty">-</span>
                                    <span class="num">0<?= $citem['prod_qty']; ?></span>
                                    <span class="plus updateQty">+</span>
                                </div>
                            </td>
                            <td>$<?= $citem['selling_price'] * $citem['prod_qty']; ?></td>
                        </tr>
                    <?php
                    }
                ?>
            
            </tbody>

        </table>

    </section>
    <!-- Cart Section End -->

    <!-- Coupon & Subtotal Section Begin -->
    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter Your Coupon">
                <button class="normal">Apply</button>
            </div>
        </div>

        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>
                        <div id="total-price">
                        <?php
                        $items = getCartItems();
                        $totalSellingPrice = 0;

                        foreach ($items as $item) {
                            $totalSellingPrice += $item['selling_price'] * $item['prod_qty'];
                        }
                        echo '$ ' . number_format($totalSellingPrice, 2);
                        ?>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>

                <tr>
                    <td><strong>Total</strong></td>
                    <td>
                        <div id="cart-total">
                            <strong>$ <?php echo number_format($totalSellingPrice, 2); ?></strong>
                        </div>
                    </td>
                        
                </tr>
            </table>
            <button class="normal" id="proccedToCheckoutBtn">Proceed To Checkout</button>
        </div>
    </section>
    <!-- Coupon & Subtotal Section End -->

    <!-- A div that delays the display of content, allowing time for the page preloader to appear -->
    <div class="time" style="display: none;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Huhp23Imxtk?si=0VIQ_q4i399Cf3mH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>

    <!-- Newsletter Section Begin -->
    <section id="newsletter" class="section-p1 section-m1">

        <div class="newstext">
        <h4>Sign Up For Newsletters</h4>
        <p>Get E-mail Updates About Our Latest Shop And <span>Special Offers.</span></p>
        </div>

        <div class="form">
        <input type="text" placeholder="Your Email Adress">
        <button class="normal">Sign Up</button>
        </div>

    </section>
    <!-- Newsletter Section End -->

    <!-- Page Footer Section Begin -->
    <footer class="section-p1">
        <div class="col">
        <img src="img/logo.png" class="logo" width="150px" alt="">
        <h4>Contact</h4>
        <p><strong>Address : </strong>Technopole de Sousse, Route de Ceinture Sahloul,Cité Hammam Maarouf, 4054 Sousse</p>
        <p><strong>Phone : </strong>(+216) 73 369 500 / (+216) 73 369 501 / (+216) 73 369 502</p>
        <p><strong>Hours : </strong> 10:00 - 18:00, Mon - Sat</p>

        <dvi class="follow">
            <h4>Follow Us</h4>
            <div class="icon">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-x-twitter"></i>
            <i class="fa-brands fa-pinterest-p"></i>
            <i class="fa-brands fa-youtube"></i>

            </div>
        </dvi>
        </div>

        <div class="col">
        <h4>About</h4>
        <a href="#">About Us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="#">Contact Us</a>

        </div>

        <div class="col">
        <h4>My Account</h4>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#">My Wishlist</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>
        </div>

        <div class="col install">
        <h4>Install App</h4>
        <p>From App Store Or Google Play</p>
        <div class="row">
            <img src="img/pay/app.jpg" alt="">
            <img src="img/pay/play.jpg" alt="">
        </div>

        <p>Secured Payment Gateways</p>
        <img src="img/pay/pay.png" alt="">
        </div>
        <div class="copyright">
        <p>Copyright © 2024 stylishyou.com <br>
            All Rights Reserved.</p>
        </div>
    </footer>
    <!-- Page Footer Section End -->

    <!-- JavaScript Files -->
    <script src="script.js"></script>
    <script src="cart-script.js"></script>


</body>

</html>