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
    
        //                     if($profile->profit[0] == '+')
        //                         echo "<p class='green_color'>";
        //                     else if($profile->profit[0] == '-')
        //                         echo "<p class='red_color'>" ;



        require_once '../app/models/ChangeProfileModel.php';

        if(session_status()===PHP_SESSION_NONE)
        {
            session_start();
        }

        if(isset($_SESSION["Username"]) && isset($_SESSION["Password"] )) {
            $profilesArray = getProfiles(getEmail($_SESSION["Username"]));
        }


        echo "<div>";
            echo "<div class='profile_pool'>";
                // foreach($profilesArray as $profile){
                while ($profile = pg_fetch_row($profilesArray)){
                    echo "<div class='profile' >";

                        echo "<div class='profile_avatar'> "; 
                            echo "<input class='avatar_photo' type='image' src='" . $profile[2] . "' alt='avatar photo'>";
                        echo "</div>";


                        echo "<div class='profile_info'> ";
                            if($profile[3] == getAccountName($_SESSION["Account"]))
                                echo "<p class='name red_color'>" . $profile[3] . "</p>";
                            else
                                echo "<p class='name'>" . $profile[3] . "</p>";
                                // echo "<p>" . $profile->country . "</p>";

                            if($profile[1] >= 0)
                                echo "<p class='green_color'>";
                            else if($profile[1] < 0)
                                echo "<p class='red_color'>" ;

                                echo $profile[1] . "</p>";

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