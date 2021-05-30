<?php 
require_once 'ConnectionManager.php';
require_once 'User.php';
require_once 'Stocks.php';
// class UserForLeaderboard
// {
//     public $name;
//     public $country;
//     public $balance;
//     public $avatar;
   
// }

function cmp($a, $b)
{
    if ((substr($a["balance"],0,1)) == (substr($b["balance"],0,1))) {
        return 0;
    }
    return ((substr($a["balance"],0,1))) < (substr($b["balance"],0,1)) ? 1 : -1;
}


function getTopQueryResult() {

$managerr = new ConnectionManager;
$conn = $managerr->get_conn();

$query = "SELECT a.accountnr as accountnr, a.name as name, country, balance, avatar
            FROM users u JOIN account a ON u.email = a.email 
            JOIN avatars ON avatar_id = avatars.id
            WHERE a.type = 'real'
            ORDER BY balance DESC"; 

$result = pg_query($conn, $query);
if(!$result){
    echo "An error occured!\n";
    return null;
}

// $matrix=array(array());
// while($row = pg_fetch_array($result))
// {
//     array_push($row);
// }
//  usort($matrix, "cmp");

return $result;
}

function getTop($limit = 0){

    $result = [];
    $top = getTopQueryResult();
    $index = 0;
    while($row = pg_fetch_array($top)){
        $name = $row ["name"];
        $country = $row ["country"];

        $balance =  performance($row ["accountnr"]);
        // $balance = $row ["balance"];
        $avatar = $row ["avatar"];
        array_push($result,["name" => $name,"country" => $country,"balance" => $balance,"avatar" => $avatar]);
        $index++;
        if($limit == $index && $limit != 0){
              usort($result, "cmp");
            return $result;
        }
    }

      usort($result, "cmp");
    return $result;

}



?>