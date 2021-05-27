<?php

require_once 'leaderboardModel.php';
require_once 'ConnectionManager.php';


$managerr = new ConnectionManager;
$conn = $managerr->get_conn();

$top = getTop(10);

$result = "";

$index = 1;
foreach ($top as $user) {
    $result = $result . $index . " " . $user["name"] . " " . $user["balance"] . ";\t";
    $index++;
}


pg_insert ($conn ,"rss_info" ,
                [
                 "title"=>"Top10",
                 "link"=>"https://stock-simulator-hodler.herokuapp.com/public/leaderBoard/leaderBoard", 
                 "description"=> $result
                ],
            PGSQL_DML_EXEC )
    or die ("Cannot prepare statement\n");



?>