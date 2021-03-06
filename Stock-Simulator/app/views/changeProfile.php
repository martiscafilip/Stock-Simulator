<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["Username"])) header('Location: ../../public/home/login');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leader Board</title>
    <link rel="stylesheet" href="/public/stylesheets/changeProfile.css">
    <link rel = "icon" type = "image/png" href = "/public/logo.png">
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



        $email;

        if(session_status()===PHP_SESSION_NONE)
        {
            session_start();
        }

        if(isset($_SESSION["Username"]) && isset($_SESSION["Password"] )) {
            $email = getEmail($_SESSION["Username"]);
            $profilesArray = getProfiles($email);
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
                echo "<div class='profile' >";
                    echo "<div id = 'plusBtn'> ";
                        echo "<img class = 'plusBtn_photo' src='/public/pictures/plusBtn.png' alt='create demo acc'>";
                    echo "</div>";
                    echo "<div class='form'>";
                        echo "<div id= 'thisEmail' style = 'display: none;'>";
                            echo getEmail($_SESSION["Username"]);  
                        echo "</div>";
                        echo "<label>
                                Username
                                <input id='nameDemo' required type='text'>
                                </label>";
                        echo "<button id = 'createButton'>Create</button>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            echo "<div class='fixed'>";
                echo "Change Profile";
            echo "</div>";
        echo "</div>";
        // createAccount($email,"Vasile");
    ?>




    <script src="/public/side-menu.js"></script>

    <script src="/public/scripts/changeProfile.js"></script>
    
</body>
</html>