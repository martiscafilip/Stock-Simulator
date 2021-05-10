<?php 
require_once 'ConnectionManager.php';
// class UserForLeaderboard
// {
//     public $name;
//     public $country;
//     public $balance;
//     public $avatar;
   
// }
 function getTop() {
    
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

