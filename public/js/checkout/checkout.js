import cart from '../header/header.js'

const totalPriceDiv = document.getElementById('total-cost')
const totalPurchase = document.getElementById('total-purchase')
const totalPurchase2 = document.getElementById('total-purchase-2')
const totalProducts = document.getElementById('product_count')
const delivery = document.getElementById('delivery')
const orderContainer = document.getElementById('order_container')
const downProductsIcon = document.getElementById('down_products')
const productsDataField = document.getElementById('productsData')

function updateTotalPrice() {
    const totalPrice = cart.getTotalPrice()
    totalPriceDiv.innerText = totalPrice + " USD"
    let deliveryPrice = 0
    if (totalPrice > 500) {
        delivery.innerText = '0 USD'
    }else{
        deliveryPrice = 20
        delivery.innerText = 'From ' + deliveryPrice + ' USD'
    }
    totalPurchase.innerText = (parseFloat(totalPrice) + parseInt(deliveryPrice)).toFixed(2) + ' USD'
    totalPurchase2.innerText = (parseFloat(totalPrice) + parseInt(deliveryPrice)).toFixed(2) + ' USD'
}


function loadProductsToOrder() {
    cart.loadFromLocalStorage()
    const productsInCart = cart.items
    updateTotalPrice()
    if (productsInCart.length){
        productsInCart.forEach(product => {
            const cartItem = document.createElement('div')
            const imageUrl = window.location.origin + '/' + product.imageUrl
            cartItem.innerHTML = `
                <div id="${product.id}" class="flex mt-[2rem] pr-[1rem]">
                    <div class="h-[5rem] w-[5rem]">
                        <a href="/product/${product.id}"><img class="object-contain h-full w-full" src="${imageUrl}"></a>
                    </div>
                    <div class="flex flex-col ml-6">
                        <div>
                            <a href="/product/${product.id}"><h2 class="font-medium max-w-[288px] text-md">${product.name}</h2></a>
                            <p class="mt-2">Count: ${product.count}</p>
                            <p class="mt-2 text-right">${product.price} USD</p>
                        </div>
                    </div>
                </div>
            `
            orderContainer.appendChild(cartItem)
        });
    }else{
        window.location.href = "/cart"
    }
    totalProducts.innerText = cart.items.length + ' products'

}

let downProductIconState = true
downProductsIcon.addEventListener('click', () => {
    if (downProductIconState) {
        downProductsIcon.classList.add('-rotate-180')
        orderContainer.classList.add('hidden')
        downProductIconState = false
    }else{
        downProductsIcon.classList.remove('-rotate-180')
        downProductIconState = true
        orderContainer.classList.remove('hidden')
    }
})


window.addEventListener('load', loadProductsToOrder);

const form = document.getElementById('form')

const phoneInput = document.getElementById('phone-input');
const phoneCheck = document.getElementById('phone-error-check')
const phoneError = document.getElementById('phone-error')

const firstname = document.getElementById('firstname')
const firstnameCheck = document.getElementById('firstname-error-check')
const firstnameError = document.getElementById('firstname-error')

const surname = document.getElementById('surname')
const surnameCheck = document.getElementById('surname-error-check')
const surnameError = document.getElementById('surname-error')

const street = document.getElementById('street')
const streetCheck = document.getElementById('street-error-check')
const streetError = document.getElementById('street-error')

const house = document.getElementById('house')
const houseCheck = document.getElementById('house-error-check')
const houseError = document.getElementById('house-error')

const postal = document.getElementById('postal')
const postalCheck = document.getElementById('postal-error-check')
const postalError = document.getElementById('postal-error')

const city = document.getElementById('city')
const cityCheck = document.getElementById('city-error-check')
const cityError = document.getElementById('city-error')

phoneInput.value = '+38 ';

phoneInput.addEventListener('input', function () {
    let value = phoneInput.value.replace(/\D/g, '');
    let formattedValue = formatPhoneNumber(value);
    phoneInput.value = formattedValue;
  });

  phoneInput.addEventListener('keydown', function (event) {
      if (event.key === 'Backspace' && phoneInput.value === '+38') {
        event.preventDefault();
      }
    });

  phoneInput.addEventListener('blur', function () {
      let phone = phoneInput.value;
      if (phone.length == 19) {
        phoneCheck.classList.remove('hidden')
        phoneError.classList.add('hidden')
      } else {
        phoneCheck.classList.add('hidden')
        phoneError.classList.remove('hidden')
      }
    });

  function formatPhoneNumber(value) {
      let formattedValue = '';
      if (value.length >= 1) {
        formattedValue = '+' + value.substring(0, 2);
      }
      if (value.length < 2) {
          formattedValue += '+38'
        }
      if (value.length >= 3) {
        formattedValue += ' (' + value.substring(2, 5);
      }
      if (value.length >= 6) {
        formattedValue += ') ' + value.substring(5, 8);
      }
      if (value.length >= 9) {
        formattedValue += '-' + value.substring(8, 10);
      }
      if (value.length >= 11) {
        formattedValue += '-' + value.substring(10, 12);
      }
      return formattedValue;
    }

