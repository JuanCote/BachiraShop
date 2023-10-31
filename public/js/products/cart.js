import cart from '../header/header.js'

const cartContainer = document.getElementById('cart_container')
const totalPriceDiv = document.getElementById('total-cost')
const delivery = document.getElementById('delivery')
const totalPurchase = document.getElementById('total-purchase')
const totalProducts = document.getElementById('product_count')
const proceedButton = document.getElementById('proceedButton')
const proceedButtonA = document.getElementById('proceedButton-a')

function removeItem(productId) {
    cart.removeItemById(productId)
    const divToRemove = document.getElementById(productId);
    if (divToRemove) {
        divToRemove.remove();
    } else {
        console.log('Div not found');
    }
    updateTotalPrice()
    if (!cart.items.length){
        addEmptyText()
    }
    totalProducts.innerText = cart.items.length + ' products'
}

function subtractCount(productId) {
    const countNumber = document.getElementById('count-' + productId)
    const result = cart.subtractCount(productId)
    if (result){
        countNumber.innerText = parseInt(countNumber.innerText) - 1
        updateTotalPrice()
    }
}

function addCount(productId) {
    cart.addCount(productId)
    const countNumber = document.getElementById('count-' + productId)
    countNumber.innerText = parseInt(countNumber.innerText) + 1
    updateTotalPrice()
}

cartContainer.addEventListener('click', (event) => {
    const target = event.target;

    if (target.id === 'remove_button') {
        removeItem(target.dataset.id)
    }else if (target.id === 'minus_count'){
        subtractCount(target.dataset.id)
    }else if (target.id === 'plus_count'){
        addCount(target.dataset.id)
    }
});

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
}

function loadProductsToCart() {
    cart.loadFromLocalStorage()
    const productsInCart = cart.items
    updateTotalPrice()
    if (productsInCart.length){
        productsInCart.forEach(product => {
            const cartItem = document.createElement('div')
            const imageUrl = window.location.origin + '/' + product.imageUrl
            cartItem.innerHTML = `
                <div id="${product.id}" class="flex mt-[2rem] pr-[1rem]">
                    <div class="w-[20%] h-[15rem]">
                        <a href="/product/${product.id}"><img class="object-contain h-full w-full" src="${imageUrl}"></a>
                    </div>
                    <div class="flex flex-col ml-6">
                        <div>
                            <a href="/product/${product.id}"><h2 class="font-medium w-[30rem] text-lg">${product.name}</h2></a>
                            <p class="mt-3">${product.price} USD</p>
                        </div>
                        <div class="flex mt-auto items-center">
                            <button data-id="${product.id}" id="minus_count" class="rounded-full w-[2rem] flex items-center justify-center pb-3 h-[2rem] text-5xl bg-[#f1f2f4]">-</button>
                            <p id="count-${product.id}" class="ml-5 mr-5">${product.count}</p>
                            <button data-id="${product.id}" id="plus_count" class="rounded-full w-[2rem] flex items-center justify-center pb-1 h-[2rem] text-3xl bg-[#f1f2f4]">+</button>
                        </div>
                    </div>
                    <div class="ml-auto">
                        <div data-id="${product.id}" id="remove_button" class="flex gap-1 hover:bg-[#f1f2f4] hover:cursor-pointer px-3 py-2 rounded-xl transition">
                            <div class="">
                                <img data-id="${product.id}" id="remove_button" class="h-[1.1rem]" src="${window.location.origin + '/images/trash.png'}">
                            </div>
                            <p data-id="${product.id}" id="remove_button" class="font-medium text-sm">Remove</p>
                        </div>
                    </div>
                </div>
            `
            cartContainer.appendChild(cartItem)
        });
    }else{
        addEmptyText()
    }
    totalProducts.innerText = cart.items.length + ' products'

}

function addEmptyText(){
    const cartItem = document.createElement('div')
    cartItem.innerHTML = `
        <div class="mt-[3rem]">
                <img class="mx-auto" src="${window.location.origin + '/images/sad-emoji.png'}">
                <p class="font-medium text-xl text-center mt-[1rem]">Oh, your cart is empty!</p>
            </div>
        </div>
    `
    cartContainer.appendChild(cartItem)
    proceedButton.classList.add('bg-[#e5e5e5]')
    proceedButton.classList.add('text-[#b2b2b2]')
    proceedButton.classList.remove('hover:bg-[#e0872d]')
    proceedButtonA.setAttribute('href', "/cart")
}

window.addEventListener('load', loadProductsToCart);
