<?php
session_start();
include('../Admin_dashbord/config/dbcon.php');
include('../functions/getCartItems.php');

$items = getCartItems();
$total = 0;
$totalProducts = 0;

foreach ($items as $citem) {
    $totalProducts += $citem['prod_qty'];
    $total += $citem['selling_price'] * $citem['prod_qty'];
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>StylishYou | Checkout</title>

    <!-- Font awesome All Icons Library -->
    <link rel="stylesheet" href="../v6.4.2/css/all-1.css">

    <!---- Stylesheet Link ---->
    <link rel="stylesheet" href="checkout-style.css">

    <!---- Google Fonts Link ---->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

     
</head>
<body>
    
    <!---- Page Preloader ---->
    <div id="preloader">
    </div>

    <!---- Page Header Section ---->
    <section id="header">
        <a href="../index.php"><img src="../img/winter_logo.png" class="logo" alt=""></a>
        <div>
        <ul id="navbar">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../shop.php">Shop</a></li>
            <li><a href="../blog.php">Blog</a></li>
            <li><a href="../about.php">About</a></li>
            <li><a href="../contact.php">Contact</a></li>
            <li><a class="active-page" href="../cart.php"><i class="fa-regular fa-cart-shopping-fast"></i></a></li>
        </ul>
        </div>

        <div>
        <?php if (isset($_SESSION['auth'])) { ?>
            <div class="action">
            <div class="profile" onclick="menuToggle();">
                <img src="../assets/icons/avatar.png" />
            </div>
            <div class="menu">
                <h4>Username : <?= $_SESSION['auth_user']['name']; ?><br /><span>User ID : #<?= $_SESSION['auth_user']['user_id']; ?></span></h4>
                <ul>
                <li>
                    <img src="../assets/icons/user.png" /><a href="#">My profile</a>
                </li>
                <li>
                    <img src="../assets/icons/edit.png" /><a href="#">Edit profile</a>
                </li>
                <li>
                    <img src="../assets/icons/wishlist.png" /><a href="#">Wishlist</a>
                </li>
                <li>
                    <img src="../assets/icons/envelope.png" /><a href="#">Inbox</a>
                </li>
                <li>
                    <img src="../assets/icons/settings.png" /><a href="#">Setting</a>
                </li>
                <li>
                    <img src="../assets/icons/question.png" /><a href="#">Help</a>
                </li>
                <li>
                    <img src="../assets/icons/log-out.png" /><a href="../Login_Form/logout.php">Logout</a>
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

    <!---- Checkout Payment Section ---->
    <main class="checkout-container">
        
        <h1 class="heading">
            <ion-icon name="cart-outline" ></ion-icon> Shopping Cart
        </h1>

        <div class="item-flex">

            <!---- Checkout Section ---->
            <section class="checkout">

                <h2 class="section-heading">Payment Details</h2>

                <div class="payment-form">
                    
                    <div class="payment-method">

                        <button id="creditCardBtn" class="method selected">
                            <ion-icon name="card"></ion-icon>

                            <span>Credit Card</span>

                            <ion-icon class="checkmark fill" name="checkmark-circle"></ion-icon>
                        </button>

                        <button id="paypalBtn" class="method">
                            <ion-icon name="logo-paypal"></ion-icon>

                            <span>PayPal</span>

                            <ion-icon class="checkmark" name="checkmark-circle-outline"></ion-icon>
                        </button>

                    </div>

                    <form action="#">

                        <div class="cardholder-name">
                            <label for="cardholder-name" class="label-default">Cardholder Name</label>
                            <input type="text" name="cardholder-name" id="cardholder-name" class="input-default">
                        </div>

                        <div class="card-number">
                            <label for="card-number" class="label-default">Card Number</label>
                            <input type="number" name="card-number" id="card-number" class="input-default">
                        </div>

                        <div class="input-flex">

                            <div class="expire-date">
                                <label for="expire-date" class="lebel-default">Expiration Date</label>

                                <div class="input-flex">
                                    <input type="number" name="day" id="expire-date" placeholder="31" min="1" max="31" class="input-default">
                                    /
                                    <input type="number" name="month" id="expire-date" placeholder="12" min="1" max="12" class="input-default">
                                    
                                </div>
                            </div>

                            <div class="cvv">
                                <label for="cvv" class="label-default">CVV</label>
                                <input type="number" name="cvv" id="cvv" class="input-default">
                            </div>
                        </div>

                    </form>

                </div>

                <button class="btn btn-primary">
                    <b>Pay</b> $ <span id="payAmount"><?= number_format($total + 0.05 * $total, 2); ?></span>
                </button>

            </section>

            <!---- Cart Section ---->
            <section class="chekcout-cart">

                <div class="cart-item-box">

                    <h2 class="section-heading">Order Summary</h2>

                    <?php 
                        
                        
                        $items = getCartItems();


                        foreach($items as $citem)
                        {?>

                            <div class="product-card">

                                <div class="checkout-card">

                                    <div class="img-box">
                                        <img src="../uploads/<?= $citem['image']; ?>" alt="" width="80px" height="80px" class="product-img">
                                    </div>

                                    <div class="detail">

                                        <h4 class="product-name"><?= $citem['name']; ?></h4>

                                        <div class="checkout-wrapper">

                                            <div class="product-qty">
                                                <button id="decrement">
                                                    <ion-icon name="remove-outline" ></ion-icon>
                                                </button>

                                                <span id="quantity"><?= $citem['prod_qty']; ?></span>

                                                <button id="increment">
                                                    <ion-icon name="add-outline" ></ion-icon>
                                                </button>
                                            </div>

                                            <div class="checkout-price">
                                                $ <span id="checkout-price"><?= $citem['selling_price']; ?></span>
                                            </div>

                                        </div>

                                    </div>

                                    <button class="product-close-btn">
                                        <ion-icon name="close-outline"></ion-icon>
                                    </button>

                                </div>

                            </div>

                        <?php
                        }
                    ?>

                </div>

                <div class="checkout-wrapper">

                    <div class="discount-token">

                        <label for="token" class="label-default">Gift Card/Discount Code</label>

                        <div class="checkout-wrapper-flex">

                            <input type="text" name="discount-token" id="discount-token" class="input-default">

                            <button class="btn btn-outline">Apply</button>

                        </div>  

                    </div>

                    <div class="amount">

                        <div class="checkout-subtotal">

                            <span>Subtotal</span> <span>$ <span id="checkout-subtotal"><?= number_format($total, 2); ?></span></span>

                        </div>

                        <div class="tax">

                            <span>Tax</span> <span>$ <span id="tax"><?= number_format($total * 0.05, 2); ?></span></span>

                        </div>

                        <div class="shipping">

                            <span>Shipping</span> <span>$ <span id="shipping">0.00</span></span>

                        </div>

                        <div class="checkout-total">

                            <span>Total</span> <span>$ <span id="checkout-total"><?= number_format($total + 0.05 * $total, 2); ?></span></span>

                        </div>

                    </div>

                </div>

            </section>

            <div class="time" style="display: none;">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Huhp23Imxtk?si=0VIQ_q4i399Cf3mH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>

        </div>

        <div class="time" style="display: none;">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Huhp23Imxtk?si=0VIQ_q4i399Cf3mH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </main>

    
    <!---- JavaScript Link ---->
    <script src="checkout-script.js" ></script>

    <!---- Ionicons Link ---->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>