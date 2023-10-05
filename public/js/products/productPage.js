import cart from '../header/header.js'


const addToCartButton = document.getElementById('add_to_cart_button')
const popup = document.getElementById('popup')
const cross = document.getElementById('cross')
const closePopup = document.getElementById('closePopup')

addToCartButton.addEventListener('click', () => {
    const item = {
        'id': addToCartButton.dataset.id,
        'name': addToCartButton.dataset.name,
        'imageUrl': addToCartButton.dataset.image_url,
        'price': addToCartButton.dataset.price,
        'count': 1
    }
    cart.addItem(item)
    popup.classList.remove('hidden')
})

cross.addEventListener('click', () => {
    popup.classList.add('hidden')
})

closePopup.addEventListener('click', () => {
    popup.classList.add('hidden')
})

popup.addEventListener('click', (event) => {
    if (event.target == popup) {
        popup.classList.add('hidden')
    }
})
