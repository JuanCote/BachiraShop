const categories = document.getElementById('categories')
const categoriesBlock = document.getElementById('categories-block')
const cart_icon = document.getElementById('cart')
const cart_block = document.getElementById('cart_block')
const total_price = document.getElementById('total_price')
const cart_menu = document.getElementById('cart_menu')

let hideTimeoutCat
let hideTimeoutCart

categories.addEventListener('mouseenter', () => {
    clearTimeout(hideTimeoutCat);
    categoriesBlock.classList.add('max-h-[200px]')
    categoriesBlock.classList.add('py-6')
});

categoriesBlock.addEventListener('mouseleave', () => {
    hideTimeoutCat = setTimeout(() => {
        categoriesBlock.classList.add('max-h-0')
        categoriesBlock.classList.remove('max-h-[200px]')
        categoriesBlock.classList.remove('py-6')
    }, 200);
});

categories.addEventListener('mouseout', () => {
    hideTimeoutCat = setTimeout(() => {
        categoriesBlock.classList.add('max-h-0')
        categoriesBlock.classList.remove('max-h-[200px]')
        categoriesBlock.classList.remove('py-6')
    }, 500);
});

categoriesBlock.addEventListener('mouseenter', () => {
    clearTimeout(hideTimeoutCat)
});

const cart = {
    items: [],
    totalPrice: 0,

    addItem(item) {
        if (this.items.find(x => x.id == item.id)){
            this.items.forEach(element => {
                if (element.id === item.id){
                    element.count += 1
                    const element_count = document.getElementById('count_' + element.id)
                    element_count.innerText = 'Count: ' + element.count
                }
            });
        }else{
            this.items.push(item);
            addProductToCart(item)
        }
        this.saveToLocalStorage();
        this.updateTotalPrice()
    },

    removeItem(index) {
      this.items.splice(index, 1);
      this.saveToLocalStorage();
      this.updateTotalPrice()
    },

    saveToLocalStorage() {
      localStorage.setItem('cart', JSON.stringify(this.items));
    },

    loadFromLocalStorage() {
      const storedCart = localStorage.getItem('cart');
      this.items = storedCart ? JSON.parse(storedCart) : [];
      this.updateTotalPrice()
    },
    updateTotalPrice() {
        this.totalPrice = 0
        this.items.forEach(element => {
            this.totalPrice += parseFloat(element.price)*parseInt(element.count)
          });
        this.totalPrice = parseFloat(this.totalPrice).toFixed(2)
        total_price.innerText = this.totalPrice + " USD"
    }
  };
function addProductToCart(product) {
    const cartItem = document.createElement('div');
    // cartItem.classList.add('');

    const imageUrl = window.location.origin + '/' + product.imageUrl

    cartItem.innerHTML = `
        <div class="flex">
            <div class="h-[160px] flex-[0_0_33.3333%]">
                <img src="${imageUrl}" class="h-full w-full object-contain" alt="${product.name}">
            </div>
            <div class="px-4 flex-auto flex flex-col py-2">
                <div class="font-bold">${product.name}</div>
                <div id="count_${product.id}" class="font-medium">Count: ${product.count}</div>
                <div class="self-end mt-auto font-medium">${product.price} USD</div>
            </div>
        </div>
    `;

    cart_block.appendChild(cartItem);
}

function loadProductsToCart() {
    cart.loadFromLocalStorage()
    const productsInCart = cart.items
    productsInCart.forEach(product => {

        addProductToCart(product);
    });
}

window.addEventListener('load', loadProductsToCart);

cart_icon.addEventListener('mouseenter', () => {
    clearTimeout(hideTimeoutCart);
    cart_menu.classList.add('max-h-full')
})

cart_icon.addEventListener('mouseleave', () => {
    hideTimeoutCart = setTimeout(() => {
        cart_menu.classList.remove('max-h-full')
    }, 200)
})

cart_menu.addEventListener('mouseenter', () => {
    clearTimeout(hideTimeoutCart)
})

cart_menu.addEventListener('mouseleave', () => {
    hideTimeoutCart = setTimeout(() => {
        cart_menu.classList.remove('max-h-full')
    }, 300)
})
export default cart
