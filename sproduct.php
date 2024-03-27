<?php
session_start();
include('Admin_dashbord/config/dbcon.php');
include('functions/getSlugActive.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StylishYou | Shop</title>

  <!-- Products Slider Library -->
  <link rel="stylesheet" href="Glider/glider.css">

  <!-- Google Fonts Integration -->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

  <!-- Global StyleSheet -->
  <link rel="stylesheet" href="style.css">

  <!-- Single Product Page Styling -->
  <style>
    .active 
    {
      border: 1px solid #4aaad2;
      box-shadow: 0 0 3px 0 #4aaad2;
    }
  </style>

  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/32d58e182d.js" crossorigin="anonymous"></script>

  <!-- Font awesome All Icons Library -->
  <link rel="stylesheet" href="v6.4.2/css/all-1.css">

  <!-- Font awesome 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />

  <!-- box icons -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <!-- Scripts For The Integrated Libraries -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        <li><a class="active-page" href="shop.php">Shop</a></li>
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

  </section>
  <!-- Page Header Section End -->

  <!-- Single Product Section Begin -->
  <section id="prodetails" class="section-p1">


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
 

    <?php

    if (isset($_GET['product'])) 
    {
      
      $product_slug = $_GET['product'];
      $product_data = getSlugActive("products", $product_slug);
      global $product;
      $product = mysqli_fetch_array($product_data);

      if ($product) 
      {
        ?> 
      <div class="single-pro-image">
        <img src="uploads/<?= $product['image']; ?>" width="100%" height="600px" id="MainImg" xoriginal = "uploads/<?= $product['image']; ?>" alt="">

        <div class="small-img-group">

          <div class="small-img-col">
            <a href="uploads/<?= $product['image']; ?>">
              <img src="uploads/<?= $product['image']; ?>" class="small-img" width="100%" height="133px" xpreview = "uploads/<?= $product['image']; ?>" alt="">
            </a>
          </div>

          <div class="small-img-col">
            <a href="uploads/<?= $product['image2']; ?>">
              <img src="uploads/<?= $product['image2']; ?>" class="small-img" width="100%" height="133px" xpreview = "uploads/<?= $product['image2']; ?>" alt="">
            </a>
          </div>

          <div class="small-img-col">
            <a href="./uploads/<?= $product['image3']; ?>">
              <img src="uploads/<?= $product['image3']; ?>" class="small-img" width="100%" height="133px" xpreview = "uploads/<?= $product['image3']; ?>" alt="">
            </a>
          </div>

          <div class="small-img-col">
            <a href="uploads/<?= $product['image']; ?>">
              <img src="uploads/<?= $product['image']; ?>" class="small-img" width="100%" height="133px" xpreview = "uploads/<?= $product['image']; ?>" alt="">
            </a>
          </div>

        </div>
      </div>

      <div class="single-pro-details">
        <div class="breadcrumb">
          <a href="index.php">Home</a> / <a href="shop.php">Shop</a> / <a href="sproduct.php?product=<?= $product['slug']; ?>"><?= $product['name']; ?></a>
        </div>

        <h4><?= $product['name']; ?> - <?= $product['brand']; ?></h4>
        <div class="price">
          <h2>$<?= $product['selling_price']; ?></h2>
          <h2 style="font-size: 15px;">$<?= $product['original_price']; ?></h2>
        </div>

        <?php

          if ($product['category_id'] != 19 && $product['category_id'] != 20 && ($product['category_id'] == 19 && strpos($product['name'], 'Bracelet') !== false)) 
          {
            ?>
            <div class="size-select-menu">
              <div class="size-select-btn">
                  <span class="sBtn-text">Select Size</span>
                  <i class="bx bx-chevron-down"></i>
              </div>
              <ul class="size-options">
                  <li class="size-option">
                      <span class="size-option-text">S</span>
                  </li>
                  <li class="size-option">
                      
                      <span class="size-option-text">M</span>
                  </li>
                  <li class="size-option">
                      
                      <span class="size-option-text">L</span>
                  </li>
                  <li class="size-option">
                      
                      <span class="size-option-text">XL</span>
                  </li>

                  <li class="size-option">
                      
                      <span class="size-option-text">XXL</span>
                  </li>
              </ul>
            </div>
          <?php
          }

          else if ($product['category_id'] == 19 && strpos($product['name'], 'Necklace') !== false) 
          {
            ?>
              <div class="size-select-menu">
                <div class="size-select-btn">
                    <span class="sBtn-text">Select Size</span>
                    <i class="bx bx-chevron-down"></i>
                </div>
                <ul class="size-options">
                    <li class="size-option">
                        <span class="size-option-text">18 IN</span>
                    </li>
                    <li class="size-option">
                        
                        <span class="size-option-text">20 IN</span>
                    </li>
                    <li class="size-option">
                        
                        <span class="size-option-text">22 IN</span>
                    </li>
                    <li class="size-option">
                        
                        <span class="size-option-text">24 IN</span>
                    </li>

                    <li class="size-option">
                        
                        <span class="size-option-text">26 IN</span>
                    </li>
                </ul>
              </div>
            <?php
          
            }

          else if ($product['category_id'] == 19 && strpos($product['name'], 'Ring') !== false) 
          {
            ?>
              <div class="size-select-menu">
                <div class="size-select-btn">
                    <span class="sBtn-text">Select Size</span>
                    <i class="bx bx-chevron-down"></i>
                </div>
                <ul class="size-options">
                    <li class="size-option">
                        <span class="size-option-text">5</span>
                    </li>
                    <li class="size-option">
                        
                        <span class="size-option-text">7</span>
                    </li>
                    <li class="size-option">
                        
                        <span class="size-option-text">7.5</span>
                    </li>
                    <li class="size-option">
                        
                        <span class="size-option-text">8</span>
                    </li>

                    <li class="size-option">
                        
                        <span class="size-option-text">8.5</span>
                    </li>
                </ul>
              </div>
            <?php
          }

          else if ($product['category_id'] == 20 && strpos($product['name'], 'Shoes') !== false) 
          {
            ?>
              <div class="size-select-menu">
                <div class="size-select-btn">
                    <span class="sBtn-text">Select Size</span>
                    <i class="bx bx-chevron-down"></i>
                </div>
                <ul class="size-options">
                    <li class="size-option">
                        <span class="size-option-text">M 7 / W 8.5</span>
                    </li>
                    <li class="size-option">
                        
                        <span class="size-option-text">M 7.5 / W 9</span>
                    </li>
                    <li class="size-option">
                        
                        <span class="size-option-text">M 8 / W 9.5</span>
                    </li>
                    <li class="size-option">
                        
                        <span class="size-option-text">M 8.5 / W 10</span>
                    </li>

                    <li class="size-option">
                        
                        <span class="size-option-text">M 9 / W 10.5</span>
                    </li>
                </ul>
              </div>
            <?php
          }

          else 
          {
            ?>
            <div class="size-select-menu">
              <div class="size-select-btn">
                  <span class="sBtn-text">Select Size</span>
                  <i class="bx bx-chevron-down"></i>
              </div>
              <ul class="size-options">
                  <li class="size-option">
                      <span class="size-option-text">S</span>
                  </li>
                  <li class="size-option">
                      
                      <span class="size-option-text">M</span>
                  </li>
                  <li class="size-option">
                      
                      <span class="size-option-text">L</span>
                  </li>
                  <li class="size-option">
                      
                      <span class="size-option-text">XL</span>
                  </li>

                  <li class="size-option">
                      
                      <span class="size-option-text">XXL</span>
                  </li>
              </ul>
            </div>
            <?php
          }
        ?>

        

        <input type="number" min="1" value="1" data-max="<?= $product['qty']; ?>" style="display: none;">
        <div class="stepper">
          <span class="minus">-</span>
          <span class="num">01</span>
          <span class="plus">+</span>
        </div>
        <button class="normal AddToCart" value="<?= $product['id']; ?>"><i class="fa-solid fa-cart-shopping" style="margin-right: 10px; margin-left: -15px;"></i> Add To Cart</button>
        <button class="normal"><i class="fa-regular fa-bookmark" style="margin-right: 10px; margin-left: -15px;"></i> Add To Wishlist</button>

        <ul class="pro-accordion">
          <li>
            <input type="radio" name="accordion" id="first" checked>
            <label for="first">Description</label>
            <div class="accordion-content">
              <span>
                <?= $product['small_description']; ?>
              </span>
            </div>
          </li>

          <li>
            <input type="radio" name="accordion" id="second">
            <label for="second">Product Details</label>
            <div class="accordion-content">
            <span>
              <?= nl2br($product['description']); ?>
            </span>
            </div>
          </li>
        </ul>

        

      </div>

      <?php

      }

      else 
      {
          echo "Product Not Found !";

      }

    }

    else 
    {
    echo "Something Went Wrong !";
    }
    ?>
  </section>
  <!-- Single Product Section End -->

  <!-- Similar Products Slider Section Begin -->
  <section id="product2" class="section-p1">

    <h2>SIMILAR PRODUCTS</h2>

    <div class="pro-container">

      <div class="glider-contain">
        <div class="glider4">
          <?php

          $query = "SELECT * FROM products WHERE rate >= 4 AND category_id = '$product[category_id]' AND slug != '$product[slug]'";

          $products = mysqli_query($con, $query);

          if (mysqli_num_rows($products) > 0) {
            foreach ($products as $item) {
          ?>
              <div class="pro" onclick="redirectToProductDetails('<?= $item['slug']; ?>')">

                <img id="sproductImg" src="uploads/<?= $item['image']; ?>" alt="product1">
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
          <button class="glider-prev" id="bp4"><i class="fa-solid fa-circle-chevron-right fa-rotate-180" style="color: #088178;"></i></button>
          <button class="glider-next" id="bn4"><i class="fa-solid fa-circle-chevron-right" style="color: #088178;"></i></button>
        </div>

      </div>

    </div>

  </section>
  <!-- Similar Products Slider Section End -->

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
      <p><strong>Hours : </strong>10:00 - 18:00, Mon - Sat</p>

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
  <script src="Glider/glider.js"></script>
  <script src="zoom-effect/jquery.js" ></script>
  <script src="zoom-effect/zoom.js" ></script>
  <script src="product-details.js"></script>


</body>

</html>