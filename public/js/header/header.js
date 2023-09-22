const categories = document.getElementById('categories')
const categoriesBlock = document.getElementById('categories-block')
let hideTimeout

categories.addEventListener('mouseenter', () => {
    clearTimeout(hideTimeout);
    categoriesBlock.classList.add('max-h-[200px]')
    categoriesBlock.classList.add('py-6')
});

categoriesBlock.addEventListener('mouseleave', () => {
    hideTimeout = setTimeout(() => {
        categoriesBlock.classList.add('max-h-0')
        categoriesBlock.classList.remove('max-h-[200px]')
        categoriesBlock.classList.remove('py-6')
    }, 200);
});

categories.addEventListener('mouseout', () => {
    hideTimeout = setTimeout(() => {
        categoriesBlock.classList.add('max-h-0')
        categoriesBlock.classList.remove('max-h-[200px]')
        categoriesBlock.classList.remove('py-6')
    }, 500);
});

categoriesBlock.addEventListener('mouseenter', () => {
    clearTimeout(hideTimeout)
});
