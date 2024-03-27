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

  <!-- Bootstrap Integration -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Products Slider Library -->
  <link rel="stylesheet" href="Glider/glider.css">

  <!-- Google Fonts Integration -->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/32d58e182d.js" crossorigin="anonymous"></script>

  <!-- Font awesome All Icons Library -->
  <link rel="stylesheet" href="v6.4.2/css/all-1.css">

  <!-- Box icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- Global StyleSheet -->
  <link rel="stylesheet" href="style.css">
  
  <!-- swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

  <!-- Font awesome 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />

  <!-- Scripts For The Integrated Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

  <script src="https://unpkg.com/scrollreveal"></script>

</head>

<body>

  <!-- Page Preloader Section Begin -->
  <div id="preloader">
  </div>
  <!-- Page Preloader Section End -->

  <!-- Progress Arrow Section Begin -->
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <!-- Progress Arrow Section End -->

  <!-- Page Header Section Begin -->
  <section id="header">
    <a href="#"><img src="img/winter_logo.png" class="logo" alt=""></a>
    <div>
      <ul id="navbar">
        <li><a class="active-page" href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="blog.php">Blog</a></li>
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
  <!-- Page Header Section End -->

  <!-- Slider Section Begin -->
  <div class="swiper">
    <!-- Additional required wrapper -->

    <div class="swiper-wrapper">
      <!-- Slide 1 -->
      <div class="swiper-slide">
        <section id="news">
          <h4>Trade In Offer</h4>
          <h2>Super value deal</h2>
          <h1>On all products</h1>
          <p>Save more with coupons & up to 70% off!</p>
          <button id="button" onclick="redirectToShopPage();">Shop Now!</button>
        </section>
      </div>

      <!-- Slide 2 -->
      <div class="swiper-slide">
        <section id="Man">
          <h4>EXPLORE YOUR STYLE</h4>
          <h2 id="italic-style">Discover the Perfect Fit</h2>
          <h1 id="occasion">For Every Occasion</h1>
          <p>Upgrade your wardrobe with our latest collection!</p>
          <button id="button" onclick="redirectToShopPage();">Shop Now!</button>
        </section>
      </div>

      <!-- Slide 3 -->
      <div class="swiper-slide">
        <section id="Accessories">
          <h4 id="confidence">Accessorize with Confidence</h4>
          <h2 id="look">Elevate Your Look</h2>
          <h1 id="premium">With Premium Men's Accessories</h1>
          <p>Explore our stylish range and enhance your style game!</p>
          <button id="button" onclick="redirectToShopPage();">Shop Now!</button>
        </section>
      </div>
    </div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"><i class="fa-regular fa-angles-right fa-rotate-180 fa-2xl" style="color: #007aff;"></i></div>
    <div class="swiper-button-next"><i class="fa-regular fa-angles-right fa-2xl" style="color: #007aff;"></i></div>

    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

  </div>
  <!-- Slider Section End -->

  <!-- Services & Features Section Begin -->
  <div id="services">
    <h1>OUR SERVICES</h1>
    <p>Our Services Include Top-Notch Consulting And Comprehensive Solutions</p>
  </div>

  <section id="feature" class="section-p1 hidden">
    <div class="fe-box">
      <img src="img/features/f1.png" alt="">
      <h6>Free Shipping</h6>
    </div>

    <div class="fe-box">
      <img src="img/features/f2.png" alt="">
      <h6>Online Order</h6>
    </div>

    <div class="fe-box">
      <img src="img/features/f3.png" alt="">
      <h6>Save Money</h6>
    </div>

    <div class="fe-box">
      <img src="img/features/f4.png" alt="">
      <h6>Promotions</h6>
    </div>

    <div class="fe-box">
      <img src="img/features/f5.png" alt="">
      <h6>Happy Sell</h6>
    </div>

    <div class="fe-box">
      <img src="img/features/f6.png" alt="">
      <h6>F24/7 Support</h6>
    </div>
  </section>
  <!-- Services & Features Section End -->

  <!-- Categories Section Begin -->
  <section class="categories">

    <div class="categories-titles">
      <h1>CATEGORIES</h1>
      <p>Discover A Variety Of Handpicked Categories For Every Taste</p>
    </div>
    <div class="container-fluid">
      <div class="row" id="women-fashion">
        <div class="col-lg-6 p-0">
          <div class="categories__item categories__large__item set-bg" style="background-image: url('img/categories/category-1.jpg');">
            <div class="categories__text">
              <h1>Women’s fashion</h1>
              <p>Explore a captivating array of women's fashion trends, where elegance meets versatility, 
                offering a harmonious blend of style and comfort for every occasion.</p>
              <a href="shop.php" class="btn btn-lg">SHOP NOW</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row" id="men-fashion">
            <div class="col-lg-6 col-md-6 col-sm-6 p-0">
              <div class="categories__item set-bg" style="background-image: url('img/categories/category-2.jpg');">
                <div class="categories__text">
                  <h4>Men’s fashion</h4>
                  <p>358 items</p>
                  <a href="shop.php" class="btn btn-lg">SHOP NOW</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 p-0" id="kids-fashion">
              <div class="categories__item set-bg" style="background-image: url('img/categories/category-3.jpg');">
                <div class="categories__text">
                  <h4>Kid’s fashion</h4>
                  <p>273 items</p>
                  <a href="shop.php" class="btn btn-lg">SHOP NOW</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 p-0" id="cos-fashion">
              <div class="categories__item set-bg" style="background-image: url('img/categories/category-4.jpg');">
                <div class="categories__text">
                  <h4>Cosmetics</h4>
                  <p>159 items</p>
                  <a href="shop.php" class="btn btn-lg">SHOP NOW</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 p-0" id="accessoires-fashion">
              <div class="categories__item set-bg" style="background-image: url('img/categories/category-5.jpg');">
                <div class="categories__text">
                  <h4>Accessories</h4>
                  <p>792 items</p>
                  <a href="shop.php" class="btn btn-lg">SHOP NOW</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Categories Section End -->

  <!-- Featured Product Section Begin -->
  <section id="product1" class="section-p1 hidden">

    <h2>FEATURED PRODUCTS</h2>

    <h3>SUMMER COLLECTION 2023 : NEW MODERN DESIGN FOR MEN & WOMEN</h3>


    <div class="pro-container">

      <div class="glider-contain">
        <div class="glider">
          <?php

          $keyword = "Summer Collection 2023";
          $query = "SELECT * FROM products WHERE rate >= 4 AND meta_title LIKE '%$keyword%'";
          $products = mysqli_query($con, $query);

          if (mysqli_num_rows($products) > 0) {
            foreach ($products as $item) {
          ?>
              <div class="pro" onclick="redirectToProductDetails('<?= $item['slug']; ?>')">

                <img id = "summer-image1" src="uploads/<?= $item['image']; ?>" alt="product1">
                <!-- Image2 and Image3 with fade transition -->
                <img class="rear-img"  src="uploads/<?= $item['image2']; ?>" alt="product2">
                <img class="rear-img" src="uploads/<?= $item['image3']; ?>" alt="product3">
            

                <div class="des">
                  <span><?= $item['brand']; ?></span>
                  <h5><?= $item['name']; ?></h5>

                  <div class="star">

                    <?php

                    $rating = $item['rate'];
                    $integerRating = floor($rating);
                    $fractionalPart = $rating - $integerRating;

                    for ($i = 1; $i <= $integerRating; $i++) {
                      echo '<i class="fas fa-star"></i>';
                    }

                    // Half star
                    if ($fractionalPart >= 0.5) {
                      echo '<i class="fa-solid fa-star-half"></i>';
                    }

                    if ($rating == 0) {
                      for ($i = 1; $i <= 5; $i++) {
                        echo '<i class="fa-regular fa-star"></i>';
                      }
                    }

                    ?>
                  </div>

                  <h4>
                    $<?= $item['selling_price']; ?>
                    <span style="text-decoration: line-through;">$<?= $item['original_price']; ?></span>
                  </h4>

                </div>

                <div class="cart">
                  <i class="fa-regular fa-cart-shopping" style="color: #088178;"></i>
                </div>

                <div class="save">
                  <i class="fa-regular fa-heart"></i>
                </div>

              </div>

          <?php

            }
          }

          ?>

        </div>

        <div class="slider-btn">
          <button class="glider-prev"><i class="fa-solid fa-circle-chevron-right fa-rotate-180" style="color: #088178;"></i></button>
          <button class="glider-next"><i class="fa-solid fa-circle-chevron-right" style="color: #088178;"></i></button>
        </div>
      </div>

    </div>


    <button class="show-more">Show More...</button>

    <h3>WINTER COLLECTION 2024 : NEW MODERN DESIGN FOR MEN & WOMEN</h3>

    <div class="pro-container">

      <div class="glider-contain">
        <div class="glider2">
          <?php

          $keyword = "Winter Collection 2024";
          $query = "SELECT * FROM products WHERE rate >= 4 AND meta_title LIKE '%$keyword%'";
          $products = mysqli_query($con, $query);

          if (mysqli_num_rows($products) > 0) {
            foreach ($products as $item) {
          ?>
              <div class="pro" onclick="redirectToProductDetails('<?= $item['slug']; ?>')">

                <img id="winter-image1" src="uploads/<?= $item['image']; ?>" alt="product1">
                <!-- Image2 and Image3 with fade transition -->
                <img class="rear-img"  src="uploads/<?= $item['image2']; ?>" alt="product2">
                <img class="rear-img" src="uploads/<?= $item['image3']; ?>" alt="product3">

                <div class="des">
                  <span><?= $item['brand']; ?></span>
                  <h5><?= $item['name']; ?></h5>

                  <div class="star">

                    <?php

                    $rating = $item['rate'];
                    $integerRating = floor($rating);
                    $fractionalPart = $rating - $integerRating;

                    for ($i = 1; $i <= $integerRating; $i++) {
                      echo '<i class="fas fa-star"></i>';
                    }

                    // Half star
                    if ($fractionalPart >= 0.5) {
                      echo '<i class="fa-solid fa-star-half"></i>';
                    }

                    if ($rating == 0) {
                      for ($i = 1; $i <= 5; $i++) {
                        echo '<i class="fa-regular fa-star"></i>';
                      }
                    }

                    ?>
                  </div>

                  <h4>
                    $<?= $item['selling_price']; ?>
                    <span style="text-decoration: line-through;">$<?= $item['original_price']; ?></span>
                  </h4>

                </div>

                <div class="cart">
                  <i class="fa-regular fa-cart-shopping" style="color: #088178;"></i>
                </div>

                <div class="save">
                  <i class="fa-regular fa-heart"></i>
                </div>

              </div>

          <?php

            }
          }

          ?>

        </div>

        <div class="slider-btn">
          <button class="glider-prev" id="bp2"><i class="fa-solid fa-circle-chevron-right fa-rotate-180" style="color: #088178;"></i></i></button>
          <button class="glider-next" id="bn2"><i class="fa-solid fa-circle-chevron-right" style="color: #088178;"></i></button>
        </div>
      </div>


    </div>

    <button class="show-more">Show More...</button>

  </section>
  <!-- Featured Product Section End -->

  <!-- Banner Section Begin -->
  <section id="banner" class="section-m1">
    <h4>REPAIR SERVICES</h4>
    <h2>Up to <span>70% OFF</span> - All T-Shirts & Accessories</h2>
    <button class="normal">Explore More</button>

  </section>
  <!-- Banner Section End -->

  <!-- Accessories Section Begin -->
  <section id="product2" class="section-p1 hidden">

    <h2>ACCESSORIES</h2>

    <h3>VIBRANT ACCESSORIES TO COMPLEMENT ANY LOOK</h3>


    <div class="pro-container">

      <div class="glider-contain">
        <div class="glider3">
          <?php

          $query = "SELECT * FROM products WHERE rate >= 4 AND category_id = 19";

          $products = mysqli_query($con, $query);

          if (mysqli_num_rows($products) > 0) {
            foreach ($products as $item) {
          ?>
              <div class="pro" onclick="redirectToProductDetails('<?= $item['slug']; ?>')">

                <img id="accessories-image1" src="uploads/<?= $item['image']; ?>" alt="product1">
                <!-- Image2 and Image3 with fade transition -->
                <img class="rear-img"  src="uploads/<?= $item['image2']; ?>" alt="product2">
                <img class="rear-img" src="uploads/<?= $item['image3']; ?>" alt="product3">

                <div class="des">
                  <span><?= $item['brand']; ?></span>
                  <h5><?= $item['name']; ?></h5>

                  <div class="star">

                    <?php

                    $rating = $item['rate'];
                    $integerRating = floor($rating);
                    $fractionalPart = $rating - $integerRating;

                    for ($i = 1; $i <= $integerRating; $i++) {
                      echo '<i class="fas fa-star"></i>';
                    }

                    // Half star
                    if ($fractionalPart >= 0.5) {
                      echo '<i class="fa-solid fa-star-half"></i>';
                    }

                    if ($rating == 0) {
                      for ($i = 1; $i <= 5; $i++) {
                        echo '<i class="fa-regular fa-star"></i>';
                      }
                    }

                    ?>
                  </div>

                  <h4>
                    $<?= $item['selling_price']; ?>
                    <span style="text-decoration: line-through;">$<?= $item['original_price']; ?></span>
                  </h4>

                </div>

                <div class="cart">
                  <i class="fa-regular fa-cart-shopping" style="color: #088178;"></i>
                </div>

                <div class="save">
                  <i class="fa-regular fa-heart"></i>
                </div>

              </div>

          <?php

            }
          }

          ?>

        </div>

        <div class="slider-btn">
          <button class="glider-prev" id="bp3"><i class="fa-solid fa-circle-chevron-right fa-rotate-180" style="color: #088178;"></i></button>
          <button class="glider-next" id="bn3"><i class="fa-solid fa-circle-chevron-right" style="color: #088178;"></i></button>
        </div>
      </div>

    </div>


    <button class="show-more">Show More...</button>

  </section>
  <!-- Accessories Section End -->

  <!-- Small Banners Sections Begin -->
  <section id="sm-banner" class="section-p1">
    <div class="banner-box" id="sm-box1">
      <h4>Crazy Deals</h4>
      <h2>Buy 1 Get 1 Free!!!</h2>
      <span>The Best Classic Dress Is On Sale At StylishYou</span>
      <button class="white">Learn More</button>
    </div>

    <div class="banner-box banner-box2" id="sm-box2">
      <h4>Spring / Summer</h4>
      <h2>Upcoming Season</h2>
      <span>The Best Classic Dress Is On Sale At StylishYou</span>
      <button class="white">Collection</button>
    </div>
  </section>

  <section id="banner3">

    <div class="banner-box" id="banner-box1">
      <h2>SEASONAL SALE</h2>
      <h3>Winter Collection -50% OFF</h3>
    </div>

    <div class="banner-box banner-box2" id="banner-box2">
      <h2>NEW FOOTWEAR COLLECTION</h2>
      <h3>Spring / Summer 2023</h3>
    </div>

    <div class="banner-box banner-box3" id="banner-box3">
      <h2>T-SHIRTS</h2>
      <h3>New Trendy Prints</h3>
    </div>

  </section>
  <!-- Small Banners Sections End -->

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
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="Glider/glider.js"></script>
  <script src="script.js"></script>


</body>

</html>