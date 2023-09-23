const sortButton = document.getElementById('sort_button')
const sortPanel = document.getElementById('sort_panel')
const sortDesc = document.getElementById('desc')
const sortAsc = document.getElementById('asc')
const currentURL = window.location.href;


let sortState = false
sortButton.addEventListener('click', () => {
    if (sortState) {
        sortPanel.classList.add('max-h-0')
        sortPanel.classList.remove('pt-2')
        sortPanel.classList.remove('max-h-[200px]')
        sortState = false
    }else {
        sortPanel.classList.add('max-h-[200px]')
        sortPanel.classList.add('pt-2')
        sortState = true
    }
})

document.addEventListener('click', (event) => {
    if (!sortPanel.contains(event.target) && !sortButton.contains(event.target)) {
        sortPanel.classList.add('max-h-0')
        sortPanel.classList.remove('pt-2')
        sortPanel.classList.remove('max-h-[200px]')
        sortState = false
    }
  });

sortDesc.addEventListener('click', () => {
    const currentURL = window.location.href;
  let newURL;

  if (currentURL.includes('order')) {
    newURL = currentURL.replace('order=asc', 'order=desc');
  } else {
    const separator = currentURL.includes('?') ? '&' : '?';
    newURL = `${currentURL}${separator}order=desc`;
  }

  window.location.href = newURL;
})

sortAsc.addEventListener('click', () => {
    const currentURL = window.location.href;
    let newURL;

    if (currentURL.includes('order')) {
        newURL = currentURL.replace('order=desc', 'order=asc');
    } else {
        const separator = currentURL.includes('?') ? '&' : '?';
        newURL = `${currentURL}${separator}order=asc`;
    }

    window.location.href = newURL;
})

