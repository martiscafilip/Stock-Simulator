<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/public/account.css">

</head>
<body>
    
    <header>
        
    <input type="image" class="menu-button" src="/public/profil-pictures/menu-icon.png" alt="Menu button" width="50">
        
        <p class="slogan">
            HODL FOR YOUR LIFE
        </p>
        <img class="logo" src="/public/profil-pictures/logo.png" alt="logo image">
        
        <nav class="menu-nav">
            <a href="/public/leaderBoard/leaderBoard"> Leader Board </a>
            <a href="/public/trade/trade"> Trade</a>
            <a href="/public/changeProfile/changeProfile"> Change Profile</a>
            <a href="/public/home/login"> Log Out</a>

        </nav>
    </header>
    
    <div class="wrapper">
        <div class="wrapper-avatar">
                    <img class="user_avatar" src="/public/profil-pictures/avatar_user.webp" alt="Avatar cont utilizator">
                <p class="username">redtiger704</p>
            </div>
                
        <div class="wrapper-info">
            <div class="info-left">
                <div class="info-box">
                    <img class="user_info_icons" src="/public/profil-pictures/briefcase-icon-windows-60.png" alt="Utilizator-portofoliu imagine">
                    <div class="box-stats">
                        <p class="stats-title">Portofolio value</p>
                        <p class="stats-value">1,000.00</p>
                    </div>
                </div>
                <div class="info-box">
                    <img class="user_info_icons" src="/public/profil-pictures/save-money-icon-71.png" alt="Utilizator-bani disponimili imagine">
                    <div class="box-stats">
                        <p class="stats-title">Cash Available</p>
                        <p class="stats-value">+0%</p>
                    </div>
                </div>
                <div class="info-box">
                    <img class="user_info_icons" src="/public/profil-pictures/ranking-icon-65.png" alt="Utilizator-loc in clasament imagine">
                    <div class="box-stats">
                        <p class="stats-title">Global Rank</p>
                        <p class="stats-value">N/A</p>
                    </div>
                </div>
                <div class="info-box">
                    <img class="user_info_icons" src="/public/profil-pictures/profit-and-loss-icon-68.png" alt="Utilizator-pierderi imagine">
                    <div class="box-stats">
                        <p class="stats-title">Profitable</p>
                        <p class="stats-value">0%</p>
                    </div>
                </div>
            </div>
            <div class="info-right">
                <div class="info-box">
                    <img class="user_info_icons" src="/public/profil-pictures/profit-icon-66.png" alt="Utilizator-performanta imagine">
                    <div class="box-stats">
                        <p class="stats-title">Performance</p>
                        <p class="stats-value">+0%</p>
                    </div>
                </div>
                <div class="info-box">                   
                    <img class="user_info_icons" src="/public/profil-pictures/money-transfer-icon-75.png" alt="Utilizator-comert imagine">
                    <div class="box-stats">
                        <p class="stats-title">Trades</p>
                        <p class="stats-value">N/A</p>
                    </div>
                </div>
                <div class="info-box">                   
                    <img class="user_info_icons" src="/public/profil-pictures/money-back-icon-66.png" alt="Utilizator-actiuni imagine">
                    <div class="box-stats">
                        <p class="stats-title">Battles</p>
                        <p class="stats-value">N/A</p>
                    </div>
                </div>
                <div class="info-box">
                    <img class="user_info_icons" src="/public/profil-pictures/profit-and-loss-icon-68.png" alt="Utilizator-pierderi imagine">
                    <div class="box-stats">
                        <p class="stats-title">Unprofitable</p>
                        <p class="stats-value">0%</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <button class="open-button" onclick="openForm()">feedback</button>

    <div class="chat-popup" id="myForm">
      <div  class="form-user">
        <h1 class="form-title">Give us feedback</h1>
    
        <label for="msg"><b>Message</b></label>
        <textarea placeholder="Type message.." id="msg" required></textarea>
    
        <button type="submit" class="btn">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </div>
    </div>
    
    <script src="/public/try.js"></script>
    
</body>
</html>