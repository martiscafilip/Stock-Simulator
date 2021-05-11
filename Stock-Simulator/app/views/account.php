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
    }
    $array = getAllAvatars();
    $currentAvatar = getCurrentAvatar(1); //REPLACE $_SESSION["Account"]
    $username = getUsername(1); //REPLACE $_SESSION["Account"]

    echo "<div class='wrapper'>";
    echo "<div class='wrapper-avatar'>";
    echo "<div class='avatar-icon'>";
    echo "<input type='image' class='user_avatar' id='imagesrc' src='" . $currentAvatar . "' alt='Avatar cont utilizator'>";
    echo "</div>";
    echo "<p class='username'>" . $username . "</p>";
    echo "</div>";

    echo "<div class='wrapper-info'>";
    echo "<div class='info-left'>";
    echo "<div class='info-box'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/briefcase-icon-windows-60.png' alt='Utilizator-portofoliu imagine'>";
    echo "<div class='box-stats-special'>";
    echo "<div class='stats-value-special'>";
    echo "<p class='stats-title'>Portof. value</p>";
    echo "<p class='stats-value-custom'>1,000.00</p>";
    echo "</div>";
    echo "<button class='change-coin'><span class='coin'>€</span> </button>";
    echo "</div>";
    echo "</div>";
    echo "<div class='info-box'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/save-money-icon-71.png' alt='Utilizator-bani disponimili imagine'>";
    echo "<div class='box-stats'>";
    echo "<p class='stats-title'>Cash Available</p>";
    echo "<p class='stats-value'>+0%</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='info-box'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/ranking-icon-65.png' alt='Utilizator-loc in clasament imagine'>";
    echo "<div class='box-stats'>";
    echo "<p class='stats-title'>Global Rank</p>";
    echo "<p class='stats-value'>N/A</p>";
    echo "</div>";
    echo "</div>";

    echo "</div>";
    echo "<div class='info-right'>";
    echo "<div class='info-box'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/profit-icon-66.png' alt='Utilizator-performanta imagine'>";
    echo "<div class='box-stats'>";
    echo "<p class='stats-title'>Performance</p>";
    echo "<p class='stats-value'>+0%</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='info-box'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/money-transfer-icon-75.png' alt='Utilizator-comert imagine'>";
    echo "<div class='box-stats'>";
    echo "<p class='stats-title'>Trades</p>";
    echo "<p class='stats-value'>N/A</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='info-box'>";
    echo "<img class='user_info_icons' src='/public/profil-pictures/profit-and-loss-icon-68.png' alt='Utilizator-pierderi imagine'>";
    echo "<div class='box-stats'>";
    echo "<p class='stats-title'>Profitable</p>";
    echo "<p class='stats-value'>0%</p>";
    echo "</div>";
    echo "</div>";

    echo "</div>";

    echo "</div>";
    echo "</div>";
    echo "<button class='open-button' onclick='openForm()'>feedback</button>";

    echo "<div class='chat-popup' id='myForm'>";
    echo "<div class='form-user'>";
    echo "<h1 class='form-title'>Give us feedback</h1>";

    echo "<label for='msg'><b>Message</b></label>";
    echo "<textarea name='textarea' placeholder='Type message..' id='msg' required type='text'></textarea>";

    echo "<button type='submit' class='btn send' id='message' name='message' onclick='collect()'>Send</button>";
    echo "<button type='button' class='btn cancel' onclick='closeForm()'>Close</button>";
    echo "</div>";
    echo "</div>";



    echo "<div class='change-avatar' id='mySection'>";
    echo "<img class='user_avatar_icon' id='imageId' src='" . $array[0][1] . "' alt='Utilizator-avatar imagine'>";
    echo "<a href='#' class='previous round'>&#8249;</a>";
    echo "<a href='#' class='next round'>&#8250;</a>";
    echo "<a href='#' class='ok round'>&#10003;</a>";
    echo "</div>";

    ?>


    <script type='text/javascript'>
        var js_array = <?php echo json_encode($array); ?>;
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
            document.getElementById('imagesrc').src = js_array[index][1];

        }

        function prevImg() {
            index -= 1;
            if (index < 0) {
                index = js_array.length - 1;
            }

            document.getElementById('imageId').src = js_array[index][1];
            document.getElementById('imagesrc').src = js_array[index][1];


        }

        function closeAvatar() {
            document.getElementById('imagesrc').src = js_array[index][1];
            document.getElementById("mySection").style.display = "none";
            jQuery.ajax({
                type: "POST",
                url: 'http://localhost:3000/app/controllers/updateAccount.php',
                dataType: 'json',
                data: {
                    functionname: 'UpdateCurrentAvatar',
                    arguments: [js_array[index][0], 7] /////$_SESSION["Account"]
                },

                success: function(obj, textstatus) {
                    if (!('error' in obj)) {
                        id = obj.result;
                    } else {
                        console.log(obj.error);
                    }
                }
            });
            console.log("am facut", js_array[index][0]);
        }

        function collect() {
            if ($.trim($("textarea").val()) != "") {
                console.log("aicii",$("textarea").val());

                jQuery.ajax({
                    type: "POST",
                    url: 'http://localhost:3000/app/controllers/updateAccount.php',
                    dataType: 'json',
                    data: {
                        functionname: 'putFeedback',
                        arguments: [$.trim($("textarea").val()), 7 ] /////$_SESSION["Account"]
                    },

                    success: function(obj, textstatus) {
                        if (!('error' in obj)) {
                            id = obj.result;
                        } else {
                            console.log(obj.error);
                        }
                    }
                });
                $('#msg').val('');

            }
        }
    </script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/public/try.js"></script>

</body>

</html>