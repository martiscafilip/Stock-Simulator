<?php

require_once '../models/ConnectionManager.php';
require_once '../models/ChangeProfileModel.php';


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: 'POST'");

header("Content-Type: application/json");

// $name = $_POST["name"];
// $email = $_POST["email"];

$payloadString = file_get_contents("php://input");
$payloadJSON = json_decode($payloadString);


$name = $payloadJSON->name;
$email = $payloadJSON->email;



if($name != "" && $email != ""){
    createAccount($email, $name);
}

function createAccount($email, $username){

    $manager = new ConnectionManager;
    $conn = $manager->get_conn();


    $query = "SELECT nextval('account_seq')";

    $result = pg_query($conn,$query);

    $accountnr = pg_fetch_row($result)[0];

    pg_insert ($conn ,"account",
                [
                 "accountnr"=> $accountnr,
                 "email"=> $email, 
                 "balance"=> 100000,
                 "avatar_id"=> 1,
                 "name"=> $username 
                ],
            PGSQL_DML_EXEC )
    or die ("Cannot prepare statement\n");

 }
?>