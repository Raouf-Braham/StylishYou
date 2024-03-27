<?php
session_start();
include('Admin_dashbord/config/dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StylishYou</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="Glider/glider.css">

  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

  

  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/32d58e182d.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="v6.4.2/css/all-1.css">
  
  <link rel="stylesheet" href="style.css">
  
  <!-- Font awesome 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

  <script src="https://unpkg.com/scrollreveal"></script>

</head>

    <body>

        <div id="preloader">

        </div>

        <section id="header">
            <a href="#"><img src="img/winter_logo.png" class="logo" alt=""></a>
            <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a class="active-page" href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php"><i class="fa-regular fa-cart-shopping-fast"></i></a></li>
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
            
            <?php if (isset($_SESSION['message'])) { ?>
            <div class="wrapper-info">
                <div class="card">
                <div class="icon"><i class="fas fa-info-circle"></i></div>
                <div class="subject">
                    <h3>Info</h3>
                    <p><?= $_SESSION['message'] ?></p>
                </div>
                <div class="icon-times"><i class="fas fa-times"></i></div>
                </div>
            </div>
            <?php
            unset($_SESSION['message']);
            }
            ?>
        </section>

        <section id="page-header" class="blog-header">
            <h2>#ReadMore</h2>
            <p>Read All Case Studies About Our Products!</p>
        </section>

        <section id="blog">
            <div class="blog-box">
                <div class="blog-img">
                    <img src="img/blog/b1.jpg" alt="">
                </div>

                <div class="blog-details">
                    <h4>The Cotton-Jersey Zip-Up Hoodie</h4>

                    <p>Kickstarter man braid godard coloring book. Racelette<br>waistcoat selfies yr
                        wolf chartreuse hexagon irony,<br>godard...
                    </p>

                    <a href="#">CONTINUE READING</a>
                </div>

                <h1>13/01</h1>
            </div>

            <div class="blog-box">
                <div class="blog-img">
                    <img src="img/blog/b2.jpg" alt="">
                </div>

                <div class="blog-details">
                    <h4>How To Style A Quiff</h4>

                    <p>Kickstarter man braid godard coloring book. Racelette<br>waistcoat selfies yr
                        wolf chartreuse hexagon irony,<br>godard...
                    </p>

                    <a href="#">CONTINUE READING</a>
                </div>

                <h1>13/01</h1>
            </div>
            
            <div class="blog-box">
                <div class="blog-img">
                    <img src="img/blog/b3.jpg" alt="">
                </div>

                <div class="blog-details">
                    <h4>Must-Have Skater Girl Items</h4>

                    <p>Kickstarter man braid godard coloring book. Racelette<br>waistcoat selfies yr
                        wolf chartreuse hexagon irony,<br>godard...
                    </p>

                    <a href="#">CONTINUE READING</a>
                </div>

                <h1>13/01</h1>
            </div>

            <div class="blog-box">
                <div class="blog-img">
                    <img src="img/blog/b4.jpg" alt="">
                </div>

                <div class="blog-details">
                    <h4>Runway-Inspired Trends</h4>

                    <p>Kickstarter man braid godard coloring book. Racelette<br>waistcoat selfies yr
                        wolf chartreuse hexagon irony,<br>godard...
                    </p>

                    <a href="#">CONTINUE READING</a>
                </div>

                <h1>13/01</h1>
            </div>

            <div class="blog-box">
                <div class="blog-img">
                    <img src="img/blog/b6.jpg" alt="">
                </div>

                <div class="blog-details">
                    <h4>AW20 Menswear Trends</h4>
                    <p>Kickstarter man braid godard coloring book. Racelette<br>waistcoat selfies yr
                        wolf chartreuse hexagon irony,<br>godard...
                    </p>

                    <a href="#">CONTINUE READING</a>
                </div>

                <h1>13/01</h1>
            </div>
        </section>

        <section id="pagination" class="section-p1">
            <span class='pagination-link'><a href='#'>1</a></span>
            <span class='pagination-link'><a href='#'>2</a></span>
            <span class='pagination-link'><a href='#'><i class='fa-solid fa-arrow-right'></i></a></span>
        </section>


        <div class="time" style="display: none;">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Huhp23Imxtk?si=0VIQ_q4i399Cf3mH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

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
            <h4>About</h4>
            <a href="#">My Account</a>
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

        <script src="script.js"></script>
    </body>

</html>