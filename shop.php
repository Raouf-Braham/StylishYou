<?php
session_start();
include('Admin_dashbord/config/dbcon.php');

// Define the number of products to display per page

$per_page = 12;

if (isset($_GET["page"])) 
{
  $page = $_GET["page"];
}

else 
{
  $page = 1;
}

$start_from = ($page - 1)*12;


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StylishYou | Shop</title>

  <!-- Google Fonts Integration -->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/32d58e182d.js" crossorigin="anonymous"></script>

  <!-- Font awesome All Icons Library -->
  <link rel="stylesheet" href="v6.4.2/css/all-1.css">

  <!-- Font awesome 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
  
  <!-- Global StyleSheet -->
  <link rel="stylesheet" href="style.css" type="text/css">

  <!-- Shop Page StyleSheet -->
  <link rel="stylesheet" href="shop-style.css" type="text/css">

  <!-- box icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- Scripts For The Integrated Libraries -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

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

  <!-- Top Page Section Begin -->
  <section id="page-header">
    <h2>#StayHome</h2>
    <p>Save more with coupons & up to 70% off!</p>
  </section>
  <!-- Top Page Section End -->

  <!-- Main Section (Products Display + Filters Sidebar) Begin -->
  <main class="main" role="main">
    <div class="wrapper cf">
      <div class="breadcrumb">
        <a href="index.php">Home</a> > <a href="shop.php">Shop</a>
      </div>

      <aside class="sidebar">
        <h1 class="sidebar-heading">
          Filter By
        </h1>

        <ul class="filter ul-reset">

          <li class="filter-item">
            <section class="filter-item-inner">
              <h1 class="filter-item-inner-heading minus">
                Gender
              </h1>
              <ul class="filter-attribute-list ul-reset">
                <div class="filter-attribute-list-inner">
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="gender-attribute-1" class="filter-attribute-checkbox ib-m">
                    <label for="gender-attribute-1" class="filter-attribute-label ib-m">
                      Men
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="gender-attribute-2" class="filter-attribute-checkbox ib-m">
                    <label for="gender-attribute-2" class="filter-attribute-label ib-m">
                      Women
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="gender-attribute-3" class="filter-attribute-checkbox ib-m">
                    <label for="gender-attribute-3" class="filter-attribute-label ib-m">
                      Kids
                    </label>
                  </li>
                </div>
              </ul>
            </section>
          </li>

          <li class="filter-item">
            <section class="filter-item-inner">
              <h1 class="filter-item-inner-heading minus">
                Category
              </h1>
              <ul class="filter-attribute-list ul-reset">
                <div class="filter-attribute-list-inner">
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="category-attribute-1" class="filter-attribute-checkbox ib-m">
                    <label for="category-attribute-1" class="filter-attribute-label ib-m">
                      T-Shirts
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="category-attribute-2" class="filter-attribute-checkbox ib-m">
                    <label for="category-attribute-2" class="filter-attribute-label ib-m">
                      Pants
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="category-attribute-3" class="filter-attribute-checkbox ib-m">
                    <label for="category-attribute-3" class="filter-attribute-label ib-m">
                      Jackets
                    </label>
                  </li>

                  <li class="filter-attribute-item">
                    <input type="checkbox" id="category-attribute-4" class="filter-attribute-checkbox ib-m">
                    <label for="category-attribute-4" class="filter-attribute-label ib-m">
                      Dresses
                    </label>
                  </li>

                  <li class="filter-attribute-item">
                    <input type="checkbox" id="category-attribute-5" class="filter-attribute-checkbox ib-m">
                    <label for="category-attribute-5" class="filter-attribute-label ib-m">
                      Shorts
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="category-attribute-6" class="filter-attribute-checkbox ib-m">
                    <label for="category-attribute-6" class="filter-attribute-label ib-m">
                      Skirts
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="category-attribute-7" class="filter-attribute-checkbox ib-m">
                    <label for="category-attribute-7" class="filter-attribute-label ib-m">
                      Accessories
                    </label>
                  </li>
                </div>
              </ul>
            </section>
          </li>

          <li class="filter-item">
            <section class="filter-item-inner">
              <h1 class="filter-item-inner-heading minus">
                Brand
              </h1>
              <ul class="filter-attribute-list ul-reset">
                <div class="filter-attribute-list-inner">
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="brand-attribute-1" class="filter-attribute-checkbox ib-m">
                    <label for="brand-attribute-1" class="filter-attribute-label ib-m">
                      ZARA
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="brand-attribute-2" class="filter-attribute-checkbox ib-m">
                    <label for="brand-attribute-2" class="filter-attribute-label ib-m">
                      THE NORTH FACE
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="brand-attribute-3" class="filter-attribute-checkbox ib-m">
                    <label for="brand-attribute-3" class="filter-attribute-label ib-m">
                      H&M
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="brand-attribute-4" class="filter-attribute-checkbox ib-m">
                    <label for="brand-attribute-4" class="filter-attribute-label ib-m">
                      SHEIN
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="brand-attribute-5" class="filter-attribute-checkbox ib-m">
                    <label for="brand-attribute-5" class="filter-attribute-label ib-m">
                      DAVID YURMAN
                    </label>
                  </li>
                </div>
              </ul>
            </section>
          </li>

          <li class="filter-item">
            <section class="filter-item-inner">
              <h1 class="filter-item-inner-heading minus">
                Colour
              </h1>
              <ul class="filter-attribute-list ul-reset">
                <div class="filter-attribute-list-inner">
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-1" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-1" class="filter-attribute-label ib-m">
                      White
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-2" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-2" class="filter-attribute-label ib-m">
                      Lime
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-3" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-3" class="filter-attribute-label ib-m">
                      Biege
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-4" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-4" class="filter-attribute-label ib-m">
                      Khaki
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-5" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-5" class="filter-attribute-label ib-m">
                      Olive
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-6" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-6" class="filter-attribute-label ib-m">
                      Yellow
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-7" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-7" class="filter-attribute-label ib-m">
                      Gold
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-8" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-8" class="filter-attribute-label ib-m">
                      Sepia
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-9" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-9" class="filter-attribute-label ib-m">
                      Brown
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-10" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-10" class="filter-attribute-label ib-m">
                      Salmon
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-11" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-11" class="filter-attribute-label ib-m">
                      Coral
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-12" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-12" class="filter-attribute-label ib-m">
                      Red
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-13" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-13" class="filter-attribute-label ib-m">
                      Ruby
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-14" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-14" class="filter-attribute-label ib-m">
                      Plum
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="colour-attribute-15" class="filter-attribute-checkbox ib-m">
                    <label for="colour-attribute-15" class="filter-attribute-label ib-m">
                      Violet
                    </label>
                  </li>
                </div>
              </ul>
            </section>
          </li>

          <li class="filter-item">
            <section class="filter-item-inner">
              <h1 class="filter-item-inner-heading minus">
                Price
              </h1>
              <ul class="filter-attribute-list ul-reset">
                <div class="filter-attribute-list-inner">
                  <li class="filter-attribute-item">

                    <div class="range-slider">
                      <span class="slider-track"></span>
                      <input type="range" name="min_val" class="min-val" min="10" max="1000" value="40" oninput="slideMin()">
                      <input type="range" name="max_val" class="max-val" min="10" max="1000" value="600" oninput="slideMax()">
                      <div class="tooltip min-tooltip"></div>
                      <div class="tooltip max-tooltip"></div>
                    </div>
                    
                    <div class="input-box">
                      <div class="min-box">
                        <div class="input-wrap">
                          <span class="input-addon">$</span>
                          <input type="text" name="min_input" class="input-field min-input" onchange="setMinInput()">
                        </div>
                      </div>

                      <div class="max-box">
                      <div class="input-wrap">
                          <span class="input-addon">$</span>
                          <input type="text" name="max_input" class="input-field max-input" onchange="setMaxInput()">
                        </div>
                      </div>
                    </div>

                </div>
              </ul>
            </section>
          </li>

          <li class="filter-item">
            <section class="filter-item-inner">
              <h1 class="filter-item-inner-heading minus">
                Size
              </h1>
              <ul class="filter-attribute-list ul-reset">
                <div class="filter-attribute-list-inner">
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="size-attribute-1" class="filter-attribute-checkbox ib-m">
                    <label for="size-attribute-1" class="filter-attribute-label ib-m">
                      XS
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="size-attribute-2" class="filter-attribute-checkbox ib-m">
                    <label for="size-attribute-2" class="filter-attribute-label ib-m">
                      S
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="size-attribute-3" class="filter-attribute-checkbox ib-m">
                    <label for="size-attribute-3" class="filter-attribute-label ib-m">
                      M
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="size-attribute-4" class="filter-attribute-checkbox ib-m">
                    <label for="size-attribute-4" class="filter-attribute-label ib-m">
                      L
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="size-attribute-5" class="filter-attribute-checkbox ib-m">
                    <label for="size-attribute-5" class="filter-attribute-label ib-m">
                      XL
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="size-attribute-6" class="filter-attribute-checkbox ib-m">
                    <label for="size-attribute-6" class="filter-attribute-label ib-m">
                      XXL
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="size-attribute-7" class="filter-attribute-checkbox ib-m">
                    <label for="size-attribute-7" class="filter-attribute-label ib-m">
                      XXXL
                    </label>
                  </li>
                </div>
              </ul>
            </section>
          </li>

          <li class="filter-item">
            <section class="filter-item-inner">
              <h1 class="filter-item-inner-heading minus">
                Material
              </h1>
              <ul class="filter-attribute-list ul-reset">
                <div class="filter-attribute-list-inner">
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-1" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-1" class="filter-attribute-label ib-m">
                      Cotton
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-2" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-2" class="filter-attribute-label ib-m">
                      Flax
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-3" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-3" class="filter-attribute-label ib-m">
                      Wool
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-4" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-4" class="filter-attribute-label ib-m">
                      Ramie
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-5" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-5" class="filter-attribute-label ib-m">
                      Silk
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-6" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-6" class="filter-attribute-label ib-m">
                      Denim
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-7" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-7" class="filter-attribute-label ib-m">
                      Leather
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-8" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-8" class="filter-attribute-label ib-m">
                      Fur
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-9" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-9" class="filter-attribute-label ib-m">
                      Nylon
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-10" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-10" class="filter-attribute-label ib-m">
                      Polyesters
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-11" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-11" class="filter-attribute-label ib-m">
                      Spandex
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-12" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-12" class="filter-attribute-label ib-m">
                      Flannel
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-13" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-13" class="filter-attribute-label ib-m">
                      Acetate
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-14" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-14" class="filter-attribute-label ib-m">
                      Cupro
                    </label>
                  </li>
                  <li class="filter-attribute-item">
                    <input type="checkbox" id="material-attribute-15" class="filter-attribute-checkbox ib-m">
                    <label for="material-attribute-15" class="filter-attribute-label ib-m">
                      Lyocell
                    </label>
                  </li>
                </div>
              </ul>
            </section>
          </li>
        </ul>
      </aside>

      <section id="product3" class="section-p1 hidden">

        <h2>ALL PRODUCTS</h2>

        <div class="pro-container">
          <?php
          
          
          $query = "SELECT * FROM products LIMIT $start_from, $per_page";
      

          $products = mysqli_query($con, $query);

          if (mysqli_num_rows($products) > 0) {
              foreach ($products as $item) {
                  // Output HTML for each product
                  ?>
                  <div class="pro" onclick="redirectToProductDetails('<?= $item['slug']; ?>')">
                      <img src="uploads/<?= $item['image']; ?>" alt="product1">
                      <!-- Image2 and Image3 with fade transition -->
                      <img class="rear-img" src="uploads/<?= $item['image2']; ?>" alt="product2">
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

      </section>
    </div>

  </main>
  <!-- Main Section End -->

  <!-- Pagination Section Begin -->
  <section id="pagination" class="section-p1">
    <?php

      // Calculate total number of pages
      $query = "SELECT * FROM products";
      $result = mysqli_query($con, $query);
      $rows = mysqli_num_rows($result);
      $total_pages = ceil($rows / $per_page);

      $j = 2;

      if ($total_pages > 2)
      {
        $j++;
        echo "<span class='pagination-link'><a href='shop.php?page=1'>1</a></span>";
        echo "<span class='pagination-link'><a href='shop.php?page=2'>2</a></span>";
        echo "<span class='pagination-link'><a href='shop.php?page=" . $j . "'><i class='fa-solid fa-arrow-right'></i></a></span>";
      } 
      
      else 
      {
        for ($i = 1; $i <= $total_pages; $i++)
        {
            echo "<span class='pagination-link'><a href='shop.php?page=" . $i . "'>" . $i . "</a></span>";
        }
      }
    ?>
  </section>
  <!-- Pagination Section End -->

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

  <!-- JavaScript File -->
  <script src="shop-page.js"></script>


</body>

</html>