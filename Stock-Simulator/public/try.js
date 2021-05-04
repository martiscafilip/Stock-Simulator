let menuBtn = document.getElementsByClassName("menu-button")[0];
let navSlide = document.getElementsByClassName("menu-nav")[0];
let coinBtn = document.getElementsByClassName("change-coin")[0];
let counterPressButton = 0;
let counterCoinBtn = 1;


// console.log(navSlide);
// console.log(menuBtn);
// console.log(coinBtn)

menuBtn.addEventListener('click', onClick);
coinBtn.addEventListener('click', onclickCoin);

function onClick() {

    if (counterPressButton >= 1) {
        counterPressButton = 0;
        navSlide.classList.remove('is--open');
        document.body.removeEventListener('click', onClickBody);
        return;
    }
    document.body.addEventListener('click', onClickBody);
    navSlide.classList.add('is--open');
    counterPressButton += 1;
    console.log(counterPressButton);

}

function onclickCoin() {

    if (counterCoinBtn >= 1) {
        counterCoinBtn = 0;
        console.log(counterCoinBtn);

        document.getElementsByClassName("coin")[0].innerHTML = "$";
        return;
    }
    document.getElementsByClassName("coin")[0].innerHTML = "€";
    counterCoinBtn += 1;
    console.log(counterCoinBtn);

}

function onClickBody(e) {
    console.log(e);
    if (
        navSlide.contains(e.target) ||
        menuBtn.contains(e.target)
    ) {
        return;
    }

    navSlide.classList.remove('is--open');
    counterPressButton = 0;
    document.body.removeEventListener('click', onClickBody);
}

function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}