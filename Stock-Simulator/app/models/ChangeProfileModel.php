<?php 
require_once 'ConnectionManager.php';

 function getProfiles($email) {
    
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();


    $query = "SELECT accountnr, balance, avatar, name
                FROM account a JOIN avatars av ON avatar_id = id
                WHERE email = '$email' ORDER BY accountnr"; 

   $result = pg_query($conn, $query);
   if(!$result){
       echo "An error occured!\n";
       return null;
   }
    return $result;
 }

 function getEmail($username){
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT email 
                FROM account
                WHERE name = '$username'";
    
    $result = pg_query($conn, $query);
    
    if(!$result){
        echo "An error occured!\n";
        return null;
    }
    return pg_fetch_row($result)[0];


 }

 function getAccountName($account){
    
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT name
                FROM account
                WHERE accountnr = $account";
    
    $result = pg_query($conn, $query);
    
    if(!$result){
        echo "An error occured!\n";
        return null;
    }
    return pg_fetch_row($result)[0];

 }
