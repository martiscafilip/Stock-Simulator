<?php

if(session_status()===PHP_SESSION_NONE)
{
    session_start();
}
    unset($_SESSION["Username"]);
    unset($_SESSION["Password"]);
    unset($_SESSION["Account"]);
    unset($_SESSION["Currency"]);

    header('Location: /public/home/login');
 