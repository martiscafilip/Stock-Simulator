<?php

require_once '../models/leaderboardModel.php';



header("Content-Type: application/json");

echo json_encode( getTop());


?>