/*=============================================================== Preloader & Animation ============================================================*/

var loader = document.getElementById("preloader");

window.addEventListener("load", function () {
  loader.style.display = "none";
  document.body.style.overflow = "auto";
  document.getElementById("header").style.display = "flex";

  /*============================================================================= scroll reveal ==================================================================*/
  ScrollReveal({
    //reset: true,
    distance: "80px",
    duration: 2500,
    delay: 400,
  });

  ScrollReveal().reveal(".swiper", { origin: "top" });
  ScrollReveal().reveal("#services", { origin: "left" });
  ScrollReveal().reveal("#feature", { origin: "top" });
  ScrollReveal().reveal(".categories-titles", { origin: "left" });
  ScrollReveal().reveal("#women-fashion", { origin: "left" });
  ScrollReveal().reveal("#men-fashion", { origin: "top" });
  ScrollReveal().reveal("#kids-fashion", { origin: "top" });
  ScrollReveal().reveal("#cos-fashion", { origin: "right" });
  ScrollReveal().reveal("#accessoires-fashion", { origin: "right" });
  ScrollReveal().reveal("#product1", { origin: "left" });
  ScrollReveal().reveal("#banner", { origin: "bottom" });
  ScrollReveal().reveal("#page-header", { origin: "top" });
  ScrollReveal().reveal("#newsletter", { origin: "bottom" });
  ScrollReveal().reveal("footer", { origin: "bottom" });

});

//================================================= Similar Products Slider ====================================================================


new Glider(document.querySelector(".glider4"), {
  slidesToScroll: 1,
  slidesToShow: 4,
  draggable: true,
  arrows: {
    prev: "#bp4",
    next: "#bn4",
  },
});



/*========================================================================= Buttons Functions ================================================================*/

function menuToggle() {
  const toggleMenu = document.querySelector(".menu");
  toggleMenu.classList.toggle("active");
}

function redirectToLoginPage() {
  window.location.href = "./Login_Form/register.php";
}

function redirectToRegisterPage() {
  window.location.href = "./Login_Form/register.php?action=showRegister";
}

function redirectToShopPage() {
  window.location.href = "shop.php";
}

/*================================================================ Product Hover Animation =============================================*/

function initializeProductAnimation(productSelector, originalImageId) {
  document.querySelectorAll(productSelector + ' .pro-container .pro').forEach(function(product) {
    let timeout;
    let images = product.querySelectorAll('.rear-img');
    let originalImage = product.querySelector('#' + originalImageId); // Selecting the original image based on provided ID
    let currentIndex = 0;

    function fadeInNextImage() {
      originalImage.style.opacity = 0; // Hide the original image

      images.forEach(function(image) {
        image.style.opacity = 0; // Hide all images
      });

      if (currentIndex < images.length) {
        images[currentIndex].style.opacity = 1; // Show the next image
      } else {
        originalImage.style.opacity = 1; // Show the original image
      }

      currentIndex = (currentIndex + 1) % (images.length + 1); // Adding 1 to handle original image

      if (currentIndex === 0) {
        timeout = setTimeout(fadeInNextImage, 2000); // Wait 2 seconds before reverting to main image
      } else {
        timeout = setTimeout(fadeInNextImage, 2000); // Wait 2 seconds between transitions
      }
    }

    product.addEventListener('mouseenter', function() {
      timeout = setTimeout(fadeInNextImage, 2000); // Start after 2 seconds
    });

    product.addEventListener('mouseleave', function() {
      clearTimeout(timeout); // Stop the animation when mouse leaves
      originalImage.style.opacity = 1; // Show the original image when animation stops
      images.forEach(function(image) {
        image.style.opacity = 0; // Hide all images
      });
      currentIndex = 0; // Reset currentIndex
    });
  });
}

// Initialize animation for single product page
initializeProductAnimation('#product2', 'sproductImg');

/*================================================================ Single Product Zoom Effect =============================================*/

$(function () {

  $("#MainImg , .small-img").xzoom({
    zoomWidth: 400,
    tint: "#333",
    Xoffset: 15,
  });
  
});

const optionMenu = document.querySelector(".size-select-menu"),
selectBtn = optionMenu.querySelector(".size-select-btn"),
options = optionMenu.querySelectorAll(".size-option"),
sBtn_text = optionMenu.querySelector(".sBtn-text");
let selectedOptionValue = "";

selectBtn.addEventListener("click", () => optionMenu.classList.toggle("select-active"));       
options.forEach(option =>{
    option.addEventListener("click", ()=>{
        let selectedOption = option.querySelector(".size-option-text").innerText;
        selectedOptionValue = selectedOption;
        sBtn_text.innerText = selectedOption;
        optionMenu.classList.remove("select-active");
    });
});

/*================================================================ Quantity Stepper =============================================*/

const plus = document.querySelector(".plus"),
  minus = document.querySelector(".minus"),
  num = document.querySelector(".num"),
  input = document.querySelector("input[type='number']");
let a = 1;
const maxQty = parseInt(input.dataset.max);

plus.addEventListener("click", () => {
  if (a < maxQty) {
    a++;
    a = (a < 10) ? "0" + a : a;
    num.innerText = a;
    input.value = a; 
  }
});

minus.addEventListener("click", () => {
  if (a > 1) {
    a--;
    a = (a < 10) ? "0" + a : a;
    num.innerText = a;
    input.value = a; 
  }
});

/*================================================================ Cart Notifications =============================================*/

$(document).on('click', '.AddToCart', function (e) {

  e.preventDefault();

  var productQty = a;
  var productId = $(this).val();
  var productSize = selectedOptionValue;

  $.ajax({
    method: "POST",
    url: "functions/handleCart.php",
    data: {
      "productId" : productId,
      "productQty" : productQty,
      "productSize" : productSize,
      "scope" : "add"

    },
    success: function (response) 
    {


      if (response == 201)
      
      {
        $('#messageContent').text("Product Added To Cart Successfully !");
        $('#messageContainer').slideDown().delay(3000).fadeOut();
      }

      else if (response == "existing") 
      {
       
        $('#messageContent').text("Product Already In Cart!");
        $('#messageContainer').slideDown().delay(3000).fadeOut();
      
        
      }

      else if (response == 401) 
      {
       
        $('#messageContent').text("Login To Continue !");
        $('#messageContainer').slideDown().delay(3000).fadeOut();
      
        
      }

      else if (response == 500) 
      {
        $('#messageContent').text("Something Went Wrong...");
        $('#messageContainer').slideDown().delay(3000).fadeOut();
      }
    }
  });
});

function redirectToProductDetails(productSlug) {
  window.location.href = "sproduct.php?product=" + productSlug;
}











  
  
  
  
  
  

  
  
  