firstname.addEventListener('blur', () => {
    const error = checkFirstname(firstname.value)
    if (error){
        firstnameError.innerText = error
        firstnameError.classList.remove('hidden')
        firstnameCheck.classList.add('hidden')
    }else {
        firstnameCheck.classList.remove('hidden')
        firstnameError.classList.add('hidden')
    }
})

surname.addEventListener('blur', () => {
    const error = checkFirstname(surname.value)
    if (error){
        surnameError.innerText = error
        surnameError.classList.remove('hidden')
        surnameCheck.classList.add('hidden')
    }else {
        surnameCheck.classList.remove('hidden')
        surnameError.classList.add('hidden')
    }
})

street.addEventListener('blur', () => {
    if (street.value) {
        streetCheck.classList.remove('hidden')
        streetError.classList.add('hidden')
    }else{
        streetCheck.classList.add('hidden')
        streetError.classList.remove('hidden')
    }
})

house.addEventListener('blur', () => {
    if (house.value) {
        houseCheck.classList.remove('hidden')
        houseError.classList.add('hidden')
    }else{
        houseCheck.classList.add('hidden')
        houseError.classList.remove('hidden')
    }
})

postal.addEventListener('blur', () => {
    const error = checkPostalCode(postal.value)
    if (error){
        postalError.innerText = error
        postalError.classList.remove('hidden')
        postalCheck.classList.add('hidden')
    }else {
        postalCheck.classList.remove('hidden')
        postalError.classList.add('hidden')
    }
})

city.addEventListener('blur', () => {
    if (city.value) {
        cityCheck.classList.remove('hidden')
        cityError.classList.add('hidden')
    }else{
        cityCheck.classList.add('hidden')
        cityError.classList.remove('hidden')
    }
})

function checkFirstname(firstname) {
    const nameRegex = /^[a-zA-Z]+$/;

    if (!firstname) {
        return 'This is a required field';
    }

    if (firstname.length < 3) {
        return 'Minimum 3 characters';
    }

    if (!nameRegex.test(firstname)) {
        return 'Incorrect firstname';
    }

    return '';
}

function checkSurname(surname) {
    const nameRegex = /^[a-zA-Z]+$/;

    if (!surname) {
        return 'This is a required field';
    }

    if (surname.length < 3) {
        return 'Minimum 3 characters';
    }

    if (!nameRegex.test(surname)) {
        return 'Incorrect surname';
    }

    return '';
}

function checkPostalCode(postalCode) {
    const postalCodeRegex = /^\d+$/;

    if (postalCode.length < 5) {
        return 'Minimum 5 characters';
    }

    if (postalCode.length > 5) {
        return 'Maximum 5 characters';
    }

    if (!postalCodeRegex.test(postalCode)) {
        return 'Please enter only valid characters';
    }

    return '';
}
form.addEventListener('submit', function(event) {
    const firstnameValue = firstname.value
    const surnameValue = surname.value
    const streetValue = street.value
    const houseValue = house.value
    const postalValue = postal.value
    const cityValue = city.value
    const phoneValue = phoneInput.value

    let flag = true

    const checkFirstnameResult = checkFirstname(firstnameValue)
    if (checkFirstnameResult){
        firstnameError.innerText = checkFirstnameResult
        firstnameError.classList.remove('hidden')
        flag = false
    }

    const checkSurnameResult = checkSurname(surnameValue)
    if (checkSurnameResult){
        surnameError.innerText = checkSurnameResult
        surnameError.classList.remove('hidden')
        flag = false
    }

    if (!streetValue){
        streetError.classList.remove('hidden')
        flag = false
    }

    if (!houseValue){
        houseError.classList.remove('hidden')
        flag = false
    }

    const checkPostalCodeResult = checkPostalCode(postalValue)
    if (checkPostalCodeResult){
        postalError.innerText = checkPostalCodeResult
        postalError.classList.remove('hidden')
        flag = false
    }

    if (!cityValue){
        cityError.classList.remove('hidden')
        flag = false
    }

    if (phoneValue.length !== 19){
        phoneError.classList.remove('hidden')
        flag = false
    }

    const products = cart.items
    productsDataField.value = JSON.stringify(products)

    cart.items = []
    cart.saveToLocalStorage()
    if (!flag){
        event.preventDefault()
    }
});
