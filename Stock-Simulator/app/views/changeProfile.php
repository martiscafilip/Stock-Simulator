<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leader Board</title>
    <link rel="stylesheet" href="/public/changeProfile.css">
</head>
<body>
    
    <header>
        
            
        <input class="menu-button" type="image" src="/public/Layer3.png" alt="menu button">
            
        
        <p class="slogan">
            HODL FOR YOUR LIFE
        </p>
        <img class="logo" src="/public/logo.png" alt="logo image">
        
        <nav class="menu-nav">
            <a href="/public/account/account"> Account </a>
            <a href="/public/trade/trade"> Trade</a>
            <a href="/public/leaderBoard/leaderBoard"> Leaderboard</a>
            <a href="/public/logout"> Log Out</a>
        </nav>
    </header>
    
    
    <?php
    
        $profilesString = file_get_contents("./changeProfile.json");
        $profilesArray = json_decode($profilesString);

        echo "<div>";
            echo "<div class='profile_pool'>";
                foreach($profilesArray as $profile){
                    echo "<div class='profile'>";

                        echo "<div class='profile_avatar'> "; 
                            echo "<input class='avatar_photo' type='image' src='" . $profile->profilPath . "' alt='avatar photo'>";
                        echo "</div>";


                        echo "<div class='profile_info'> ";
                                echo "<p class='name'>" . $profile->firstName . " " . $profile->secondName . "</p>";
                                echo "<p>" . $profile->country . "</p>";

                            if($profile->profit[0] == '+')
                                echo "<p class='green_color'>";
                            else if($profile->profit[0] == '-')
                                echo "<p class='red_color'>" ;

                                echo $profile->profit . "</p>";

                        echo "</div>";
                    echo "</div>";
                }
            echo "</div>";
            echo "<div class='fixed'>";
                echo "Change Profile";
            echo "</div>";
        echo "</div>";
    ?>


    <script src="/public/side-menu.js"></script>
    <script src="/public/changeProfile.js"></script>
    
</body>
</html>