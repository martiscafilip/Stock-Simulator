<?php

require_once '../models/leaderboardModel.php';



header("Content-Type: application/json");

header("Access-Control-Allow-Origin: *");


echo json_encode( getTop());


?>
