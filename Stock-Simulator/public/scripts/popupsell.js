const opensell = document.querySelectorAll('[data-popupsell-target]')
const overlaysell = document.getElementById('overlay')

opensell.forEach(button => {
    button.addEventListener('click', () => {
        const popup = document.querySelector(button.dataset.popupsellTarget)
        opensellPopUp(popup)
    })
})

overlaysell.addEventListener('click', () => {
    const popups = document.querySelectorAll('.popupsell.active')
    popups.forEach(popup => {
        closesellPopUp(popup)
    })
})

function opensellPopUp(popup) {
    console.log("test")
    if (popup == null) return
    popup.classList.add('active')
    overlaysell.classList.add('active')
}

function closesellPopUp(popup) {
    if (popup == null) return
    popup.classList.remove('active')
    overlaysell.classList.remove('active')
}