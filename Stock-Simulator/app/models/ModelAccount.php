<?php
require_once 'ConnectionManager.php';
class Avatar
{
   public $name;
}

function getCurrentAvatar($accountnr)
{
   $managerr = new ConnectionManager;
   $conn = $managerr->get_conn();

   $query = "SELECT a.avatar FROM avatars a join account c on a.id=c.avatar_id where c.accountnr=$1";

    pg_prepare($conn, "prepare", $query) 
    or die ("Cannot prepare statement\n"); 

   $results = pg_execute($conn, "prepare",array($accountnr) )
    or die ("Cannot execute statement\n"); 

    $row = pg_fetch_row($results);
        if(!empty($row ))
        {
            return $row[0];
        }
        else 
        
        return null;

}

function UpdateCurrentAvatar($avatar_id,$accountnr){

   $managerr = new ConnectionManager;
   $conn = $managerr->get_conn();


   $query="update account SET avatar_id = $1 where accountnr=$2";
   pg_prepare($conn, "prepare", $query) 
    or die ("Cannot prepare statement\n");

    $results = pg_execute($conn, "prepare",array($avatar_id,$accountnr) )
    or die ("Cannot execute statement\n");

    
    return 1;
}


function getAllAvatars()
{

   $managerr = new ConnectionManager;
   $conn = $managerr->get_conn();

   $query = "SELECT id,avatar FROM avatars";


   $results = pg_query($conn, $query);

   $contor=[];
   while($row = pg_fetch_row($results)){
     array_push($contor,$row);
   }
      
   return $contor?? null;
}
