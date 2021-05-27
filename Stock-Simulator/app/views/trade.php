<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/tradeStyle.css">
    <link rel="stylesheet" href="/public/buttons.css">
    <link rel="shortcut icon" href="#">

    <title>Trade</title>
</head>

<body>
    <div class="flex">
        <div>
            <header class="header">
                <input class="menu-button" type="image" src="/public/Layer3.png" alt="menu button">

                <nav class="menu-nav">
                    <a href="/public/account/account"> Account </a>
                    <a href="/public/leaderBoard/leaderBoard"> Leaderboard</a>
                    <a href="/public/changeProfile/changeProfile"> Change Profile</a>
                    <a href="/public/logout"> Log Out</a>

                </nav>
            </header>

            <div class="stocksdiv">
                <div class="searchStocks">
                    <img class="searchbutton" src="/public/button.png">
                </div>
                <div class="line">
                </div>
                <div class="listStocks">
                    <img id="NASDAQ:TSLA" class="stocks" name="stockname" src="/public/stock-pictures/tesla.png" alt="tesla logo">
                    <img id="BITSTAMP:BTCUSD" class="stocks" src="/public/stock-pictures/btc.png" alt="btc logo">
                    <img id="BITSTAMP:ETHUSD" class="stocks" src="/public/stock-pictures/eth.png" alt="eth logo">
                    <img id="NASDAQ:AAPL" class="stocks" src="/public/stock-pictures/apple.png" alt="apple logo">
                    <img id="NYSE:SPOT" class="stocks" src="/public/stock-pictures/spotify.png" alt="spotify logo">
                    <img id="BITFINEX:DOGEUSD" class="stocks" src="/public/stock-pictures/dogecoin.png" alt="dogecoin logo">
                    <img id="NASDAQ:MSFT" class="stocks" src="/public/stock-pictures/microsoft.png" alt="microsoft logo">
                    <img id="NYSE:NKE" class="stocks" src="/public/stock-pictures/nike.png" alt="nike logo">
                    <img id="NASDAQ:AMZN" class="stocks" src="/public/stock-pictures/amazon.png" alt="amazon logo">
                    <img id="CAPITALCOM:GOOG" class="stocks" src="/public/stock-pictures/google.png" alt="google logo">
                    <img id="NASDAQ:NFLX" class="stocks" src="/public/stock-pictures/netflix.png" alt="netflix logo">
                    <img id="NASDAQ:ABNB" class="stocks" src="/public/stock-pictures/airbnb.png" alt="airbnb logo">
                    <img id="BINANCE:BNBUSD" class="stocks" src="/public/stock-pictures/bnb.png" alt="bnb logo">
                    <img id="BITTREX:ADAUSD" class="stocks" src="/public/stock-pictures/cardano.png" alt="cardano logo">
                    <img id="NASDAQ:FB" class="stocks" src="/public/stock-pictures/facebook.png" alt="facebook logo">
                    <img id="NYSE:HPQ" class="stocks" src="/public/stock-pictures/hp.png" alt="hp logo">
                    <img id="NASDAQ:SBUX" class="stocks" src="/public/stock-pictures/starbucks.png" alt="starbucks logo">
                    <img id="NYSE:KO" class="stocks" src="/public/stock-pictures/cocacola.png" alt="cocacola logo">
                    <img id="NYSE:BB" class="stocks" src="/public/stock-pictures/blackberry.png" alt="blackberry logo">
                    <img id="NASDAQ:NVDA" class="stocks" src="/public/stock-pictures/nvidia.png" alt="nvidia logo">
                    <img id="NASDAQ:PYPL" class="stocks" src="/public/stock-pictures/paypal.png" alt="paypal logo">
                    <img id="NYSE:PINS" class="stocks" src="/public/stock-pictures/pinterest.png" alt="pinterest logo">
                </div>
            </div>
        </div>

        <div class="tradesection">
            <form action="../../app/controllers/orderPlace.php" method="GET" class="orderForm" id="orderForm">
            <div class="popup" id="popup">
                <div class="popup-head">
                    Cash available :
                </div>

                <div class="popup-body">
                    <div>Amount: </div>
                    <div>
                        <input type="number" class="amount" name="cash">
                    </div>

                </div>
                <button type="submit" name="orderbutton" value="TSLA" id="test">PLACE ORDER</button>
            </form>
            </div>


            <div id="overlay"></div>


            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div id="tradingview_5890d"></div>
                <!-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-TSLA/" rel="noopener" target="_blank"><span class="blue-text">TSLA Chart</span></a> by TradingView</div> -->
                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                <script type="text/javascript">
                    var name = "NASDAQ:TSLA";
                    var test = document.getElementsByClassName("stocks");

                    for (var i = 0; i < test.length; i++) {
                        console.log(test[i].id);
                       
                        test[i].addEventListener("click", clickOn);
                    }
                    var w = window.innerWidth;
                    var h = document.getElementsByClassName("tradesection").clientHeight;

                    function clickOn(e) {
                       document.getElementById("test").value=parseTicker(e.target.id);
                    //    console.log(document.getElementById("orderForm").action); 
                        console.log(e.target.id);
                        name = e.target.id;
                        testt = new TradingView.widget({
                            "width": w,
                            "height": h,
                            "symbol": name,
                            "timezone": "Europe/Athens",
                            "theme": "dark",
                            "style": "1",
                            "locale": "en",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "range": "1D",
                            "hide_side_toolbar": false,
                            "allow_symbol_change": true,
                            "container_id": "tradingview_5890d"
                        });
                    }
                    var testt = new TradingView.widget({
                        "width": w,
                        "height": h,
                        "symbol": name,
                        "timezone": "Europe/Athens",
                        "theme": "dark",
                        "style": "1",
                        "locale": "en",
                        "toolbar_bg": "#f1f3f6",
                        "enable_publishing": false,
                        "range": "1D",
                        "hide_side_toolbar": false,
                        "allow_symbol_change": true,
                        "container_id": "tradingview_5890d"
                    });

                    function parseTicker( ticker)
                    {
                       var splited = ticker.split(":");
                       console.log(splited[1]);
                        return splited[1];
                    }
                </script>
            </div>
            <!-- TradingView Widget END -->
        </div>

        <div class="sellbuy">
            <button data-popup-target="#popup" class="btn buybutton">BUY</button>
            <button class="btn sellbutton">SELL</button>
        </div>

    </div>
    <script src="/public/try.js"></script>
    <script src="/public/popup.js"></script>

    <?php
    


    ?>



</body>

</html>