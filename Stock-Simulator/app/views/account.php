<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/public/stylesheets/account.css">
    <link rel = "icon" type = "image/png" href = "/public/logo.png">
    <link rel="shortcut icon" href="#">

</head>

<body onload="refreshInfos()">

    <header>

        <input type="image" class="menu-button" src="/public/profil-pictures/menu-icon.png" alt="Menu button" width="60">

        <p class="slogan">
            HODL FOR YOUR LIFE
        </p>
        <img class="logo" src="/public/profil-pictures/logo.png" alt="logo image">

        <nav class="menu-nav">
            <a href="/public/leaderBoard/leaderBoard"> Leader Board </a>
            <a href="/public/trade/trade"> Trade</a>
            <a href="/public/changeProfile/changeProfile"> Change Profile</a>
            <a href="/public/logout"> Log Out</a>

        </nav>
    </header>

    <?php

    require_once '../app/models/ModelAccount.php';



    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        // $_SESSION['Currency']="USD";
    }

    $array = getAllAvatars();
    $username = getUsername($_SESSION["Account"]); //REPLACE $_SESSION["Account"]
    $currentAvatar = getCurrentAvatar($_SESSION["Account"]); //REPLACE $_SESSION["Account"]

    echo "<div class='wrapper'>";
    echo "<div class='wrapper-avatar'>";
    echo "<div class='avatar-icon'>";
    echo "<input type='image' class='user_avatar' id='imagesrc' src='" . $currentAvatar . "' alt='Avatar cont utilizator'>";
    echo "</div>";
    echo "<p class='username' id='accountName' onclick='openInput(" . $_SESSION["Account"] . ")'>" . $username . "</p>";
    echo "</div>";

    echo "<div class='wrapper-info'>";
    echo "<div class='info-left'>";
    echo "<div class='info-box'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/briefcase-icon-windows-60.png' alt='Utilizator-portofoliu imagine'>";
    echo "<div class='box-stats-special'>";
    echo "<div class='stats-value-special'>";
    echo "<p class='stats-title'>Portof. value</p>";
    echo "<p class='stats-value-custom' id='balance'>Loading...</p>";
    echo "</div>";
    if ($_SESSION['Currency'] == "EUR") {
        echo "<button class='change-coin'><span class='coin'>€</span> </button>";
    }
    if ($_SESSION['Currency'] == "USD") {
        echo "<button class='change-coin'><span class='coin'>$</span> </button>";
    }
    echo "</div>";
    echo "</div>";
    echo "<div class='info-box'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/save-money-icon-71.png' alt='Utilizator-bani disponimili imagine'>";
    echo "<div class='box-stats'>";
    echo "<p class='stats-title' >Cash Available</p>";
    echo "<p class='stats-value' id='cashavbl'>Loading...</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='info-box'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/ranking-icon-65.png' alt='Utilizator-loc in clasament imagine'>";
    echo "<div class='box-stats'>";
    echo "<p class='stats-title'>Global Rank</p>";
    echo "<p class='stats-value' id='rank'>Loading... </p>";
    echo "</div>";
    echo "</div>";

    echo "</div>";
    echo "<div class='info-right'>";
    echo "<div class='info-box'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/profit-icon-66.png' alt='Utilizator-performanta imagine'>";
    echo "<div class='box-stats'>";
    echo "<p class='stats-title'>Performance</p>";
    echo "<p class='stats-value' id='performance'>Loading...</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='info-box' id='trades' onclick='openTrades()'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/money-transfer-icon-75.png' alt='Utilizator-comert imagine'>";
    echo "<div class='box-stats'>";
    echo "<p class='stats-title'>Trades</p>";
    echo "<p class='stats-value' id='tradess'>Loading... </p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='info-box'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/profit-and-loss-icon-68.png' alt='Utilizator-pierderi imagine'>";
    echo "<div class='box-stats'>";
    echo "<p class='stats-title'>Profitable</p>";
    echo "<p class='stats-value' id='profit'>Loading... </p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "<button class='open-button' onclick='openForm()'>FEEDBACK</button>";

    echo "<div class='chat-popup' id='myForm'>";
    echo "<div class='form-user'>";
    echo "<h1 class='form-title'>Give us feedback</h1>";

    echo "<label for='msg'><b>Message</b></label>";
    echo "<textarea name='textarea' placeholder='Type message..' id='msg' ></textarea>";

    echo "<button type='submit' class='btn send' id='message' name='message' onclick='collect()'>Send</button>";
    echo "<button type='button' class='btn cancel' onclick='closeForm()'>Close</button>";
    echo "</div>";
    echo "</div>";

    echo "<div  class='mybackground' id='avatarbackground'>";
    echo "</div>";

    echo "<div class='change-avatar' id='mySection'>";
    echo "<img class='user_avatar_icon' id='imageId' src='" . $array[0][1] . "' alt='Utilizator-avatar imagine'>";
    echo "<button type='button' class='previous round'>&#8249;</button>";
    echo "<button type='button' class='next round'>&#8250;</button>";
    echo "<button type='button' class='ok round'>&#10003;</button>";
    echo "</div>";

    echo "<div  class='updateUsername' id='newname1'>";
    echo "<input type='text' class='newnamechange' id='newname2'>";
    echo "<button type='submit' class='setnewname' id='newname3'>Send</button>";
    echo "</div>";
    ?>


    <script >
        var js_array = <?php echo json_encode($array); ?>;
        var accountnr = <?php echo json_encode($_SESSION["Account"]); ?>;

        var index = 0
        var id = 0;

        let nextBtn = document.getElementsByClassName("previous round")[0];
        let previousBtn = document.getElementsByClassName("next round")[0];
        let okBtn = document.getElementsByClassName("ok round")[0];

        nextBtn.addEventListener("click", nextImg);
        previousBtn.addEventListener("click", prevImg);
        okBtn.addEventListener("click", closeAvatar);

        function nextImg() {
            index += 1;
            if (index > js_array.length - 1) {
                index = 0;
            }

            console.log(js_array[index][1]);
            document.getElementById('imageId').src = js_array[index][1];

        }

        function prevImg() {
            index -= 1;
            if (index < 0) {
                index = js_array.length - 1;
            }

            document.getElementById('imageId').src = js_array[index][1];


        }

        function closeAvatar() {
            document.getElementById('imagesrc').src = js_array[index][1];
            document.getElementById("mySection").style.display = "none";
            document.getElementById("avatarbackground").style.display = "none";
            document.body.removeEventListener("click", onClickBodyAvatar);

            fetch("https://stock-simulator-hodler.herokuapp.com/app/controllers/updateAccount.php", {

                    // Adding method type
                    method: "POST",

                    // Adding body or contents to send
                    body: JSON.stringify({
                        functionname: 'UpdateCurrentAvatar',
                        arg1: js_array[index][0],
                        arg2: accountnr
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

        function collect() {
            if (document.getElementById("msg").value.trim() != "") {

                fetch("https://stock-simulator-hodler.herokuapp.com/app/controllers/updateAccount.php", {

                        // Adding method type
                        method: "POST",

                        // Adding body or contents to send
                        body: JSON.stringify({
                            functionname: 'putFeedback',
                            arg1: document.getElementById("msg").value.trim(),
                            arg2: accountnr
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

                document.getElementById("msg").value = '';
                // $('#msg').val('');

            }
        }


        function refreshInfos() {
            refreshAccount(accountnr);

            setInterval(function() {refreshAccount(accountnr);}, 20000);
        }

        function updateNamePrev() {
            updateName(accountnr);
        }
    </script>
    <script src="/public/try.js"></script>
    <script src="/public/account.js"></script>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js%22%3E</script> -->

</body>

</html>