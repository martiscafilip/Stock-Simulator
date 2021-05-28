<?php

require_once '../models/leaderboardModel.php';



header("Content-Type: application/json");
header("Access-Control-Allow-Origin: 'https://stock-simulator-hodler.herokuapp.com/app/api/topApi.php'");

echo json_encode( getTop());


?>