<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leader Board</title>
    <link rel="stylesheet" href="/public/leaderBoard-style.css">
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
            <a href="/public/changeProfile/changeProfile"> Change Profile</a>
            <a href="/public/home/login"> Log Out</a>
        </nav>
    </header>
    
    
    <?php
    
        $userString = file_get_contents("./leaderBoard.json");
        $userArray = json_decode($userString);
        $rankPosition = 0;
        echo "<div>";
            echo "<div class='ranking_pool'>";
                foreach($userArray as $user){
                    echo "<div class='ranking'>";
                        $rankPosition++;

                        if($rankPosition == 1)
                            echo "<div class='rank_avatar red_color'> ";
                        else if($rankPosition == 2)
                            echo "<div class='rank_avatar orange_color'> ";
                        else if($rankPosition == 3)
                            echo "<div class='rank_avatar yellow_color'> ";
                        else
                            echo "<div class='rank_avatar'> ";
                            

                                echo $rankPosition; 
                                echo "<img class='avatar_photo' src='" . $user->profilPath . "' alt='avatar photo'>";

                            echo "</div>";


                        echo "<div class='user_info'> ";
                                echo "<p class='name'>" . $user->firstName . " " . $user->secondName . "</p>";
                                echo "<p>" . $user->country . "</p>";

                            if($user->profit[0] == '+')
                                echo "<p class='green_color'>";
                            else if($user->profit[0] == '-')
                                echo "<p class='red_color'>" ;

                                echo $user->profit . "</p>";

                        echo "</div>";
                    echo "</div>";
                }
            echo "</div>";
            echo "<div class='fixed'>";
                echo "Global Leaderboard";
            echo "</div>";
        echo "</div>";
    ?>


    <script src="/public/side-menu.js"></script>
    
</body>
</html>