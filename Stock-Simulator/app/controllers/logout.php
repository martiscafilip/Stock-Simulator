<?php

if(session_status()===PHP_SESSION_NONE)
{
    session_start();
}
    unset($_SESSION["Username"]);
    unset($_SESSION["Password"]);
    unset($_SESSION["Account"]);

    header('Location: /public/home/login');
 