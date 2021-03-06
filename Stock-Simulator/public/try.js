let menuBtn = document.getElementsByClassName("menu-button")[0];
let iconBt = document.getElementsByClassName("user_avatar")[0];
let navSlide = document.getElementsByClassName("menu-nav")[0];
let coinBtn = document.getElementsByClassName("change-coin")[0];
let changeAvatarPanel = document.getElementsByClassName("user_avatar_icon")[0];

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
        document.getElementsByClassName("coin")[0].innerHTML = "€";
        replace("changeCurrencyToEUR");
        replaceSessionCurrency("EUR");


        return;
    }
    document.getElementsByClassName("coin")[0].innerHTML = "$";
    replace("changeCurrencyToUSD");
    replaceSessionCurrency("USD");
    counterCoinBtn += 1;
    console.log(counterCoinBtn);
}

function replace(name) {
    fetch("https://stock-simulator-hodler.herokuapp.com/app/controllers/updateCurrency.php", {
            // Adding method type
            method: "POST",

            // Adding body or contents to send
            body: JSON.stringify({
                functionname: name
            }),

            // Adding headers to the request
            headers: new Headers({
                "Content-Type": "application/json", // sent request
                "Accept": "application/json",
            }),
        })
        // Converting to JSON
        .then((response) => response.json())

    // Displaying results to console
    .then((json) => {
        console.log(json);
        var jsonResponse = json

        var calcul = document.getElementById("balance").textContent * jsonResponse["result"];
        var roundedString = calcul.toFixed(3);
        var rounded = Number(roundedString);

        var calculprofit = document.getElementById("profit").textContent * jsonResponse["result"];
        var roundedString = calculprofit.toFixed(3);
        var roundedprofit = Number(roundedString);

        var calculcashavbl = document.getElementById("cashavbl").innerHTML * jsonResponse["result"];
        var roundedString = calculcashavbl.toFixed(3);
        var roundedcashavbl = Number(roundedString);


        document.getElementById("profit").innerHTML = roundedprofit;
        document.getElementById("balance").innerHTML = rounded;
        document.getElementById("cashavbl").innerHTML = roundedcashavbl;

    });
}

function replaceSessionCurrency(currentCurrency) {


    // fetch("http://localhost/app/controllers/updateCurrency.php", {
    fetch("https://stock-simulator-hodler.herokuapp.com/app/controllers/updateCurrency.php", {

        // Adding method type
        method: "POST",

        // Adding body or contents to send
        body: JSON.stringify({
            functionname: currentCurrency
        }),

        // Adding headers to the request
        headers: new Headers({
            "Content-Type": "application/json", // sent request
            "Accept": "application/json"

        }),
    })

    // Converting to JSON
    .then(response => response.json())

    // Displaying results to console
    .then(json => console.log(json));

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

function onClickBodyAvatar(e) {
    if (
      changeAvatarPanel.contains(e.target) ||
      iconBt.contains(e.target) ||
      previousBtn.contains(e.target) ||
      okBtn.contains(e.target) ||
      nextBtn.contains(e.target)
    ) {
      return;
    }
    document.getElementById("mySection").style.display = "none";
    document.getElementById("avatarbackground").style.display = "none";
    document.body.removeEventListener("click", onClickBodyAvatar);
  }

function onClickAvatar() {
    openAvatar();
    document.body.addEventListener("click", onClickBodyAvatar);
    console.log("deschis");
}

function openAvatar() {
    document.getElementById("mySection").style.display = "block";
    document.getElementById("avatarbackground").style.display = "block";

    console.log("adaugat");
}

function openForm() {
    document.getElementById("myForm").style.display = "block";
    console.log("adaugat");
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}