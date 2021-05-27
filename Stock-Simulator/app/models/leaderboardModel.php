<?php 
require_once 'ConnectionManager.php';
// class UserForLeaderboard
// {
//     public $name;
//     public $country;
//     public $balance;
//     public $avatar;
   
// }



function getTopQueryResult() {

$managerr = new ConnectionManager;
$conn = $managerr->get_conn();

$query = "SELECT a.name as name, country, balance, avatar
            FROM users u JOIN account a ON u.email = a.email 
            JOIN avatars ON avatar_id = avatars.id
            ORDER BY balance DESC"; 

$result = pg_query($conn, $query);
if(!$result){
    echo "An error occured!\n";
    return null;
}

return $result;
}

function getTop($limit = 0){

    $result = [];
    $top = getTopQueryResult();
    $index = 0;
    while($row = pg_fetch_array($top)){
        $name = $row ["name"];
        $country = $row ["country"];
        $balance = $row ["balance"];
        $avatar = $row ["avatar"];
        array_push($result,["name" => $name,"country" => $country,"balance" => $balance,"avatar" => $avatar]);
        $index++;
        if($limit == $index && $limit != 0){
            return $result;
        }
    }


    return $result;

}


?>