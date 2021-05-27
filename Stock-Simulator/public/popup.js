const open = document.querySelectorAll('[data-popup-target]')
const overlay = document.getElementById('overlay')

open.forEach(button => {
    button.addEventListener('click', () => {
        const popup = document.querySelector(button.dataset.popupTarget)
        openPopUp(popup)
    })
})

overlay.addEventListener('click', () => {
    const popups = document.querySelectorAll('.popup.active')
    popups.forEach(popup => {
        closePopUp(popup)
    })
})

function openPopUp(popup) {
    if (popup == null) return
    popup.classList.add('active')
    overlay.classList.add('active')
}

function closePopUp(popup) {
    if (popup == null) return
    popup.classList.remove('active')
    overlay.classList.remove('active')
}