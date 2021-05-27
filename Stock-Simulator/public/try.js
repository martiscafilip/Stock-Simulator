let menuBtn = document.getElementsByClassName("menu-button")[0];
let iconBt = document.getElementsByClassName("user_avatar")[0];
let navSlide = document.getElementsByClassName("menu-nav")[0];
let coinBtn = document.getElementsByClassName("change-coin")[0];

let counterPressButton = 0;
let counterCoinBtn = 1;

menuBtn.addEventListener("click", onClick);
coinBtn.addEventListener("click", onclickCoin);
iconBt.addEventListener("click", onClickAvatar);

function hope(event) {
    socket.send(JSON.stringify({ type: "subscribe-news", symbol: "AAPL" }));
    console.log("Message from server ", event.data);
}

function onClick() {
    if (counterPressButton >= 1) {
        counterPressButton = 0;
        navSlide.classList.remove("is--open");
        document.body.removeEventListener("click", onClickBody);
        return;
    }
    document.body.addEventListener("click", onClickBody);
    navSlide.classList.add("is--open");
    counterPressButton += 1;
    console.log(counterPressButton);
}

function onclickCoin() {
    if (counterCoinBtn >= 1) {
        counterCoinBtn = 0;
        console.log(counterCoinBtn);

        document.getElementsByClassName("coin")[0].innerHTML = "$";
        replace("changeCurrencyToUSD");
        console.log("apellllll");

        return;
    }
    document.getElementsByClassName("coin")[0].innerHTML = "€";
    replace("changeCurrencyToEUR");
    counterCoinBtn += 1;
    console.log(counterCoinBtn);
}

function replace(name) {
    var xhr = new XMLHttpRequest();
    xhr.open(
        "POST",
        "http://localhost:3000/app/controllers/updateCurrency.php",
        true
    );
    xhr.onload = function() {
        var jsonResponse = JSON.parse(this.responseText);
        console.log("result", jsonResponse["result"]);
        var calcul = document.getElementsByName("balance")[0].textContent * jsonResponse["result"];
        console.log(calcul);
        var roundedString = calcul.toFixed(3);
        var rounded = Number(roundedString);
        document.getElementsByName("balance")[0].innerHTML = rounded;
    };

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("functionname=" + name);
}

function ChangeValueCurrency(elem) {
    console.log(elem);
}

function onClickBody(e) {
    console.log(e);
    if (navSlide.contains(e.target) || menuBtn.contains(e.target)) {
        return;
    }

    navSlide.classList.remove("is--open");
    counterPressButton = 0;
    document.body.removeEventListener("click", onClickBody);
}

function onClickAvatar() {
    openAvatar();
    document.body.addEventListener("click", onClickBody);
    console.log("deschis");
}

function openAvatar() {
    document.getElementById("mySection").style.display = "block";
    console.log("adaugat");
}

function openForm() {
    document.getElementById("myForm").style.display = "block";
    console.log("adaugat");
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}