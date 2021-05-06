<?php

if(session_status()===PHP_SESSION_NONE)
{
    session_start();
}
    unset($_SESSION["Username"]);
    unset($_SESSION["Password"]);

    header('Location: /public/home/login');
 