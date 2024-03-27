 <?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style_form.css">
        <link rel="shortcut icon" href="footage/zip.png">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>    
    </head>

    <body>
        <div class="hero">

            <?php if(isset($_SESSION['message'])) { ?>
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
            } ?>

            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                    <button type="button" class="toggle-btn" onclick="register()">Register</button>
                </div>

                <div class="social-icons">
                    <img src="footage/fb.png">
                    <img src="footage/tw.png">
                    <img src="footage/gp.png">
                </div>

                <?php
                if(isset($_SESSION['auth'])){
                    header('Location: ../index.php');
                }
                ?>
                <form action="authcode.php" id="login" class="input-group1" method="POST">
                    <input type="text" name="email" class="input-field" placeholder="Email" autocomplete ="off" required>
                    <input type="password" name="password" id="password" class="input-field" placeholder="Password" autocomplete ="off" required>
                    <img src="../assets/icons/eye-close.png" id="eyeicon" width = "25px" style="transform: translateY(-140%);margin-left: 255px;position:relative;cursor:pointer;">
                    <a href="#" class="forgot-password-link">Forgot Password?</a>
                    <button type="submit" name="login_btn" class="submit-btn">Log In</button>
                </form>
                

                <form action="authcode.php" id="register" class="input-group2" method="POST">
                    <input type="text" name="name" class="input-field" placeholder="Username" autocomplete ="off" required>
                    <input type="email" name="email" class="input-field" placeholder="Email" autocomplete ="off" required>
                    <input type="text" name="phone" class="input-field" placeholder="Phone Number" autocomplete ="off" required>
                    <input type="password" name="password" class="input-field" placeholder="Enter Password" autocomplete ="off" required>
                    <input type="password" name="cpassword" class="input-field" placeholder="Confirm Password" autocomplete ="off" required>
                    <input type="checkbox" class="check-box"><span>I agree to the <a href="terms.html" target="_blank" >terms & conditions</a></span>
                    <button type="submit" name="register_btn" class="submit-btn">Register</button>
                </form>
            
            </div>      
            
        </div>

        <script>


            var x = document.getElementById("login");
            var y = document.getElementById("register");
            var z = document.getElementById("btn");
    
            function register() {
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "100px";
            }

            function login() {
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0px";
            }

            // Check if there is a specific parameter in the URL
            const urlParams = new URLSearchParams(window.location.search);
            const action = urlParams.get('action');

            if (action === 'showRegister') {
                // Add your logic to show the register form or apply styles here
                var x = document.getElementById("login");
                var y = document.getElementById("register");
                var z = document.getElementById("btn");
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "100px";
            }

            $(".fas").click(function() {
            $(".wrapper-info")
                .fadeOut();
            });

            setTimeout(function() {
                $(".wrapper-info").fadeOut();
            }, 3000);

            document.addEventListener("DOMContentLoaded", function () {
                let eyeicon = document.getElementById("eyeicon");
                let password = document.getElementById("password");

                // Initially hide the eye icon
                eyeicon.style.visibility = "hidden";

                // Show the eye icon when at least one character is typed
                password.addEventListener("input", function () {
                    if (password.value.trim().length > 0) {
                        eyeicon.style.visibility = "visible";
                    } else {
                        eyeicon.style.visibility = "hidden";
                    }
                });

                // Toggle password visibility and eye icon when clicking on the eye icon
                eyeicon.addEventListener("click", function (event) {
                    if (password.type === "password") {
                        password.type = "text";
                        eyeicon.src = "../assets/icons/eye-open.png";
                    } else {
                        password.type = "password";
                        eyeicon.src = "../assets/icons/eye-close.png";
                    }

                    // Set focus back to the password field
                    password.focus();

                    event.preventDefault(); // Prevent the default action of the click event
                    event.stopPropagation(); // Prevent the click event from reaching document
                });
            });

        </script>

    </body>

</html>
