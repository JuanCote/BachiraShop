import cart from '../header/header.js'


const addToCartButton = document.getElementById('add_to_cart_button')

addToCartButton.addEventListener('click', () => {
    const item = {
        'id': addToCartButton.dataset.id,
        'name': addToCartButton.dataset.name,
        'imageUrl': addToCartButton.dataset.image_url,
        'price': addToCartButton.dataset.price,
        'count': 1
    }
    cart.addItem(item)
})
