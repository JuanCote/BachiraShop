const cancelLogoutPopul = document.getElementById('cancel-logoutpopul')
const logoutPopup = document.getElementById('logout-popup')
const logoutButton = document.getElementById('logout_button')


logoutButton.addEventListener('click', () => {
    logoutPopup.classList.remove('hidden')
})

cancelLogoutPopul.addEventListener('click', () => {
    logoutPopup.classList.add('hidden')
})

logoutPopup.addEventListener('click', (event) => {
    if (event.target == logoutPopup) {
        logoutPopup.classList.add('hidden')
    }
})

document.addEventListener('DOMContentLoaded', () => {
    const notification = document.getElementById('notification');
    if (notification) {
        notification.classList.add('opacity-100');
        setTimeout(() => {
            notification.classList.remove('opacity-100');
        }, 2000)
    }

  });
