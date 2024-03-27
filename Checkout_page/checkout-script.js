'use strict';
/*================================================================ Preloader =============================================*/

var loader = document.getElementById("preloader");
window.addEventListener("load", function () {
    loader.style.display = "none";
    document.body.style.overflow = "auto";
    document.getElementById("header").style.display = "flex";
});

function menuToggle() {
    const toggleMenu = document.querySelector(".menu");
    toggleMenu.classList.toggle("active");
}

/*================================================================ Method Select Function =============================================*/

const creditCardBtn = document.getElementById('creditCardBtn');
const paypalBtn = document.getElementById('paypalBtn');

creditCardBtn.addEventListener('click', function() {
    // Change the name attribute of the ion-icon inside the clicked button
    const checkmarkIcon = this.querySelector('ion-icon.checkmark');
    checkmarkIcon.setAttribute('name', 'checkmark-circle');
    
    // Add 'fill' class to the ion-icon inside the clicked button
    checkmarkIcon.classList.add('fill');

    // Remove 'fill' class from the ion-icon inside the other button
    const otherCheckmarkIcon = paypalBtn.querySelector('ion-icon.checkmark');
    otherCheckmarkIcon.classList.remove('fill');
    
    // Change the name attribute of the ion-icon inside the other button
    otherCheckmarkIcon.setAttribute('name', 'checkmark-circle-outline');

    // Remove 'selected' class from all buttons
    document.querySelectorAll('.method').forEach(button => {
        button.classList.remove('selected');
    });

    // Add 'selected' class to the clicked button
    this.classList.add('selected');
});

paypalBtn.addEventListener('click', function() {
    // Change the name attribute of the ion-icon inside the clicked button
    const checkmarkIcon = this.querySelector('ion-icon.checkmark');
    checkmarkIcon.setAttribute('name', 'checkmark-circle');
    
    // Add 'fill' class to the ion-icon inside the clicked button
    checkmarkIcon.classList.add('fill');

    // Remove 'fill' class from the ion-icon inside the other button
    const otherCheckmarkIcon = creditCardBtn.querySelector('ion-icon.checkmark');
    otherCheckmarkIcon.classList.remove('fill');

    // Change the name attribute of the ion-icon inside the other button
    otherCheckmarkIcon.setAttribute('name', 'checkmark-circle-outline');

    // Remove 'selected' class from all buttons
    document.querySelectorAll('.method').forEach(button => {
        button.classList.remove('selected');
    });

    // Add 'selected' class to the clicked button
    this.classList.add('selected');
});

/*================================================================ Product Quantity And Price Update =============================================*/

// All Initial Elements
const payAmountBtn = document.querySelector('#payAmount');
const decrementBtn = document.querySelectorAll('#decrement');
const quantityElem = document.querySelectorAll('#quantity');
const incrementBtn = document.querySelectorAll('#increment');
const priceElem = document.querySelectorAll('#checkout-price');
const subtotalElem = document.querySelector('#checkout-subtotal');
const taxElem = document.querySelector('#tax');
const totalElem = document.querySelector('#checkout-total');

//loop: for add event on multiple 'increment' & 'decrement' button
for (let i = 0; i < incrementBtn.length; i++) {
    
    incrementBtn[i].addEventListener('click', function() {

        let increment = Number(this.previousElementSibling.textContent);

        increment++;

        this.previousElementSibling.textContent = increment;

        totalCalc();
        
    });

    decrementBtn[i].addEventListener('click', function () { 

        let decrement = Number(this.nextElementSibling.textContent);

        decrement = decrement <= 1 ? 1 : --decrement;

        this.nextElementSibling.textContent = decrement;

        totalCalc();
    });
    
}

const totalCalc = function () {

    //declare all initial variables
    const taxRate = 0.05;
    let subtotal = 0;
    let totalTax = 0;
    let total = 0;

    for (let i = 0; i < quantityElem.length; i++) {
        
        subtotal += Number(quantityElem[i].textContent) * Number(priceElem[i].textContent);
        
    }

    subtotalElem.textContent = subtotal.toFixed(2);

    totalTax = subtotal * taxRate;

    taxElem.textContent = totalTax.toFixed(2);

    total = subtotal + totalTax;

    totalElem.textContent = total.toFixed(2);

    payAmountBtn.textContent = total.toFixed(2);
}
