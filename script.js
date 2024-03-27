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
  ScrollReveal().reveal("#product1 h2", { origin: "bottom" });
  ScrollReveal().reveal("#product1 h3", { origin: "left" });
  ScrollReveal().reveal("#product1 .pro-container", { origin: "left" });
  ScrollReveal().reveal("#product2 h2", { origin: "bottom" });
  ScrollReveal().reveal("#product2 h3", { origin: "left" });
  ScrollReveal().reveal("#product2 .pro-container", { origin: "left" });
  ScrollReveal().reveal(".show-more", { origin: "left" });
  ScrollReveal().reveal("#banner", { origin: "bottom" });
  ScrollReveal().reveal("#sm-box1", { origin: "left" });
  ScrollReveal().reveal("#sm-box2", { origin: "right" });
  ScrollReveal().reveal("#banner-box1", { origin: "bottom" });
  ScrollReveal().reveal("#banner-box2", { origin: "bottom" });
  ScrollReveal().reveal("#banner-box3", { origin: "bottom" });
  ScrollReveal().reveal("#page-header", { origin: "top" });
  ScrollReveal().reveal("#cart", { origin: "bottom" });
  ScrollReveal().reveal("#coupon", { origin: "left" });
  ScrollReveal().reveal("#subtotal", { origin: "right" });
  ScrollReveal().reveal(".blog-box h1", { origin: "left" });
  ScrollReveal().reveal(".blog-img", { origin: "left" });
  ScrollReveal().reveal(".blog-details", { origin: "right" });
  ScrollReveal().reveal("#about-head img", { origin: "left" });
  ScrollReveal().reveal("#about-head h2", { origin: "right" });
  ScrollReveal().reveal("#about-head p", { origin: "right" });
  ScrollReveal().reveal("#about-head abbr", { origin: "right" });
  ScrollReveal().reveal("#about-head marquee", { origin: "right" });
  ScrollReveal().reveal("#about-app h1", { origin: "top" });
  ScrollReveal().reveal("#about-app .video", { origin: "top" });
  ScrollReveal().reveal("#pagination", { origin: "top" });
  ScrollReveal().reveal(".contact-details", { origin: "left" });
  ScrollReveal().reveal("#contact-details .map", { origin: "right" });
  ScrollReveal().reveal("#form-details", { origin: "bottom" });
  ScrollReveal().reveal(".people", { origin: "right" });
  ScrollReveal().reveal("#newsletter", { origin: "bottom" });
  ScrollReveal().reveal("footer", { origin: "bottom" });



});

//================================================= Initialize Header Swiper slider ====================================================================
const swiper = new Swiper(".swiper", {
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

var category_swiper = new Swiper(".category-carousel", {
  slidesPerView: 6,
  spaceBetween: 30,
  speed: 500,
  navigation: {
    nextEl: ".category-carousel-next",
    prevEl: ".category-carousel-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    991: {
      slidesPerView: 4,
    },
    1500: {
      slidesPerView: 6,
    },
  },
});

/*=============================================================== Product Sliders ============================================================*/

new Glider(document.querySelector(".glider"), {
  slidesToScroll: 1,
  slidesToShow: 4,
  controlledBy: ".glider",
  draggable: true,
  arrows: {
    prev: ".glider-prev",
    next: ".glider-next",
  },

});

new Glider(document.querySelector(".glider2"), {
  slidesToScroll: 1,
  slidesToShow: 4,
  draggable: true,
  arrows: {
    prev: "#bp2",
    next: "#bn2",
  },
});

new Glider(document.querySelector(".glider3"), {
  slidesToScroll: 1,
  slidesToShow: 4,
  draggable: true,
  arrows: {
    prev: "#bp3",
    next: "#bn3",
  },
});


/*==================================================================== Buttons Functions ======================================================*/

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

function redirectToProductDetails(productSlug) {
  window.location.href = "sproduct.php?product=" + productSlug;
}

/*========================================================================= Alert Display ================================================================*/

$(".fas").click(function () {
  $(".wrapper-info").fadeOut();
});

setTimeout(function () {
  $(".wrapper-info").fadeOut();
}, 4000);

/*========================================================================= Scroll Button ================================================================*/

let calcScrollValue = () => {
  let scrollProgress = document.getElementById("progress");
  let progressValue = document.getElementById("progress-value");

  let pos = document.documentElement.scrollTop;
  let calcHeight =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
  let scrollValue = Math.round((pos * 100) / calcHeight);

  if (pos > 100) {
    scrollProgress.style.display = "grid";
  } else {
    scrollProgress.style.display = "none";
  }
  scrollProgress.addEventListener("click", () => {
    document.documentElement.scrollTop = 0;
  });
  scrollProgress.style.background = `conic-gradient(#088178 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
};

window.onscroll = calcScrollValue;
window.onload = calcScrollValue;

$(".loadingbar").delay(1500).animate({ left: "0" }, 3000);
$(".loadingBox").delay(500).animate({ opacity: "1" }, 1000);
$(".splashScreen").delay(4500).animate({ top: "-100%" }, 1500);
$(".loadingCircle").delay(4500).animate({ opacity: "0" }, 500);
$("body")
  .delay(5000)
  .queue(function () {
    $("body").addClass("visibleSplash");
  });


  (function ($) {
    "use strict";
  
    $(document).ready(function () {
      "use strict";
  
      // Scroll back to top
  
      var progressPath = document.querySelector(".progress-wrap path");
      var pathLength = progressPath.getTotalLength();
      progressPath.style.transition = progressPath.style.WebkitTransition =
        "none";
      progressPath.style.strokeDasharray = pathLength + " " + pathLength;
      progressPath.style.strokeDashoffset = pathLength;
      progressPath.getBoundingClientRect();
      progressPath.style.transition = progressPath.style.WebkitTransition =
        "stroke-dashoffset 10ms linear";
  
      var updateProgress = function () {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength) / height;
        progressPath.style.strokeDashoffset = progress;
      };
  
      updateProgress();
      $(window).scroll(updateProgress);
  
      var offset = 50;
      var duration = 550;
  
      jQuery(window).on("scroll", function () {
        if (jQuery(this).scrollTop() > offset) {
          jQuery(".progress-wrap").addClass("active-progress");
        } else {
          jQuery(".progress-wrap").removeClass("active-progress");
        }
      });
  
      jQuery(".progress-wrap").on("click", function (event) {
        event.preventDefault();
        jQuery("html, body").animate({ scrollTop: 0 }, duration);
        return false;
      });
    });
  })(jQuery);

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

// Initialize animation for product slider 1
initializeProductAnimation('#product1', 'summer-image1');

// Initialize animation for product slider 2
initializeProductAnimation('#product1', 'winter-image1');

// Initialize animation for product slider 3
initializeProductAnimation('#product2', 'accessories-image1');
  
  








  
  
  
  
  
  

  
  
  

