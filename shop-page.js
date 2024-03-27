/*======================================================== Preloader & Animation ================================================*/

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
  ScrollReveal().reveal("#banner", { origin: "bottom" });
  ScrollReveal().reveal("#page-header", { origin: "top" });
  ScrollReveal().reveal(".breadcrumb", { origin: "left" });
  ScrollReveal().reveal(".sidebar", { origin: "left" });
  ScrollReveal().reveal("#product3", { origin: "bottom" });
  ScrollReveal().reveal("#pagination", { origin: "top" });
  ScrollReveal().reveal("#newsletter", { origin: "bottom" });
  ScrollReveal().reveal("footer", { origin: "bottom" });

});

/*=============================================================== Buttons Functions ============================================================*/

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

function redirectToProductDetails(productSlug) {
  window.location.href = "sproduct.php?product=" + productSlug;
}

/*=============================================================== Sidebar Hide/Show Filters ============================================================*/

function accordion(section, heading, list) {
    $(section).each(function() {
      var that = this;
      
      $(this).find(heading).click(function() {
        $(this).toggleClass("plus");
        var filterList = $(that).find(list);
        var isHidden = filterList.height() === 0;
        if (isHidden) {
          filterList.css('display', 'block').animate({
            height: filterList.get(0).scrollHeight
          }, 250);
        } else {
          filterList.animate({
            height: 0
          }, 250, function() {
            filterList.css('display', 'none');
          });
        }
      });
    });
  }
  
accordion('.filter-item', '.filter-item-inner-heading', '.filter-attribute-list');
  
/*================================================================ Product Hover Animation =============================================*/

function initializeProductAnimation(productSelector, isSecondPage) {
  document.querySelectorAll(productSelector + ' .pro-container .pro').forEach(function(product) {
      let timeout;
      let images = product.querySelectorAll('.rear-img');
      let originalImage = product.querySelector('.pro img:first-child'); // Selecting the first image within the .pro class
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

          currentIndex = (currentIndex + 1) % (images.length + 1);

          if (currentIndex === 0) {
              timeout = setTimeout(fadeInNextImage, 2000); // Wait 2 seconds before reverting to main image
          } else {
              timeout = setTimeout(fadeInNextImage, 2000); // Wait 2 seconds between transitions
          }
      }

      product.addEventListener('mouseenter', function() {
          timeout = setTimeout(fadeInNextImage, 1000); // Start after 1 seconds
      });

      product.addEventListener('mouseleave', function() {
          clearTimeout(timeout); // Stop the animation when mouse leaves
          originalImage.style.opacity = 1; // Show the original image when animation stops
          images.forEach(function(image) {
              image.style.opacity = 0; // Hide all images
          });
          currentIndex = 0; // Reset currentIndex
      });

      if (isSecondPage) {
        product.style.height = '400px'; // Change the box size for the second page
        // Add any other custom styling for the second page
    }
  });
}


initializeProductAnimation('#product3', false);

/*================================================================ Filter Price Slider =============================================*/

window.onload = function () 
{
    slideMin();
    slideMax();
};
  
const minVal = document.querySelector(".min-val");
const maxVal = document.querySelector(".max-val");
const priceInputMin = document.querySelector(".min-input");
const priceInputMax = document.querySelector(".max-input");
const minTooltip = document.querySelector(".min-tooltip");
const maxTooltip = document.querySelector(".max-tooltip");
const minGap = 0;
const range = document.querySelector(".slider-track");
const sliderMinValue = parseInt(minVal.min);
const sliderMaxValue = parseInt(maxVal.max);

function slideMin() {
    let gap = parseInt(maxVal.value) - parseInt(minVal.value);

    if (gap <= minGap) 
    {
        minVal.value = parseInt(maxVal.value) - minGap;
    }

    minTooltip.innerHTML = "$" + minVal.value;
    priceInputMin.value = minVal.value;

    setArea();
}

function slideMax() {
    let gap = parseInt(maxVal.value) - parseInt(minVal.value);

    if (gap <= minGap) 
    {
        maxVal.value = parseInt(minVal.value) - minGap;
    }

    maxTooltip.innerHTML = "$" + maxVal.value;
    priceInputMax.value = maxVal.value;

    setArea();
}

function setArea() {
    range.style.left = (minVal.value / sliderMaxValue) * 100 + "%";
    minTooltip.style.left = (minVal.value / sliderMaxValue) * 100 + "%";

    range.style.right = 100 - (maxVal.value - sliderMaxValue) * 100 + "%";
    maxTooltip.style.right = 100 - (maxVal.value / sliderMaxValue) * 100 + "%";

    updateTooltipValues();
}

function updateTooltipValues() {
    minTooltip.innerHTML = "$" + minVal.value;
    maxTooltip.innerHTML = "$" + maxVal.value;
  }
  

function setMinInput() {
let minPrice = parseInt(priceInputMin.value);
if (minPrice < sliderMinValue) {
    priceInputMin.value = sliderMinValue;
    
}

minVal.value = priceInputMin.value;
slideMin();
}

function setMaxInput() {
let maxPrice = parseInt(priceInputMax.value);
if (maxPrice > sliderMaxValue) {
    priceInputMax.value = sliderMaxValue;
    
}

maxVal.value = priceInputMax.value;

slideMax();
}








