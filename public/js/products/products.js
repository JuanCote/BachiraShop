const sortButton = document.getElementById('sort_button')
const sortPanel = document.getElementById('sort_panel')

let sortState = false
sortButton.addEventListener('click', () => {
    if (sortState) {
        sortPanel.classList.add('max-h-0')
        sortPanel.classList.remove('py-2')
        sortPanel.classList.remove('max-h-[200px]')
        sortState = false
    }else {
        sortPanel.classList.add('max-h-[200px]')
        sortPanel.classList.add('py-2')
        sortState = true
    }

})

