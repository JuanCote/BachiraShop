const categories = document.getElementById('categories')
const categoriesBlock = document.getElementById('categories-block')
const cart_icon = document.getElementById('cart')
const cart_block = document.getElementById('cart_block')
const total_price = document.getElementById('total_price')
const cart_menu = document.getElementById('cart_menu')
const cartCount = document.getElementById('cart_count')
const profileIcon = document.getElementById('profile_icon')
const profileMenu = document.getElementById('profile_menu')

let hideTimeoutCat
let hideTimeoutCart
let hideTimeoutProfile

window.addEventListener('load', loadProductsToCart);
window.addEventListener('pageshow', (event) => {
    if (event.persisted) {
        loadProductsToCart();
    }
});

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
        updateTotalPrice()
    },

    addCount(productId) {
        this.items.forEach(element => {
            if (element.id === productId){
                element.count += 1
            }
        });
        this.saveToLocalStorage();
        updateTotalPrice()
    },

    subtractCount(productId) {
        let flag = false
        this.items.forEach(element => {
            if (element.id === productId){
                if (parseInt(element.count) === 1){
                    flag = true
                }else{
                    element.count -= 1
                }
            }
        });
        if (flag){
            return false
        }
        this.saveToLocalStorage();
        updateTotalPrice()
        return true
    },

    removeItemById(productId) {
        const index = this.items.findIndex(item => item.id === productId);

        if (index !== -1) {
            this.items.splice(index, 1);
            this.saveToLocalStorage();
            updateTotalPrice();
        }
    },

    saveToLocalStorage() {
      localStorage.setItem('cart', JSON.stringify(this.items));
    },

    loadFromLocalStorage() {
      const storedCart = localStorage.getItem('cart');
      this.items = storedCart ? JSON.parse(storedCart) : [];
      updateTotalPrice()
    },
    getTotalPrice() {
        this.totalPrice = 0
        this.items.forEach(element => {
            this.totalPrice += parseFloat(element.price)*parseInt(element.count)
          });
        this.totalPrice = parseFloat(this.totalPrice).toFixed(2)
        return this.totalPrice
    }
  };

function updateTotalPrice() {
    const totalPrice = cart.getTotalPrice()
    total_price.innerText = totalPrice + " USD"
    cartCount.innerText = cart.items.length
}

function addProductToCart(product) {
    const cartItem = document.createElement('div');

    const imageUrl = window.location.origin + '/' + product.imageUrl

    cartItem.innerHTML = `
        <div class="flex">
            <div class="h-[160px] flex-[0_0_33.3333%]">
                <a href="/product/${product.id}"><img src="${imageUrl}" class="h-full w-full object-contain" alt="${product.name}"></a>
            </div>
            <div class="px-4 flex-auto flex flex-col py-2">
                <a href="/product/${product.id}"><div class="font-bold">${product.name}</div></a>
                <div id="count_${product.id}" class="font-medium">Count: ${product.count}</div>
                <div class="self-end mt-auto font-medium">${product.price} USD</div>
            </div>
        </div>
    `;
    cart_block.appendChild(cartItem);
}

function loadProductsToCart() {
    cart_block.innerHTML = ''
    cart.loadFromLocalStorage()
    const productsInCart = cart.items
    productsInCart.forEach(product => {
        addProductToCart(product);
    });
}

cart_icon.addEventListener('mouseenter', () => {
    if (window.location.pathname !== '/cart' && cart.items.length){
        clearTimeout(hideTimeoutCart);
        cart_icon.classList.add('rotate-45')
        cart_menu.classList.add('z-20')
        cart_menu.classList.add('opacity-100')
        cart_menu.classList.remove('translate-x-[10rem]');
    }
})

cart_icon.addEventListener('mouseleave', () => {
    hideTimeoutCart = setTimeout(() => {
        cart_icon.classList.remove('rotate-45')
        cart_menu.classList.remove('z-20')
        cart_menu.classList.add('translate-x-[10rem]');
        cart_menu.classList.remove('opacity-100')
    }, 200)
})

cart_menu.addEventListener('mouseenter', () => {
    clearTimeout(hideTimeoutCart)
})

cart_menu.addEventListener('mouseleave', () => {
    hideTimeoutCart = setTimeout(() => {
        cart_icon.classList.remove('rotate-45')
        cart_menu.classList.remove('z-20')
        cart_menu.classList.add('translate-x-[10rem]');
        cart_menu.classList.remove('opacity-100')
    }, 50)
})
export default cart

if (profileIcon && profileMenu) {
    profileIcon.addEventListener('mouseenter', () => {
        clearTimeout(hideTimeoutProfile);
        profileMenu.classList.remove('translate-x-[10rem]')
        profileMenu.classList.add('z-30')
        profileMenu.classList.add('opacity-100')
    })

    profileIcon.addEventListener('mouseleave', () => {
        hideTimeoutProfile = setTimeout(() => {
            profileMenu.classList.add('translate-x-[10rem]')
            profileMenu.classList.remove('z-30')
            profileMenu.classList.remove('opacity-100')
        }, 200)
    })
    profileMenu.addEventListener('mouseenter', () => {
        clearTimeout(hideTimeoutProfile)
    })

    profileMenu.addEventListener('mouseleave', () => {
        hideTimeoutProfile = setTimeout(() => {
            profileMenu.classList.add('translate-x-[10rem]')
            profileMenu.classList.remove('z-30')
            profileMenu.classList.remove('opacity-100')
        }, 50)
    })
}

document.addEventListener('DOMContentLoaded', () => {
    const notification = document.getElementById('notification');
    if (notification) {
        notification.classList.add('opacity-100');
        setTimeout(() => {
            notification.classList.remove('opacity-100');
        }, 2000)
    }
});
