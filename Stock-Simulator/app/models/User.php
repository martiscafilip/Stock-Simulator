<?php 
require_once 'ConnectionManager.php';
class User 
{
    public $name;

    

   
}
 function getUser($username, $password) {
    
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();


    $query = "SELECT * FROM users WHERE username= $1 AND password = $2"; 
    pg_prepare($conn, "prepare1", $query) 
    or die ("Cannot prepare statement\n"); 

   $results = pg_execute($conn, "prepare1", array($username, $password))
    or die ("Cannot execute statement\n"); 

    $row = pg_fetch_row($results);
        if(!empty($row ))
        {
            return $row[1];
        }
        else 
        
        return null;
    }