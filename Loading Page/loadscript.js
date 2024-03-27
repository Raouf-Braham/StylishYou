gsap.fromTo(
  ".loading-page",
  { opacity: 1 },
  {
    opacity: 0,
    display: "none",
    duration: 1.5,
    delay: 3.5,
  }
);

gsap.fromTo(
  ".logo-name",
  {
    y: 50,
    opacity: 0,
  },
  {
    y: 0,
    opacity: 1,
    duration: 2,
    delay: 0.5,
  }
);

// Redirect to index.php after the intro animation and other initializations
function redirectToIndex() {
  window.location.href = '../index.php';
}

// Set a timeout to redirect after the intro timeline and other initializations
setTimeout(redirectToIndex, (1.5 + 3.5 + 2 + 0.5) * 1000);
