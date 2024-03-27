/*================================================================ Quantity Stepper =============================================*/

const nums = document.querySelectorAll(".num");
const plusBtns = document.querySelectorAll(".plus");
const minusBtns = document.querySelectorAll(".minus");
const inputs = document.querySelectorAll("input[type='number']");

// Iterate over each element with the class "num"
nums.forEach((num, index) => {
    // Get the corresponding plus and minus buttons and input field
    const plus = plusBtns[index];
    const minus = minusBtns[index];
    const input = inputs[index];

    // Initial value
    let a = parseInt(num.innerText);
    const maxQty = parseInt(input.dataset.max);

    // Add click event listener for the plus button
    plus.addEventListener("click", () => {
        if (a < maxQty) {
            a++;
            a = (a < 10) ? "0" + a : a;
            num.innerText = a;
            input.value = a;
        }
    });

    // Add click event listener for the minus button
    minus.addEventListener("click", () => {
        if (a > 1) {
            a--;
            a = (a < 10) ? "0" + a : a;
            num.innerText = a;
            input.value = a;
        }
    });
});

/*================================================================ Button Function =============================================*/

document.getElementById("proccedToCheckoutBtn").addEventListener("click", function() {
    // Redirect to the checkout page
    window.location.href = "Checkout_page/checkout-page.php";
});

/*================================================================ Update Quantity In The DB From Cart Page =============================================*/

$(document).on('click','.updateQty', function () {

    var qty = $(this).closest('.product_data').find('.input-qty').val();
    var prod_id = $(this).closest('.product_data').find('.prodId').val();


    $.ajax({
        method: "POST",
        url: "functions/handleCart.php",
        data: 
        {
            "prod_id" : prod_id,
            "prod_qty" : qty,
            "scope" : "update"

        },
        
        success: function (response) {
            //alert(response);
        }
    });
    
    
});

/*================================================================ Remove Product From Cart =============================================*/

$(document).on('click','.deleteItem', function () { 
    var cart_id = this.getAttribute('data-value');
    //alert(cart_id);

    $.ajax({
        method: "POST",
        url: "functions/handleCart.php",
        data: 
        {
            "cart_id" : cart_id,
            "scope" : "delete"

        },
        
        success: function (response) {
            if (response == 200)
            {
                
                $('#messageContent').text("Product Deleted Successfully !");
                $('#messageContainer').slideDown().delay(3000).fadeOut();
                $('#cart').load(location.href + " #cart");
                $('#total-price').load(location.href + " #total-price");
                $('#cart-total').load(location.href + " #cart-total");
            }
    
            else
            {
            
                $('#messageContent').text(response);
                $('#messageContainer').slideDown().delay(3000).fadeOut();
            
            
            }
    
        }
    });

    
});




