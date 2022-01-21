(function () {
    const cartInfo = document.getElementById("cart-info");
    const cart = document.getElementById("cart");
    cartInfo.addEventListener("click", function () {
        cart.classList.toggle("show-cart");
    });
})();

if(document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready();
}

function ready() {
    var addToCartButtons = document.getElementsByClassName("ADD-TO-CART");
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i];
        button.addEventListener("click", addToCartClicked);
    }

    var quantityInputs = document.getElementsByClassName("cart-quantity-input");
    for(var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }

    /*Remove Items first part*/
    var removeCartItemButtons = document.getElementsByClassName("btn-danger");
    for(var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i];
        button.addEventListener("click", removeCartItem);
    }
    /*End*/

    //when click in purchase button
    document
    .getElementsByClassName("btn-purchase")[0]
    .addEventListener("click", purchaseClicked);
}

function purchaseClicked() {
    var getTotal = document.getElementsByClassName("cart-total-price")[0];
    var total = parseInt(getTotal.innerText.replace("Rp ", ""));
    if (total <= 0) {
        alert("You haven't ordered, please order our menu.");
    } else {
        var randomNum = Math.floor(1000 + Math.random() * 9000);
        alert(`Thankyou for your purchase, Your order number is ${randomNum}. Show the cashier your order number to take your order.`);
        var cartItems = document.getElementsByClassName("cart-items")[0];
        while (cartItems.hasChildNodes()) {
            cartItems.removeChild(cartItems.firstChild);
        }
        updateCartTotal();
        updateItemsTotal();
    }
}

/*Remove Items second part*/
function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    updateCartTotal();
    updateItemsTotal();
}
/*End*/

function quantityChanged(event) {
    var input = event.target;
    if(isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updateCartTotal();
    updateItemsTotal();
}

function addToCartClicked(event) {
    var button = event.target;
    var product = button.parentElement.parentElement.parentElement;
    var title = product.getElementsByClassName("product-title")[0].innerText;
    var price = product.getElementsByClassName("product__price")[0].innerText;
    addItemToCart(title, price);
    updateCartTotal();
    updateItemsTotal();
}

function addItemToCart(title, price) {
    var cartRow = document.createElement("div");
    cartRow.classList.add("cart-row");
    var cartItems = document.getElementsByClassName("cart-items")[0];
    var cartItemsTitles = cartItems.getElementsByClassName("cart-item-title");
    for(var i = 0; i < cartItemsTitles.length; i++) {
        if(cartItemsTitles[i].innerText == title) {
            alert("This product is already added to the cart.");
            return;
        }
    }
    var cartRowContents = `
    <div class="cart-item cart-column">
        <span class="cart-item-title">${title}</span>
    </div>
    <span class="cart-price cart-column" id="price">${price}</span>
    <div class="cart-quantity cart-column">
        <input class="cart-quantity-input" type="number" value="1">
        <button class="btn btn-danger" type="button"> Remove </button>
    </div>`;

    cartRow.innerHTML = cartRowContents;
    cartItems.append(cartRow);
    cartRow
    .getElementsByClassName("btn-danger")[0]
    .addEventListener("click", removeCartItem);
    cartRow
    .getElementsByClassName("cart-quantity-input")[0]
    .addEventListener("change", quantityChanged);
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName("cart-items")[0];
    var cartRows = cartItemContainer.getElementsByClassName("cart-row");
    var total = 0;
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i];
        var priceElement = cartRow.getElementsByClassName("cart-price")[0];
        var quantityElement = cartRow.getElementsByClassName("cart-quantity-input")[0];
        var price = parseInt(priceElement.innerText.replace("Rp ", ""));
        var quantity = quantityElement.value;
        total = total + price * quantity;
    }
    document.getElementsByClassName("cart-total-price")[0].innerText = "Rp " + total;
}

function updateItemsTotal() {
    var cartItemContainer = document.getElementsByClassName("cart-items")[0];
    var cartRows = cartItemContainer.getElementsByClassName("cart-row");
    var total = 0;
    for(let i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i];
        var quantityElement = cartRow.getElementsByClassName("cart-quantity-input")[0];
        var quantity = quantityElement.value;
        var total = total + parseInt(quantity);
    }
    document.getElementById("item-count").innerText = total;
}