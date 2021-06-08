<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/public/stylesheets/login-style.css">
    <link rel = "icon" type = "image/png" href = "/public/logo.png">
</head>

<body>



    <div class="chenar">
        <img class="logo" src="/public/logo.png" alt="logo image">
        <p class="slogan">
            HODL FOR YOUR LIFE
        </p>
        <form action="../../app/controllers/loginvalidate.php" method="POST">
        <?php
        session_start();

        if ($_SESSION["Incorrect"]=="true")
        {
        echo "<p class='incorrect'>Incorrect Username or Password! </p>"; 
        }
        $_SESSION["Incorrect"]="false";
        
        ?>
            <div class="form-log-info">
                <label>
                    <!-- <p> -->
                    Username 
                    <!-- </p> -->
                    <input name="username" required type="text">
                </label>
                <label>
                    <!-- <p> -->
                    Password
                    <!-- </p> -->
                    <input name="password" required type="password">
                </label>
            </div>
            <div class="form-buttons">
                <button type="submit" >Log In</button>
                <button type="button" onClick="document.location.href='/public/register/register'"> Register</button>
            </div>
        </form>
        <div class="filler">
        </div>
    </div>

<?php
      require_once '../app/models/User.php';

      if(session_status()===PHP_SESSION_NONE)
      {
          session_start();
      }
      
      if(isset($_SESSION["Username"]) && isset($_SESSION["Password"])) {

          $user = getUser($_SESSION["Username"], $_SESSION["Password"]);

          if(!empty($user)) {  

              header('Location: /public/trade/trade');
              
           }
          else{
              echo "empty user";
          }
      }
      else 
      {
        //   echo "NO SESSION-test";
      }
  ?>
</body>

</html>

