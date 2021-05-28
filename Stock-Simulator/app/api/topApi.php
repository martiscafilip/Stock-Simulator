<?php

require_once '../models/leaderboardModel.php';



header("Content-Type: application/json");
header("Accept-Control-Allow-Origin: *");

echo json_encode( getTop());


?>