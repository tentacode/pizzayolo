/*!
* Start Bootstrap - Shop Homepage v5.0.6 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
function updatePrice() {
    const pizzas = document.querySelectorAll('.pizza-item');
    let basketPrice = 0;
    pizzas.forEach(pizza => {
        const quantityInput = pizza.querySelector('.pizza-quantity');
        const price = pizza.querySelector('.pizza-price');

        basketPrice += parseInt(quantityInput.value) * parseFloat(price.textContent);
    });

    document.querySelector('#basket-price').textContent = basketPrice.toFixed(2) + ' €';
  }

  document.addEventListener('DOMContentLoaded', () => {
    updatePrice();
  });