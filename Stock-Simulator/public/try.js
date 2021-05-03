let menuBtn = document.getElementsByClassName("menu-button")[0];
let navSlide = document.getElementsByClassName("menu-nav")[0];
let coinBtn = document.getElementsByClassName("change-coin")[0];
let counterPressButton = 0;
let counterCoinBtn = 1;


// console.log(navSlide);
// console.log(menuBtn);
// console.log(coinBtn);

const socket = new WebSocket('wss://ws.finnhub.io?token=c244gciad3ifufi6gd3g');

// Connection opened -> Subscribe
socket.addEventListener('open', function(event) {
    socket.send(JSON.stringify({ 'type': 'subscribe', 'symbol': 'AAPL' }))
    socket.send(JSON.stringify({ 'type': 'subscribe', 'symbol': 'BINANCE:BTCUSDT' }))
    socket.send(JSON.stringify({ 'type': 'subscribe', 'symbol': 'IC MARKETS:1' }))
});

// Listen for messages
socket.addEventListener('message', function(event) {
    console.log('Message from server ', event.data);
});

// Unsubscribe
var unsubscribe = function(symbol) {
    socket.send(JSON.stringify({ 'type': 'unsubscribe', 'symbol': symbol }))
}

socket.addEventListener

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