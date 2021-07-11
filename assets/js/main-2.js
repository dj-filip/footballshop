
let addToCartBox = document.querySelector('.cart-box');
let closeCartBoxButton = addToCartBox.querySelector('span');
let addToCartButton = document.querySelector('button');

closeCartBoxButton.onclick = function() {
    addToCartBox.classList.remove('active');
}

addToCartButton.onclick = function() {
    addToCartBox.classList.add('active');
}

let cartButton = document.querySelector('.cart-wrap');
let cartIcon = cartButton.querySelector('ion-icon');
let cartBox = document.querySelector('aside');

cartButton.onclick = function() {
    console.log('radi dugme');
    cartBox.classList.toggle('active');
    cartButton.classList.toggle('active');
}

