<?php 
require_once 'ConnectionManager.php';
class User 
{
    public $name;
   
}

 function putUser($username, $password,$email,$fullname,$country) {
    
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    pg_insert ($conn ,"users" ,["name"=>$fullname, "username"=>$username, "email"=>$email, "password"=>$password,"country"=>$country] ,PGSQL_DML_EXEC )
    or die ("Cannot prepare statement\n");
 }
?>