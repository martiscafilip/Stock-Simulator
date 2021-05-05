<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/tradeStyle.css">
    <link rel="stylesheet" href="/public/buttons.css">

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
                    <a href="/public/home/login"> Log Out</a>
                </nav>
            </header>

            <div class="Stocks">
                <div class="searchStocks">

                    <img class="searchbutton" src="/public/button.png">

                </div>

                <div class="line">

                </div>

                <div class="listStocks">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>

        <div class="tradesection">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div id="tradingview_5890d"></div>
                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-TSLA/" rel="noopener" target="_blank"><span class="blue-text">TSLA Chart</span></a> by TradingView</div>
                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                <script type="text/javascript">
                    new TradingView.widget({
                        "width": 1500,
                        "height": 560,
                        "symbol": "NASDAQ:TSLA",
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
                </script>
            </div>
            <!-- TradingView Widget END -->
        </div>

        <div class="sellbuy">
            <button class="btn buybutton">BUY</button>
            <button class="btn sellbutton">SELL</button>
        </div>

    </div>
    <script src="/public/try.js"></script>



</body>

</html>