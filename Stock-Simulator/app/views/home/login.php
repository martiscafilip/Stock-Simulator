<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/public/login-style.css">
</head>

<body>
    <div class="chenar">
        <img class="logo" src="/public/logo.png" alt="logo image">
        <p class="slogan">
            HODL FOR YOUR LIFE
        </p>
        <form action="login.php">
            <div class="form-log-info">
                <label>
                    <!-- <p> -->
                    Username or Email Address
                    <!-- </p> -->
                    <input type="text">
                </label>
                <label>
                    <!-- <p> -->
                    Password
                    <!-- </p> -->
                    <input name= "submit" type="password">
                </label>
            </div>
            <div class="form-buttons">
                <button  type="button" onClick="document.location.href='/public/trade/trade'">Log In</button>
                <button type="button" onClick="document.location.href='/public/register/register'"> Register</button>
            </div>
        </form>
        <div class="filler">
        </div>
    </div>
</body>

</html>